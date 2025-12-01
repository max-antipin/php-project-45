<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games;

use BrainGames\Cli\GameQuestion;
use BrainGames\Cli\Engine;

class PrimeGame extends Engine
{
    protected function generateGameQuestion(): GameQuestion
    {
        $n = \mt_rand(0, 99);
        return new GameQuestion((string)$n, $this->isPrime($n) ? 'yes' : 'no');
    }

    protected function getGameRules(): string
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    protected function isPrime(int $n): bool
    {
        if ($n === 0) {
            return false;
        }
        for ($i = 2; $i < $n; ++$i) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return true;
    }
}
