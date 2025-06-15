<?php

namespace App;

class Game
{
    const FRAMES_PER_GAME = 10;

    private $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach(range(1, self::FRAMES_PER_GAME) as $frame)
        {
            if($this->isStrike($roll))
            {
                $score += $this->rolls[$roll] + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if($this->isSpare($roll))
            {
                $score += $this->spareBonus($roll);
            }
            
            $roll += 2;
        }

        return $score;
    }

    public function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    public function isSpare(int $roll): bool
    {
        return ($this->pinCount($roll) + $this->pinCount($roll + 1)) === 10;
    }

    public function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    public function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    public function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    public function pinCount($roll): int
    {
        return $this->rolls[$roll];
    }
}