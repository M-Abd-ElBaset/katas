<?php

namespace App;
/**
 * Class Tennis
 * This class represents a Tennis game.
 */
class TennisMatch
{

    protected Player $playerOne;
    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score() : string
    {
        //check if we have a winner
        if($this->hasWinner())
        {
            return "Winner: " . $this->leader()->name;
        }

        if($this->hasAdvantage())
        {
            return "Advantage: " . $this->leader()->name;
        }


        if($this->isDeuce()) 
        {
            return "deuce";
        }

        return sprintf("%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
        );
    }

    protected function hasWinner(): bool
    {
        if(max($this->playerOne->points, $this->playerTwo->points) < 4)
        {
            return false;
        }
        
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;   
    }

    protected function hasAdvantage(): bool
    {
        return $this->playerOne->points >=3 && $this->playerTwo->points >=3 && abs($this->playerOne->points - $this->playerTwo->points) === 1;
    }

    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }

    protected function isDeuce(): bool
    {
        $canBeWon = $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
        return $canBeWon && $this->playerOne->points === $this->playerTwo->points;
    }
}