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
        $question = $randNum;
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => "$question",
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
