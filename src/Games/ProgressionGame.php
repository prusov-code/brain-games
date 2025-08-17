<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Cli\playGame;

function startProgressionGame(): void
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $progressionStartNumber = random_int(1, 100);
        $progressionStep = random_int(1, 100);
        $progressionLength = random_int(5, 10);
        $progression = [];
        for ($j = 0; $j < $progressionLength; $j++) {
            $progression[$j] = getProgressionElement($j, $progressionStartNumber, $progressionStep);
        }
        $progressionHiddenElementIndex = random_int(0, $progressionLength - 1);
        $answers[$i] = $progression[$progressionHiddenElementIndex];
        $progression[$progressionHiddenElementIndex] = '..';
        $questions[$i] = implode(' ', $progression);
    }
    playGame($questions, $answers, 'What number is missing in the progression?');
}

function getProgressionElement(int $index, int $progressionStartNumber, int $progressionStep): int
{
    return $progressionStartNumber + $index * $progressionStep;
}
