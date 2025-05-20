<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     */
    function it_generates_roman_numerals(int $number, string $expected){
        $this->assertEquals($expected, RomanNumerals::generate($number));
    }

    /**
     * @test
     */
    function it_cannot_generate_for_less_than_1(){
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /**
     * @test
     */
    function it_cannot_generate_for_more_than_3999(){
        $this->assertFalse(RomanNumerals::generate(0));
    }

    public function checks(){
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX'],
        ];
    }
}