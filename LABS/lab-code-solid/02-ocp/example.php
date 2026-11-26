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

interface PodcastFilter
{
    public function matches(Podcast $podcast): bool;
}

final class CategoryFilter implements PodcastFilter
{
    public function __construct(private readonly string $category)
    {
    }

    public function matches(Podcast $podcast): bool
    {
        return $podcast->category === $this->category;
    }
}

final class TitleFilter implements PodcastFilter
{
    public function __construct(private readonly string $word)
    {
    }

    public function matches(Podcast $podcast): bool
    {
        return stripos($podcast->title, $this->word) !== false;
    }
}

final class PodcastDirectory
{
    /**
     * @param list<Podcast> $podcasts
     * @param list<PodcastFilter> $filters
     * @return list<Podcast>
     */
    public function search(array $podcasts, array $filters): array
    {
        $results = [];

        foreach ($podcasts as $podcast) {
            $matchesAllFilters = true;

            foreach ($filters as $filter) {
                if (!$filter->matches($podcast)) {
                    $matchesAllFilters = false;
                    break;
                }
            }

            if ($matchesAllFilters) {
                $results[] = $podcast;
            }
        }

        return $results;
    }
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }

    echo '[OK] ' . $message . PHP_EOL;
}

$podcasts = [
    new Podcast('PHP pour débuter', 'Développement'),
    new Podcast('Cuisine facile', 'Cuisine'),
    new Podcast('PHP et Laravel', 'Développement'),
];

$directory = new PodcastDirectory();
$results = $directory->search($podcasts, [
    new CategoryFilter('Développement'),
    new TitleFilter('Laravel'),
]);

check(count($results) === 1, 'la recherche applique la catégorie et le titre');
check($results[0]->title === 'PHP et Laravel', 'le catalogue retourne le bon podcast');
