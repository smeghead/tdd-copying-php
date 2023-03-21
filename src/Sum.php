<?php

declare(strict_types=1);

namespace Smeghead\TddCopyingPhp;

class Sum implements Expression
{
    public Expression $augend;
    public Expression $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function plus(Expression $addend): Expression
    {
        // TODO Expressionを返してない。仮実装
        return null;
    }
    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->amount + $this->addend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
    }
}
