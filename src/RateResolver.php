<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class RateResolver
{
    /** @var array<Rate> */
    private array $rates = [];

    public function put(Pair $key, int $rate)
    {
        $this->rates[] = new Rate($key, $rate);
    }
    public function get(Pair $key): int
    {
        $rate = $this->find($key);
        if (empty($rate)) {
            throw new \Exception('invalid key');
        }
        return $rate->getRate();
    }

    private function find(Pair $key): ?Rate
    {
        foreach ($this->rates as $rate) {
            if ($rate->getKey()->equals($key)) {
                return $rate;
            }
        }
        return null;
    }
}

class Rate
{
    private Pair $key;
    private int $rate;

    public function __construct(Pair $key, int $rate)
    {
        $this->key = $key;
        $this->rate = $rate;
    }

    public function getKey(): Pair
    {
        return $this->key;
    }
    public function getRate(): int
    {
        return $this->rate;
    }
}
