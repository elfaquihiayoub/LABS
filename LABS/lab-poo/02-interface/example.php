<?php

interface Publishable
{
    public function publish(): void;

    public function isPublished(): bool;
}

final class Podcast implements Publishable
{
    private bool $published = false;

    public function publish(): void
    {
        $this->published = true;
    }

    public function isPublished(): bool
    {
        return $this->published;
    }
}

$podcast = new Podcast();
echo 'Avant : ' . ($podcast->isPublished() ? 'publié' : 'brouillon') . PHP_EOL;

$podcast->publish();
echo 'Après : ' . ($podcast->isPublished() ? 'publié' : 'brouillon') . PHP_EOL;
