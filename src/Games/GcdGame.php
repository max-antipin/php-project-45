<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\GcdGame;

use function BrainGames\Engine\runGame;

function getGCD(int $a, int $b): int
{
    return $b === 0 ? $a : getGCD($b, $a % $b);
}

function run(): void
{
    runGame(
        'Find the greatest common divisor of given numbers.',
        function (): array {
            $n0 = \mt_rand(0, 99);
            $n1 = \mt_rand(0, 99);
            return ["$n0 $n1", (string)getGCD($n0, $n1)];
        }
    );
}
