<?php

use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     */
    public function it_scores_0_0()
    {
        $match = new TennisMatch();
        $this->assertEquals("love-love", $match->score());
    }

    /**
     * @test
     */
    public function it_scores_1_0()
    {
        $match = new TennisMatch();
        $match->pointToPlayerOne();
        $this->assertEquals("fifteen-love", $match->score());
    }
}