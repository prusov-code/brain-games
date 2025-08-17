<?php

namespace BrainGames\CalcGame;

use function BrainGames\Cli\playGame;

function startCalcGame(): void
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $operationNumber = rand(1, 3);
        $operation = '';
        $expressionResult = 0;
        switch ($operationNumber) {
            case 1:
                $operation = '+';
                $expressionResult = $number1 + $number2;
                break;
            case 2:
                $operation = '-';
                $expressionResult = $number1 - $number2;
                break;
            case 3:
                $operation = '*';
                $expressionResult = $number1 * $number2;
                break;
        }
        $expression = "{$number1} {$operation} {$number2}";
        $questions[$i] = $expression;
        $answers[$i] = $expressionResult;
    }
    playGame($questions, $answers, 'What is the result of the expression?');
}
