<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\EvenGame;

use BrainGames\Cli\GameQuestion;

function generateGameQuestion(): GameQuestion
{
    $n = \mt_rand(0, 999);
    return new GameQuestion((string)$n, isEven($n) ? 'yes' : 'no');
}

function isEven(int $n): bool
{
    return $n % 2 === 0;
}
