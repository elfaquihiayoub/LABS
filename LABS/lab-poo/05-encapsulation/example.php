<?php

final class Podcast
{
    private string $title;
    private int $downloadCount = 0;

    public function __construct(string $title)
    {
        $this->setTitle($title);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $cleanTitle = trim($title);

        if ($cleanTitle === '') {
            throw new InvalidArgumentException('Le titre est obligatoire.');
        }

        $this->title = $cleanTitle;
    }

    public function addDownload(): void
    {
        $this->downloadCount++;
    }

    public function getDownloadCount(): int
    {
        return $this->downloadCount;
    }
}

$podcast = new Podcast('  PHP et les objets  ');
$podcast->addDownload();
$podcast->addDownload();

echo 'Titre : ' . $podcast->getTitle() . PHP_EOL;
echo 'Téléchargements : ' . $podcast->getDownloadCount() . PHP_EOL;
