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
    public function add(Podcast $podcast): void;

    /** @return list<Podcast> */
    public function all(): array;
}

final class InMemoryPodcastRepository implements PodcastRepository
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

final class AddPodcastToDirectory
{
    public function __construct(private readonly PodcastRepository $repository)
    {
    }

    public function add(string $title, string $host): void
    {
        $this->repository->add(new Podcast($title, $host));
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
$addPodcast = new AddPodcastToDirectory($repository);
$addPodcast->add('PHP pour débuter', 'Ayoub');

$savedPodcasts = $repository->all();
check(count($savedPodcasts) === 1, 'le service ajoute un podcast dans le catalogue');
check($savedPodcasts[0]->title === 'PHP pour débuter', 'le dépôt contient le bon podcast');
