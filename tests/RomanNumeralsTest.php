<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     */
    function it_generates_roman_numerals_for_1(){
        $this->assertEquals('I', RomanNumerals::generate(1));
    }

    /**
     * @test
     */
    function it_generates_roman_numerals_for_2(){
        $this->assertEquals('II', RomanNumerals::generate(2));
    }
}