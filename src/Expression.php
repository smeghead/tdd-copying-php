<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

interface Expression
{
    public function times(int $multipier): Expression;
    public function plus(Expression $addend): Expression;
    public function reduce(Bank $bank, string $to): Money;
}
