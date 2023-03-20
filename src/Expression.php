<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

interface Expression
{
    public function reduce(Bank $bank, string $to): Money;
}
