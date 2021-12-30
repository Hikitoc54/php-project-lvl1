<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $start, int $length, int $step): array
{
    $progression = [];
    $progression[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $progression[] = $progression[$i - 1] + $step;
    }
    return $progression;
}

function run()
{
    $generateRoundData = function () {
        $start = rand(1, 10);
        $step = $start;
        $length = rand(6, 10);
        $oldProgression = generateProgression($start, $length, $step);
        $size = count($oldProgression);
        $changedKey = rand(0, ($size - 1));
        $newProgression = $oldProgression;
        $newProgression[$changedKey] = '..';
        $correctAnswer = $oldProgression[$changedKey];
        return [
            'question' => implode(' ', $newProgression),
            'answer' => (string) $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
