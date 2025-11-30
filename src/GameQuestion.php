<?php

declare(strict_types=1);

namespace BrainGames\Cli;

final readonly class GameQuestion
{
    public function __construct(
        public string $question,
        public string $answer,
    ) {
    }
}
