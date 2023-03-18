<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Dollar
{
    private int $amount = 0;
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }

    public function equals(self $other): bool
    {
        return $this->amount === $other->amount;
    }
}
