<?php

declare(strict_types=1);

final class Podcast
{
    public function __construct(
        public readonly string $title,
        public readonly string $category
    ) {
    }
}

interface PodcastReader
{
    public function all(): array;
}

interface PodcastWriter
{
    public function add(Podcast $podcast): void;
}

final class PublicPodcastCatalog implements PodcastReader
{
    public function __construct(private readonly array $podcasts)
    {
    }

    public function all(): array
    {
        return $this->podcasts;
    }
}

final class InMemoryPodcastCatalog implements PodcastReader, PodcastWriter
{
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

final class PodcastList
{
    public function __construct(private readonly PodcastReader $catalog)
    {
    }

    public function titles(): array
    {
        return array_map(
            static fn (Podcast $podcast): string => $podcast->title,
            $this->catalog->all()
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

$podcast = new Podcast('PHP facile', 'Développement');
$publicCatalog = new PublicPodcastCatalog([$podcast]);
$list = new PodcastList($publicCatalog);

check($list->titles() === ['PHP facile'], 'la liste lit un catalogue en lecture seule');

$editableCatalog = new InMemoryPodcastCatalog();
$editableCatalog->add($podcast);
check(count($editableCatalog->all()) === 1, 'le catalogue éditable lit et ajoute un podcast');
