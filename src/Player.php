<?php

namespace App;

class Player
{
    public string $name;
    public int $points = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score(): void
    {
        $this->points++;
    }

    public function toTerm(): string
    {
        return match ($this->points) {
            0 => "love",
            1 => "fifteen",
            2 => "thirty",
            3 => "forty"
        };
    }
}