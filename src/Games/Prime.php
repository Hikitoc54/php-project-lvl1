<?php

namespace Brain\Games\Prime;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $randNum): bool
{
    if ($randNum <= 1) {
        return false;
    }
    for ($i = 2; $i < $randNum; $i++) {
        if ($randNum % $i === 0) {
            return false;
        }
    }
    return true;
}

function run()
{
    $generateRoundData = function () {
        $randNum = rand(1, 100);
        $correctAnswer = isPrime($randNum) ? 'yes' : 'no';
        return [
            'question' => "$randNum",
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
