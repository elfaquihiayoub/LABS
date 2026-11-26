<?php

declare(strict_types=1);

abstract class Podcast
{
    public function __construct(
        public readonly string $title,
        public readonly string $host
    ) {
        if (trim($title) === '' || trim($host) === '') {
            throw new InvalidArgumentException('Le titre et le nom de l’animateur sont obligatoires.');
        }
    }

    abstract public function getFormat(): string;

    public function getDirectoryLine(): string
    {
        return $this->title . ' — ' . $this->host . ' (' . $this->getFormat() . ')';
    }
}

final class InterviewPodcast extends Podcast
{
    public function getFormat(): string
    {
        return 'Interview';
    }
}

final class SoloPodcast extends Podcast
{
    public function getFormat(): string
    {
        return 'Solo';
    }
}

function showPodcast(Podcast $podcast): string
{
    return $podcast->getDirectoryLine();
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$podcasts = [
    new InterviewPodcast('Le web en bref', 'Ayoub'),
    new SoloPodcast('PHP simplement', 'Sara'),
];

$directoryLines = array_map('showPodcast', $podcasts);

check(count($directoryLines) === 2, 'la fonction de liste accepte les deux formats');
check(str_contains($directoryLines[0], 'Interview'), 'le podcast interview garde son format');
check(str_contains($directoryLines[1], 'Solo'), 'le podcast solo garde son format');
