<?php

final class Podcast
{
    private static int $createdCount = 0;

    public function __construct(private string $title)
    {
        self::$createdCount++;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public static function getCreatedCount(): int
    {
        return self::$createdCount;
    }
}

$firstPodcast = new Podcast('PHP et les objets');
$secondPodcast = new Podcast('Découvrir les interfaces');

echo $firstPodcast->getTitle() . PHP_EOL;
echo $secondPodcast->getTitle() . PHP_EOL;
echo 'Podcasts créés : ' . Podcast::getCreatedCount() . PHP_EOL;
