<?php

use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    public function it_scores_a_tennis_match(int $playerOnePoints, int $playerTwoPoints, string $score)
    {
        $match = new TennisMatch(
            $ahmed = new Player("Ahmed"), 
            $mohamed = new Player("Mohamed")
        );
        for($i=0; $i < $playerOnePoints; $i++) {
            $ahmed->score();
        }
        for($i=0; $i < $playerTwoPoints; $i++) {
            $mohamed->score();
        }
        $this->assertEquals($score, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, "love-love"],
            [1, 0, "fifteen-love"],
            [1, 1, "fifteen-fifteen"],
            [2, 0, "thirty-love"],
            [3, 0, "forty-love"],
            [2, 2, "thirty-thirty"],
            [3, 3, "deuce"],
            [4, 3, "Advantage: Ahmed"],
            [3, 4, "Advantage: Mohamed"],
            [4, 4, "deuce"],
            [5, 5, "deuce"],
            [4, 0, "Winner: Ahmed"],
            [0, 4, "Winner: Mohamed"],
        ];
    }
}