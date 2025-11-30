<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games;

use BrainGames\Cli\GameQuestion;
use BrainGames\Cli\Engine;

class EvenGame extends Engine
{
    protected function generateGameQuestion(): GameQuestion
    {
        $n = \mt_rand(0, 999);
        return new GameQuestion((string)$n, $this->isEven($n) ? 'yes' : 'no');
    }

    protected function getGameRules(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    private function isEven(int $n): bool
    {
        return $n % 2 === 0;
    }
}
