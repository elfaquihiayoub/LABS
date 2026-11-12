<?php

/**
 * Projet : Podcast Directory Management
 * Notion : Gestion des erreurs et des exceptions
 * Rôle   : Valider les données d'un podcast et capturer les erreurs.
 */

// 1. Définition d'une exception personnalisée
class InvalidPodcastException extends Exception {}

// 2. Classe représentant un podcast
class Podcast
{
    private string $title;
    private int $durationInSeconds;

    public function __construct(string $title, int $durationInSeconds)
    {
        $cleanTitle = trim($title);

        // Règle 1 : le titre ne doit pas être vide
        if ($cleanTitle === '') {
            throw new InvalidPodcastException("Le titre du podcast ne peut pas être vide.");
        }

        // Règle 2 : la durée doit être strictement positive
        if ($durationInSeconds <= 0) {
            throw new InvalidPodcastException("La durée doit être supérieure à 0 seconde.");
        }

        $this->title = $cleanTitle;
        $this->durationInSeconds = $durationInSeconds;
    }

    public function getDetails(): string
    {
        return "Podcast : '{$this->title}' ({$this->durationInSeconds} secondes)";
    }
}

// 3. Fonction pour tester la création d'un podcast avec gestion d'erreur
function createPodcastSafely(string $title, int $duration): void
{
    echo "Tentative d'ajout : '{$title}' ({$duration}s)..." . PHP_EOL;

    try {
        $podcast = new Podcast($title, $duration);
        echo "  [OK] " . $podcast->getDetails() . PHP_EOL;
    } catch (InvalidPodcastException $e) {
        echo "  [ERREUR] " . $e->getMessage() . PHP_EOL;
    } finally {
        echo "  [INFO] Fin du traitement pour cette tentative." . PHP_EOL . PHP_EOL;
    }
}

// --- Exécution des tests ---

echo "=== Test 1 : Données valides ===" . PHP_EOL;
createPodcastSafely("PHP Moderne et Découverte", 1800);

echo "=== Test 2 : Titre vide ===" . PHP_EOL;
createPodcastSafely("", 1200);

echo "=== Test 3 : Durée invalide ===" . PHP_EOL;
createPodcastSafely("Podcast Tech Rapide", -45);

