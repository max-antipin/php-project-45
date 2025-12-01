<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

abstract class Engine
{
    private const int N_ROUNDS = 3;

    public function __invoke(): void
    {
        $name = promptAndPrintName();
        line($this->getGameRules());
        for ($i = 0; $i < self::N_ROUNDS; ++$i) {
            $gameQuestion = $this->generateGameQuestion();
            line('Question: %s', $gameQuestion->question);
            $answer = prompt('Your answer');
            $isCorrect = $answer === $gameQuestion->answer;
            line(
                $isCorrect ? 'Correct!'
                : $this->getWrongAnswerMsg($answer, $gameQuestion->answer, $name)
            );
            if (!$isCorrect) {
                return;
            }
        }
        line("Congratulations, $name!");
    }

    abstract protected function generateGameQuestion(): GameQuestion;
    abstract protected function getGameRules(): string;

    protected function getWrongAnswerMsg(string $wrongAnswer, string $correctAnswer, string $name): string
    {
        return "'$wrongAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'." . PHP_EOL
            . "Let's try again, $name!";
    }
}
