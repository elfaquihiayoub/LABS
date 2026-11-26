<?php

declare(strict_types=1);

final class Podcast
{
    public function __construct(
        public readonly string $title,
        public readonly string $host
    ) {
    }
}

interface PodcastReader
{
    /** @return list<Podcast> */
    public function all(): array;
}

interface PodcastWriter
{
    public function add(Podcast $podcast): void;
}

final class PublicPodcastDirectory implements PodcastReader
{
    /**
     * @param list<Podcast> $podcasts
     */
    public function __construct(private readonly array $podcasts)
    {
    }

    public function all(): array
    {
        return $this->podcasts;
    }
}

final class AdminPodcastDirectory implements PodcastReader, PodcastWriter
{
    /** @var list<Podcast> */
    private array $podcasts = [];

    public function add(Podcast $podcast): void
    {
        $this->podcasts[] = $podcast;
    }

    public function all(): array
    {
        return $this->podcasts;
    }
}

final class PublicPodcastPage
{
    public function __construct(private readonly PodcastReader $directory)
    {
    }

    /** @return list<string> */
    public function titles(): array
    {
        $titles = [];

        foreach ($this->directory->all() as $podcast) {
            $titles[] = $podcast->title;
        }

        return $titles;
    }
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$publicDirectory = new PublicPodcastDirectory([
    new Podcast('PHP pour débuter', 'Ayoub'),
]);
$page = new PublicPodcastPage($publicDirectory);

check($page->titles() === ['PHP pour débuter'], 'la page publique lit les titres du catalogue');

$adminDirectory = new AdminPodcastDirectory();
$adminDirectory->add(new Podcast('Laravel en pratique', 'Sara'));
check(count($adminDirectory->all()) === 1, 'la partie admin peut ajouter un podcast');
