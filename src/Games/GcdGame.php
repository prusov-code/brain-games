<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Cli\playGame;

function startGcdGame(): void
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);

        $questions[$i] = "$number1 $number2";
        $answers[$i] = findGcd($number1, $number2);
    }
    playGame($questions, $answers, 'Find the greatest common divisor of given numbers.');
}

function findGcd(int $number1, int $number2): int
{
    while ($number2 !== 0) {
        $tempNumber2 = $number2;
        $number2 = $number1 % $number2;
        $number1 = $tempNumber2;
    }
    return $number1;
}
