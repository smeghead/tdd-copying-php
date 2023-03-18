<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

abstract class Money
{
    protected int $amount;
    protected string $currency;

    abstract public function times(int $multiplier): Money;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(self $other): bool
    {
        return $this->amount === $other->amount
            && get_class($this) === get_class($other);
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount, 'CHF');
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
