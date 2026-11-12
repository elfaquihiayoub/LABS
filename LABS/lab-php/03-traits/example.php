<?php

/**
 * Projet : Podcast Directory Management
 * Notion : Traits
 * Rôle   : Partager du code réutilisable entre plusieurs classes sans héritage multiple.
 */

// 1. Définition du Trait pour générer un slug propre pour les URL web
trait HasSlug
{
    public function slugify(string $text): string
    {
        // Convertir en minuscules
        $slug = mb_strtolower(trim($text), 'UTF-8');

        // Remplacer les caractères accentués ou spéciaux courants
        $slug = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $slug);

        // Supprimer les tirets au début et à la fin
        return trim($slug, '-');
    }
}

// 2. Classe Podcast qui utilise le Trait HasSlug
class Podcast
{
    use HasSlug;

    public function __construct(
        public string $title,
        public string $author
    ) {}

    public function getUrl(): string
    {
        $slug = $this->slugify($this->title);
        return "/podcasts/{$slug}";
    }
}

// 3. Classe Category qui utilise le même Trait HasSlug
class Category
{
    use HasSlug;

    public function __construct(
        public string $name
    ) {}

    public function getUrl(): string
    {
        $slug = $this->slugify($this->name);
        return "/categories/{$slug}";
    }
}

// --- Démonstration de l'exécution ---

echo "=== Démonstration des Traits en PHP ===" . PHP_EOL . PHP_EOL;

// Exemple avec un podcast
$podcast = new Podcast("Découvrir PHP & Laravel Facilement !", "Ayoub");
echo "Podcast  : " . $podcast->title . PHP_EOL;
echo "URL Web  : " . $podcast->getUrl() . PHP_EOL . PHP_EOL;

// Exemple avec une catégorie
$category = new Category("Intelligence Artificielle & Outils");
echo "Catégorie : " . $category->name . PHP_EOL;
echo "URL Web   : " . $category->getUrl() . PHP_EOL . PHP_EOL;

echo "[OK] Le code de 'slugify' est partagé sans duplication !" . PHP_EOL;

