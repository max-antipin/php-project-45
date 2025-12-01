<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games;

use BrainGames\Cli\GameQuestion;
use BrainGames\Cli\Engine;

class GcdGame extends Engine
{
    protected function generateGameQuestion(): GameQuestion
    {
        $n0 = \mt_rand(0, 99);
        $n1 = \mt_rand(0, 99);
        return new GameQuestion("$n0 $n1", (string)$this->getGCD($n0, $n1));
    }

    protected function getGameRules(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    protected function getGCD(int $a, int $b): int
    {
        return $b === 0 ? $a : $this->getGCD($b, $a % $b);
    }
}
