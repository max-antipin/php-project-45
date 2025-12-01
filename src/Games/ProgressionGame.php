<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\ProgressionGame;

use BrainGames\Cli\GameQuestion;

function generateGameQuestion(): GameQuestion
{
    $start = \mt_rand(0, 20);
    $step = \mt_rand(1, 25);
    $progr = range(0, \mt_rand(5, 10));
    foreach ($progr as &$n) {
        $n = $start + $step * $n;
    }
    $i = array_rand($progr);
    $answer = $progr[$i];
    $progr[$i] = '..';
    return new GameQuestion(implode(' ', $progr), (string)$answer);
}
