<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return Money::dollar($this->amount * $multiplier);
    }
}
