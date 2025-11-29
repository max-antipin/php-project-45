<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function promptAndPrintName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', marker:' ');
    line('Hello, %s!', $name);
    return $name;
}
