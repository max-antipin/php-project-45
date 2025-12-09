<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const N_ROUNDS = 3;

function promptAndPrintName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', marker:' ');
    line('Hello, %s!', $name);
    return $name;
}

function runGame(string $gameRules, callable $generateGameQuestion): void
{
    $name = promptAndPrintName();
    line($gameRules);

    for ($i = 0; $i < N_ROUNDS; ++$i) {
        $gameQuestion = newGameQuestion(...$generateGameQuestion());
        line('Question: %s', $gameQuestion['question']);
        $answer = prompt('Your answer');
        $isCorrect = $answer === $gameQuestion['answer'];
        $line = $isCorrect ? 'Correct!' : getWrongAnswerMsg($answer, $gameQuestion['answer'], $name);
        line($line);
        if (!$isCorrect) {
            return;
        }
    }

    line("Congratulations, $name!");
}

function getWrongAnswerMsg(string $wrongAnswer, string $correctAnswer, string $name): string
{
    return "'$wrongAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'." . PHP_EOL
        . "Let's try again, $name!";
}

function newGameQuestion(string $question, string $answer): array
{
    return ['question' => $question, 'answer' => $answer];
}
