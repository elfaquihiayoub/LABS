<?php

interface CatalogEntry
{
    public function displayLine(): string;
}

final class Podcast implements CatalogEntry
{
    public function __construct(private string $title)
    {
    }

    public function displayLine(): string
    {
        return 'Podcast : ' . $this->title;
    }
}

final class Episode implements CatalogEntry
{
    public function __construct(
        private string $title,
        private int $number
    ) {
    }

    public function displayLine(): string
    {
        return 'Épisode ' . $this->number . ' : ' . $this->title;
    }
}

$entries = [
    new Podcast('PHP et les objets'),
    new Episode('Les interfaces', 2),
];

foreach ($entries as $entry) {
    echo $entry->displayLine() . PHP_EOL;
}
