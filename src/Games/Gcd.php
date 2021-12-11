<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\welcome;
use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\ROUNDS_COUNT;

function game(): void
{
    $result = '';
    $name = welcome();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum1 = rand(0, 100);
        $randNum2 = rand(0, 100);
        $question = (string)"$randNum1 $randNum2";
        $correctAnswer = gcd($randNum1, $randNum2);
        $engine = engine($question, $correctAnswer);
        if ($engine) {
            $result = "Congratulations, $name!";
        } else {
            $result = "Let's try again, $name!";
            break;
        }
    }
    line($result);
}

function divide($number): array
{
    $divisors = [];
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

function gcd($randNum1, $randNum2): int
{
    return max(array_intersect((divide($randNum1)), (divide($randNum2))));
}
