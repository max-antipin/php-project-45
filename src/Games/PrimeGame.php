<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\PrimeGame;

function generateGameQuestion(): array
{
    $n = \mt_rand(0, 99);
    return [(string)$n, isPrime($n) ? 'yes' : 'no'];
}

function isPrime(int $n): bool
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
