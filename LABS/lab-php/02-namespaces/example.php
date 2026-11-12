<?php

/**
 * Projet : Podcast Directory Management
 * Notion : Namespaces (Espaces de noms)
 * Rôle   : Organiser les classes et éviter les conflits de noms.
 */

// 1. Premier namespace : Modèle interne de notre application
namespace App\Models {
    class Podcast
    {
        public function __construct(
            public int $id,
            public string $title,
            public string $author
        ) {}

        public function getSummary(): string
        {
            return "Podcast interne #{$this->id} : '{$this->title}' par {$this->author}";
        }
    }
}

// 2. Deuxième namespace : Classe issue d'une librairie externe pour flux RSS
namespace ExternalRss {
    class Podcast
    {
        public function __construct(
            public string $feedSource,
            public string $audioUrl
        ) {}

        public function getSummary(): string
        {
            return "Podcast distant ({$this->feedSource}) -> URL : {$this->audioUrl}";
        }
    }
}

// 3. Espace global : Utilisation des deux classes sans conflit
namespace {
    // Utilisation d'alias avec le mot-clé "as" pour éviter la confusion
    use App\Models\Podcast as InternalPodcast;
    use ExternalRss\Podcast as RemotePodcast;

    echo "=== Démonstration des Namespaces en PHP ===" . PHP_EOL . PHP_EOL;

    // Instanciation de la classe interne
    $local = new InternalPodcast(101, "Découverte de PHP", "Équipe Solicode");
    echo "[1] Application locale :" . PHP_EOL;
    echo "    " . $local->getSummary() . PHP_EOL . PHP_EOL;

    // Instanciation de la classe externe
    $remote = new RemotePodcast("Flux Tech Radio", "https://example.com/audio/tech-101.mp3");
    echo "[2] Librairie externe RSS :" . PHP_EOL;
    echo "    " . $remote->getSummary() . PHP_EOL . PHP_EOL;

    echo "[OK] Les deux classes 'Podcast' coexistent sans erreur !" . PHP_EOL;
}

