<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Sum implements Expression
{
    public Money $augend;
    public Money $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(string $to): Money
    {
        $amount = $this->augend->amount + $this->addend->amount;
        return new Money($amount, $to);
    }
}
