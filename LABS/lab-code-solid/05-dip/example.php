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

interface PodcastRepository
{
    public function save(Podcast $podcast): void;

    public function findAll(): array;
}

final class InMemoryPodcastRepository implements PodcastRepository
{
    private array $podcasts = [];

    public function save(Podcast $podcast): void
    {
        $this->podcasts[] = $podcast;
    }

    public function findAll(): array
    {
        return $this->podcasts;
    }
}

final class PodcastCatalogService
{
    public function __construct(private readonly PodcastRepository $repository)
    {
    }

    public function add(string $title, string $host): void
    {
        $this->repository->save(new Podcast($title, $host));
    }

    public function listTitles(): array
    {
        return array_map(
            static fn (Podcast $podcast): string => $podcast->title,
            $this->repository->findAll()
        );
    }
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$repository = new InMemoryPodcastRepository();
$catalog = new PodcastCatalogService($repository);
$catalog->add('PHP au quotidien', 'Ayoub');

check($catalog->listTitles() === ['PHP au quotidien'], 'le service enregistre et relit un podcast');
check($repository instanceof PodcastRepository, 'le dépôt respecte l’interface attendue');
