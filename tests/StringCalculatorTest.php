<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */

     public function it_evaluates_an_empty_string_as_zero()
     {
        $calculator = new StringCalculator();
        $this->assertSame(0, $calculator->add(''));
     }

    /**
     * @test
     */

     public function it_finds_the_sum_of_a_single_number()
     {
        $calculator = new StringCalculator();
        $this->assertSame(5, $calculator->add('5'));
     }


    /**
     * @test
     */

     public function it_finds_the_sum_of_two_numbers()
     {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add('5,5'));
     }

    /**
     * @test
     */

     public function it_finds_the_sum_of_any_amount_of_numbers()
     {
        $calculator = new StringCalculator();
        $this->assertSame(19, $calculator->add('5,5,5,4'));
     }

    /**
     * @test
     */

     public function it_accepts_a_new_line_as_delimiter_too()
     {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("5\n5"));
     }
}