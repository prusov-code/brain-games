<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Cli\playGame;

function startPrimeGame(): void
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $questions[$i] = random_int(1, 100);
        $answers[$i] = isPrime($questions[$i]) ? 'yes' : 'no';
    }
    playGame($questions, $answers, 'Answer "yes" if given number is prime. Otherwise answer "no".');
}

function isPrime(int $number): bool
{
    if ($number < 2 || ($number > 2 && ($number % 2 === 0))) {
        return false;
    }
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
