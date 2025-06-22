<?php

namespace App;
/**
 * Class Tennis
 * This class represents a Tennis game.
 */
class TennisMatch
{
    protected int $playerOnePoints = 0;
    protected int $playerTwoPoints = 0;

    public function score() : string
    {
        if($this->playerOnePoints > $this->playerTwoPoints) {
            return "fifteen-love";
        }
        return "love-love";
    }

    public function pointToPlayerOne() : void
    {
        // Logic to add a point to Player 1
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo() : void
    {
        // Logic to add a point to Player 2
        $this->playerTwoPoints++;
    }
}