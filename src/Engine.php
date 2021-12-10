<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function engine(string $question, string $correctAnswer): bool
{
    line("Question: {$question}");
    $answer = prompt('Your answer');
    if ($answer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        return false;
    }
}