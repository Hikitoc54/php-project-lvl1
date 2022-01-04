<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $start, int $length, int $step): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function run()
{
    $generateRoundData = function () {
        $start = rand(1, 10);
        $step = rand(1, 10);
        $length = rand(6, 10);
        $Progression = generateProgression($start, $length, $step);
        $indexForChange = rand(0, ($length - 1));
        $correctAnswer = $Progression[$indexForChange];
        $Progression[$indexForChange] = '..';
        return [
            'question' => implode(' ', $Progression),
            'answer' => (string) $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
