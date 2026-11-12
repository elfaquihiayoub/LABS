<?php

class Media
{
    public function __construct(
        protected string $title,
        protected int $durationInSeconds
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

final class Podcast extends Media
{
    public function __construct(
        string $title,
        int $durationInSeconds,
        private string $host
    ) {
        parent::__construct($title, $durationInSeconds);
    }

    public function getDescription(): string
    {
        return $this->getTitle()
            . ' - ' . $this->host
            . ' - ' . $this->durationInSeconds . ' secondes';
    }
}

$podcast = new Podcast('PHP au quotidien', 900, 'Nadia');
echo $podcast->getDescription() . PHP_EOL;
