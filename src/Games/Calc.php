<?php

namespace Brain\Games\Calc;

use function Brain\Engine\runEngine;

const DESCRIPTION = 'What is the result of the expression?';

const OPERATIONS = ['+', '-', '*'];

function calculate(int $randNum1, int $randNum2, string $operation)
{
    switch ($operation) {
        case "+":
            return ($randNum1 + $randNum2);
        case "-":
            return ($randNum1 - $randNum2);
        case "*":
            return ($randNum1 * $randNum2);
        default:
            throw new \Exception('Undefined Operation');
    }
}

function run()
{
    $generateRoundData = function () {
        $num1 = rand(1, 25);
        $num2 = rand(1, 25);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        return [
            'question' => "$num1 $operation $num2",
            'answer' => (string) calculate($num1, $num2, $operation)
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
