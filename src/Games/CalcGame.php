<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\CalcGame;

function generateGameQuestion(): array
{
    static $operations = [
        '+' => static fn(int $n0, int $n1) => $n0 + $n1,
        '-' => static fn(int $n0, int $n1) => $n0 - $n1,
        '*' => static fn(int $n0, int $n1) => $n0 * $n1,
    ];
    $n0 = \mt_rand(0, 99);
    $n1 = \mt_rand(0, 99);
    $sign = array_rand($operations);
    return ["$n0 $sign $n1", (string)$operations[$sign]($n0, $n1)];
}
