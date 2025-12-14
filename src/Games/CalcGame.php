<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\CalcGame;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(
        'What is the result of the expression?',
        function (): array {
            static $operations = array_map(
                static fn(string $name): string => __NAMESPACE__ . '\\' . $name,
                [
                '+' => 'sum',
                '-' => 'sub',
                '*' => 'mul',
                ]
            );
            $n0 = \mt_rand(0, 99);
            $n1 = \mt_rand(0, 99);
            $sign = array_rand($operations);
            return ["$n0 $sign $n1", (string)$operations[$sign]($n0, $n1)];
        }
    );
}

function sum(int $n0, int $n1): int
{
    return $n0 + $n1;
}

function sub(int $n0, int $n1): int
{
    return $n0 - $n1;
}

function mul(int $n0, int $n1): int
{
    return $n0 * $n1;
}
