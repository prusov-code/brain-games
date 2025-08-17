<?php

namespace BrainGames\EvenGame;

use function BrainGames\Cli\playGame;

function startEvenGame(): void
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $questions[$i] = rand_int(1, 100);
        $answers[$i] = isEven($questions[$i]) ? 'yes' : 'no';
    }
    playGame($questions, $answers, 'Answer "yes" if the number is even, otherwise answer "no".');
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
