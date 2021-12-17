<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greet;
use function Brain\Engine\runEngine;

use const Brain\Engine\ROUNDS_COUNT;

function play(): void
{
    $result = '';
    $name = greet();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum1 = rand(0, 100);
        $randNum2 = rand(0, 100);
        $question = "$randNum1 $randNum2";
        $correctAnswer =(string) getGcd($randNum1, $randNum2);
        $engine = runEngine($question, $correctAnswer);
        if ($engine) {
            $result = "Congratulations, $name!";
        } else {
            $result = "Let's try again, $name!";
            break;
        }
    }
    line($result);
}

function divide(int $number): array
{
    $divisors = [];
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

function getGcd(int $randNum1, int $randNum2): int
{
    return max(array_intersect((divide($randNum1)), (divide($randNum2))));
}
