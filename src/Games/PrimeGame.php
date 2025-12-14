<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\PrimeGame;

use function BrainGames\Engine\runGame;

function isPrime(int $n): bool
{
    if ($n === 0 || $n === 1) {
        return false;
    }
    for ($i = 2; $i < $n; ++$i) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    runGame(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        function (): array {
            $n = \mt_rand(0, 99);
            return [(string)$n, isPrime($n) ? 'yes' : 'no'];
        }
    );
}
