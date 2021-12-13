<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\welcome;
use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\ROUNDS_COUNT;

function game(): void
{
    $result = '';
    $name = welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum = rand(1, 100);
        $question = (string) $randNum;
        $correctAnswer = isPrime($randNum);
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

function isPrime($randNum)
{
    for ($i = 2; $i < $randNum; $i++) {
        if ($randNum % $i == 0) {
            return "no";
        }
    }
    return "yes";
}
