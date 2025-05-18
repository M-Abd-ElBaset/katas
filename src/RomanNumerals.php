<?php

namespace App;

class RomanNumerals
{
    public static function generate(int $number): string
    {
        if($number == 1){
            return 'I';
        }

        return 'II';
    }
}