<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Pair
{
    private string $from;
    private string $to;
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function equals(self $other): bool
    {
        return $this->from === $other->from && $this->to === $other->to;
    }
}
