<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimiter = ",|\n";

    public function add(string $numbers)
    {
        if(!$numbers) {
            return 0;
        }

        $this->disallowNegatives($numbers = $this->parseString($numbers));

        return array_sum($this->ignoreGreaterThanMax($numbers));
    }

    protected function parseString(string $numbers) : array
    {
        $customDelimiterPattern = "\/\/(.)\n";

        if (preg_match("/{$customDelimiterPattern}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    protected function disallowNegatives(array $numbers) : void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception("Negative numbers are not allowed.");
            }
        }
    }

    protected function ignoreGreaterThanMax(array $numbers) : array
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }
}