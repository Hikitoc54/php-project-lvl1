<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\welcome;
use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\ROUNDS_COUNT;

function game(): void
{
    $result = '';
    $name = welcome();

    line('What is the result of the expression?');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum1 = rand(0, 25);
        $randNum2 = rand(0, 25);
        $operation = substr(str_shuffle('+-*'), 0, 1);
        $question = (string) $randNum1 . $operation . $randNum2;
        $correctAnswer = calculate($randNum1, $randNum2, $operation);
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

function calculate($randNum1, $randNum2, $operation)
{
    switch ($operation) {
        case "+":
            return ($randNum1 + $randNum2);
            break;
        case "-":
            return ($randNum1 - $randNum2);
            break;
        case "*":
            return ($randNum1 * $randNum2);
            break;
    }
}
