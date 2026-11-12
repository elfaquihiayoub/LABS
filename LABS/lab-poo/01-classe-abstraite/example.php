<?php

abstract class AudioContent
{
    public function __construct(protected string $title)
    {
    }

    abstract public function getTypeLabel(): string;

    public function getCardLabel(): string
    {
        return $this->getTypeLabel() . ' : ' . $this->title;
    }
}

final class Podcast extends AudioContent
{
    public function getTypeLabel(): string
    {
        return 'Podcast';
    }
}

$podcast = new Podcast('PHP et les objets');
echo $podcast->getCardLabel() . PHP_EOL;
