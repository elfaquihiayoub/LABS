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

final class PodcastSearch
{
    public function find(array $podcasts, array $filters): array
    {
        return array_values(array_filter(
            $podcasts,
            static function (Podcast $podcast) use ($filters): bool {
                foreach ($filters as $filter) {
                    if (!$filter instanceof PodcastFilter) {
                        throw new InvalidArgumentException('Chaque filtre doit respecter PodcastFilter.');
                    }

                    if (!$filter->matches($podcast)) {
                        return false;
                    }
                }

                return true;
            }
        ));
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

$search = new PodcastSearch();
$results = $search->find($podcasts, [
    new CategoryFilter('Développement'),
    new TitleFilter('Laravel'),
]);

check(count($results) === 1, 'les filtres sont appliqués ensemble');
check($results[0]->title === 'PHP et Laravel', 'le bon podcast est trouvé');
