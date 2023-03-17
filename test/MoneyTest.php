<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Smeghead\TddCopyingPhp\Dollar;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $five->times(2);
        $this->assertSame(10, $five->amount);
    }
}
