<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Money
{
    protected int $amount;
    
    public function equals(self $other): bool
    {
        return $this->amount === $other->amount;
    }

}
