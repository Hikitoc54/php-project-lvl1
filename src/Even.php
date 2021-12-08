<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;
function isEven($number) :string
{
    if ($number%2===0) {
        return "yes";
    } else {
        return "no";
    }
}


function evenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $number = rand(0, 100);
        $result = '';
        $correctAnswer = isEven($number);
        line("Question:$number");
        $answer = prompt('Your answer');
        if ($answer == isEven($number)) {
            echo "Correct!\n";
            $result = $i;
        } else {
            echo "'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\n";
            break;
        }
    }

    if ($result == 2) {
        echo "Congratulations, $name! \n";
    } else {
        echo "Let's try again, $name! \n";
    }
}
