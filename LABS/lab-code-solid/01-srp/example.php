<?php

declare(strict_types=1);

final class Podcast
{
    public function __construct(
        public readonly string $title,
        public readonly string $host,
        public readonly int $durationInMinutes
    ) {
    }
}

final class PodcastValidator
{
    public function validate(string $title, string $host, int $durationInMinutes): array
    {
        $errors = [];

        if (trim($title) === '') {
            $errors[] = 'Le titre est obligatoire.';
        }

        if (trim($host) === '') {
            $errors[] = 'Le nom de l’animateur est obligatoire.';
        }

        if ($durationInMinutes <= 0) {
            $errors[] = 'La durée doit être supérieure à zéro.';
        }

        return $errors;
    }
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$validator = new PodcastValidator();
$errors = $validator->validate('PHP pour débuter', 'Ayoub', 20);
check($errors === [], 'les informations du podcast sont valides');

$podcast = new Podcast('PHP pour débuter', 'Ayoub', 20);
check($podcast->title === 'PHP pour débuter', 'Podcast conserve les informations du podcast');

$errors = $validator->validate('', ' ', 0);
check(count($errors) === 3, 'le formulaire signale les trois informations manquantes ou invalides');
