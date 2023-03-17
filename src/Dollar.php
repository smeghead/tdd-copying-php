<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Dollar
{
    public int $amount = 10;
    public function __construct(int $amount)
    {
    }
    public function times(int $multiplier): void
    {
    }
}
