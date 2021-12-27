<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function runEngine(callable $generateRoundData, string $description)
{
    line('Welcome to the Brain Game!');

    $userName = prompt('May I have your name?');
    line("Hello, ${userName}!", $userName);

    line($description);


    $runRound = function (int $i) use ($generateRoundData, $userName, &$runRound) {
        if ($i >= MAX_ROUNDS_COUNT) {
            line("Congratulations, ${userName}!");
            return;
        }

        ['question' => $question, 'answer' => $correctAnswer] = $generateRoundData();

        line("Question: ${question}");

        $answer = prompt('Your answer');

        if ($correctAnswer !== $answer) {
            line("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
            line("Let's try again, ${userName}!");
            return;
        }

        line('Correct!');

        $runRound($i + 1);
    };

    $runRound(0);
}
