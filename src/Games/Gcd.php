<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getDivisors(int $number): array
{
    $divisors = [];
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i === 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

function getGcd(int $randNum1, int $randNum2): int
{
    return max(array_intersect((getDivisors($randNum1)), (getDivisors($randNum2))));
}

function run()
{
    $generateRoundData = function () {
        $randNum1 = rand(2, 100);
        $randNum2 = rand(2, 100);
        return [
            'question' => "$randNum1 $randNum2",
            'answer' => (string)getGcd($randNum1, $randNum2)
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
