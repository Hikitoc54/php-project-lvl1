<?php

namespace Brain\Games\Even;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'Answer "yes" if given number is even, otherwise answer "no".';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function run()
{
    $generateRoundData = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
