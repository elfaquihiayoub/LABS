<?php

declare(strict_types=1);

final class Podcast
{
    public function __construct(
        public readonly string $title,
        public readonly string $host,
        public readonly int $durationInSeconds
    ) {
    }
}

final class PodcastValidator
{
    public function validate(array $input): array
    {
        $errors = [];

        if (trim((string) ($input['title'] ?? '')) === '') {
            $errors[] = 'Le titre est obligatoire.';
        }

        if (trim((string) ($input['host'] ?? '')) === '') {
            $errors[] = 'Le nom de l’animateur est obligatoire.';
        }

        if (!isset($input['duration']) || (int) $input['duration'] <= 0) {
            $errors[] = 'La durée doit être positive.';
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
$validInput = ['title' => 'PHP simple', 'host' => 'Ayoub', 'duration' => 600];
$invalidInput = ['title' => ' ', 'host' => '', 'duration' => 0];
$podcast = new Podcast('PHP simple', 'Ayoub', 600);

check($validator->validate($validInput) === [], 'les données valides sont acceptées');
check(count($validator->validate($invalidInput)) === 3, 'les trois erreurs sont détectées');
check($podcast->title === 'PHP simple', 'Podcast conserve les données du podcast');
