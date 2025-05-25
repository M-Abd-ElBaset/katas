<?php

use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{

    /** 
     * @test
    */
    public function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll)
        {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

    /** 
     * @test
    */
    public function it_scores_all_ones()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll)
        {
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }

    /** 
     * @test
    */
    public function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $game = new Game();

        $game->roll(5);
        $game->roll(5); // Spare

        $game->roll(8); // Bonus for spare

        foreach (range(1, 17) as $roll)
        {
            $game->roll(0);
        }

        $this->assertSame(26, $game->score());
    }

    /** 
     * @test
    */
    public function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $game = new Game();

        $game->roll(10); // Strike
        
        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $roll)
        {
            $game->roll(0);
        }

        $this->assertSame(24, $game->score());
    }


}