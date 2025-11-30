<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games;

use BrainGames\Cli\GameQuestion;
use BrainGames\Cli\Engine;

class CalcGame extends Engine
{
    public function __construct()
    {
        $this->operations = [
            '+' => static fn(int $n0, int $n1) => $n0 + $n1,
            '-' => static fn(int $n0, int $n1) => $n0 - $n1,
            '*' => static fn(int $n0, int $n1) => $n0 * $n1,
        ];
    }

    private readonly array $operations;

    protected function generateGameQuestion(): GameQuestion
    {
        $n0 = \mt_rand(0, 99);
        $n1 = \mt_rand(0, 99);
        $sign = array_rand($this->operations);
        return new GameQuestion("$n0 $sign $n1", (string)$this->operations[$sign]($n0, $n1));
    }

    protected function getGameRules(): string
    {
        return 'What is the result of the expression?';
    }
}
