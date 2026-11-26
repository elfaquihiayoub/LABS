<?php

declare(strict_types=1);

abstract class AudioEpisode
{
    public function __construct(
        public readonly string $title,
        public readonly int $durationInSeconds,
        public readonly string $streamUrl
    ) {
        if ($title === '' || $durationInSeconds <= 0 || filter_var($streamUrl, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException('Un épisode doit avoir un titre, une durée positive et une URL valide.');
        }
    }

    abstract public function getSourceName(): string;

    public function play(): string
    {
        return $this->title . ' (' . $this->durationInSeconds . ' s) : ' . $this->streamUrl;
    }
}

final class LocalEpisode extends AudioEpisode
{
    public function getSourceName(): string
    {
        return 'fichier local';
    }
}

final class ImportedEpisode extends AudioEpisode
{
    public function getSourceName(): string
    {
        return 'flux importé';
    }
}

function playEpisode(AudioEpisode $episode): string
{
    return $episode->getSourceName() . ' - ' . $episode->play();
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$episodes = [
    new LocalEpisode('PHP et les objets', 720, 'https://audio.example.test/php-objets.mp3'),
    new ImportedEpisode('Le web en bref', 480, 'https://radio.example.test/web.mp3'),
];

$playbackMessages = array_map('playEpisode', $episodes);

check(count($playbackMessages) === 2, 'le lecteur accepte les deux types d’épisodes');
check(str_contains($playbackMessages[0], 'fichier local'), 'l’épisode local respecte le contrat');
check(str_contains($playbackMessages[1], 'flux importé'), 'l’épisode importé respecte le contrat');
