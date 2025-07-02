<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** 
     * @test
     */
    public function it_returns_fizz_for_multiples_of_3()
    {
        foreach ([3, 6, 9] as $number) 
        {
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }
    }

    /** 
     * @test
     */
    public function it_returns_buzz_for_multiples_of_5()
    {
        foreach ([5, 10, 20] as $number) 
        {
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }
    }

    /** 
     * @test
     */
    public function it_returns_fizzbuzz_for_multiples_of_3_and_5()
    {
        foreach ([15, 30, 45] as $number) 
        {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }
    }

    /** 
     * @test
     */
    public function it_returns_the_original_number_if_not_divisible_by_3_or_5()
    {
        foreach ([1, 2, 4, 7, 8, 11] as $number) 
        {
            $this->assertEquals($number, FizzBuzz::convert($number));
        }
    }
}