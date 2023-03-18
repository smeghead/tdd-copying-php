<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

abstract class Money
{
    protected int $amount;

    abstract public function times(int $multiplier): Money;

    public function equals(self $other): bool
    {
        return $this->amount === $other->amount
            && get_class($this) === get_class($other);
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount);
    }
}
