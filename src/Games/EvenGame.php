<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\EvenGame;

function generateGameQuestion(): array
{
    $n = \mt_rand(0, 999);
    return [(string)$n, isEven($n) ? 'yes' : 'no'];
}

function isEven(int $n): bool
{
    return $n % 2 === 0;
}
