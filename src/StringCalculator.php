<?php

namespace App;

use Exception;

class StringCalculator
{
    public function add(string $numbers)
    {
        if(!$numbers) {
            return 0;
        }

        $delimiter = ",|\n";

        if (preg_match('/\/\/(.)\n/', $numbers, $matches)) {
            $delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        $numbers = preg_split("/{$delimiter}/", $numbers);

        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception("Negative numbers are not allowed.");
            }
        }

        $numbers = array_filter($numbers, fn($number) => $number <= 1000);
        
        return array_sum($numbers);
    }
}