<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $start): array
{
    $progression = [];
    $progression[0] = $start;
    $lengh = rand(6, 10);
    for ($i = 1; $i < $lengh; $i++) {
        $progression[] = $progression[$i - 1] + $start;
    }
    return $progression;
}

function run()
{
    $generateRoundData = function () {
        $start = rand(1, 10);
        $oldProg = generateProgression($start);
        $size = count($oldProg);
        $changedKey = rand(0, ($size - 1));
        $newProg = $oldProg;
        $newProg[$changedKey] = '..';
        $correctAnswer = $oldProg[$changedKey];
        return [
            'question' => implode(' ', $newProg),
            'answer' => (string) $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
