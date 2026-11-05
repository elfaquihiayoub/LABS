const API_URL = new URL('../backend/api/controllers/controllerRayon.php', window.location.href).toString();

document.addEventListener('alpine:init', () => {
    Alpine.data('rayonManager', () => ({
        rayons: [],
        search: '',
        loading: false,
        saving: false,
        deleting: false,
        formOpen: false,
        editingId: null,
        form: { nom: '', emplacement: '' },
        deleteConfirmationOpen: false,
        rayonToDelete: null,
        toasts: [],

        get filteredRayons() {
            const query = this.search.trim().toLocaleLowerCase();
            if (!query) {
                return this.rayons;
            }

            return this.rayons.filter((rayon) =>
                [rayon.nom, rayon.emplacement || ''].some((value) =>
                    value.toLocaleLowerCase().includes(query)
                )
            );
        },

        async request(url, options = {}) {
            const response = await fetch(url, options);
            let result;

            try {
                result = await response.json();
            } catch {
                throw new Error('Le serveur a retourne une reponse invalide.');
            }

            if (!response.ok) {
                throw new Error(result.message || 'La requete a echoue.');
            }

            return result;
        },

        showToast(message, type = 'success') {
            const id = Date.now() + Math.random();
            this.toasts.push({ id, message, type });
            window.setTimeout(() => {
                this.toasts = this.toasts.filter((toast) => toast.id !== id);
            }, 3000);
        },

        async loadRayons() {
            this.loading = true;
            try {
                const result = await this.request(API_URL);
                if (!Array.isArray(result)) {
                    throw new Error('Le serveur a retourne une liste de rayons invalide.');
                }
                this.rayons = result;
            } catch (error) {
                this.showToast(error.message, 'error');
            } finally {
                this.loading = false;
            }
        },

        openCreateForm() {
            this.resetForm();
            this.formOpen = true;
        },

        openEditForm(rayon) {
            this.editingId = rayon.id;
            this.form = {
                nom: rayon.nom,
                emplacement: rayon.emplacement || '',
            };
            this.formOpen = true;
        },

        closeForm() {
            this.formOpen = false;
            this.resetForm();
        },

        resetForm() {
            this.editingId = null;
            this.form = { nom: '', emplacement: '' };
        },

        async saveRayon() {
            if (this.saving) {
                return;
            }

            this.saving = true;
            const id = this.editingId;
            const isEditing = id !== null;
            const url = isEditing ? `${API_URL}?id=${encodeURIComponent(id)}` : API_URL;

            try {
                const result = await this.request(url, {
                    method: isEditing ? 'PUT' : 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        nom: this.form.nom.trim(),
                        emplacement: this.form.emplacement.trim(),
                    }),
                });

                if (!result.success || !result.data) {
                    throw new Error(result.message || 'Impossible d’enregistrer le rayon.');
                }

                if (isEditing) {
                    this.rayons = this.rayons.map((rayon) => rayon.id === id ? result.data : rayon);
                } else {
                    this.rayons.push(result.data);
                }

                this.closeForm();
                this.showToast(isEditing ? 'Rayon modifie avec succes.' : 'Rayon ajoute avec succes.');
            } catch (error) {
                this.showToast(error.message, 'error');
            } finally {
                this.saving = false;
            }
        },

        askToDelete(rayon) {
            this.rayonToDelete = rayon;
            this.deleteConfirmationOpen = true;
        },

        closeDeleteConfirmation() {
            if (this.deleting) {
                return;
            }
            this.deleteConfirmationOpen = false;
            this.rayonToDelete = null;
        },

        async deleteRayon() {
            if (!this.rayonToDelete || this.deleting) {
                return;
            }

            this.deleting = true;
            const id = this.rayonToDelete.id;
            try {
                const result = await this.request(`${API_URL}?id=${encodeURIComponent(id)}`, {
                    method: 'DELETE',
                });
                if (!result.success) {
                    throw new Error(result.message || 'Impossible de supprimer le rayon.');
                }

                this.rayons = this.rayons.filter((rayon) => rayon.id !== id);
                this.deleteConfirmationOpen = false;
                this.rayonToDelete = null;
                this.showToast('Rayon supprime avec succes.');
            } catch (error) {
                this.showToast(error.message, 'error');
            } finally {
                this.deleting = false;
            }
        },
    }));
});
