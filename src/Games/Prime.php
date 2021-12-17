<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greet;
use function Brain\Engine\runEngine;

use const Brain\Engine\ROUNDS_COUNT;

function play(): void
{
    $result = '';
    $name = greet();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum = rand(1, 100);
        $question = (string) $randNum;
        $correctAnswer = isPrime($randNum);
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

function isPrime(int $randNum)
{
    for ($i = 2; $i < $randNum; $i++) {
        if ($randNum % $i == 0) {
            return "no";
        }
    }
    return "yes";
}
