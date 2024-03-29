<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Money implements Expression
{
    public int $amount; // PHP にパッケージ内アクセスがないためpublicにする
    // protected int $amount;
    protected string $currency;

    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(self $other): bool
    {
        return $this->amount === $other->amount
            && $this->currency === $other->currency;
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function plus(Expression $other): Expression
    {
        return new Sum($this, $other);
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }
}
