<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;

function sayGreeting(string $gameDescription = ''): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    if (!empty($gameDescription)) {
        line($gameDescription);
    }
    return $name;
}

function sayCongratulions(string $userName): void
{
    line("Congratulations, $userName!");
}

function sayUserLose(string $userAnswer, string $correctAnswer, string $userName): void
{
    line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
    line("Let's try again, $userName!");
}

function askQuestion(mixed $question): string
{
    line("Question: $question");
    return prompt("Your answer");
}

function playGame(array $questions, array $correctAnswers, string $gameDescription): void
{
    $userName = sayGreeting($gameDescription);
    for ($i = 0; $i < 3; $i++) {
        $question = $questions[$i];
        $correctAnswer = $correctAnswers[$i];
        $userAnswer = askQuestion($question);
        $userAnswer = is_numeric($userAnswer) ? (int)$userAnswer : $userAnswer;
        if ($userAnswer !== $correctAnswer) {
            sayUserLose($userAnswer, $correctAnswer, $userName);
            return;
        }
        line('Correct!');
    }
    sayCongratulions($userName);
}
