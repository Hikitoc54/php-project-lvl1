<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greet;
use function Brain\Engine\runEngine;

use const Brain\Engine\ROUNDS_COUNT;

function play(): void
{
    $result = '';
    $name = greet();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum = rand(0, 100);
        $question = (string) $randNum;
        $correctAnswer = isEven($randNum);
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
function isEven(int $randNum): string
{
    if ($randNum % 2 === 0) {
        return 'yes';
    }
    return 'no';
}
