<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\welcome;
use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\ROUNDS_COUNT;

function game(): void
{
    $result = '';
    $name = welcome();
    line('What number is missing in the progression?');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = rand(1, 10);
        $oldProg = progress($start);
        $size = count(progress($start));
        $changedKey = rand(0, $size - 1);
        $newProg = $oldProg;
        $newProg[$changedKey] = '..';
        $question = implode(" ", $newProg);
        $correctAnswer = $oldProg[$changedKey];
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

function progress($start): array
{
    $progression = [];
    $progression[0] = $start;
    $lengh = rand(5, 10);
    for ($i = 1; $i < ($lengh - 1); $i++) {
        $progression[] = $progression[$i - 1] + $start;
    }
    return $progression;
}
