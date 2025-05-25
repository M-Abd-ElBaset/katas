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
            //check for strike
            if($this->rolls[$roll] === 10)
            {
                $score += $this->rolls[$roll];
                $score += $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
                $roll += 1; // Move to next roll after strike
                continue;
            }

            $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            

            //check for spare
            if($this->rolls[$roll] + $this->rolls[$roll + 1] === 10)
            {
                $score += $this->rolls[$roll + 2];
            }
            $roll += 2;
        }

        return $score;
    }
}