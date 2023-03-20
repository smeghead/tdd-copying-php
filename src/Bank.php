<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Bank
{
    private RateResolver $rates;
    public function __construct()
    {
        $this->rates = new RateResolver();
    }

    public function reduce(Expression $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates->put(new Pair($from, $to), $rate);
    }

    public function rate(string $from, string $to): int
    {
        if ($from === $to) return 1;
        return $this->rates->get(new Pair($from, $to));
    }
}
