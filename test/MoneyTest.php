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
        $product = $five->times(2);
        $this->assertSame(10, $product->amount);
        $product = $five->times(3);
        $this->assertSame(15, $product->amount);
    }

    public function testEquality()
    {
        $five = new Dollar(5);
        $this->assertTrue($five->equals(new Dollar(5)));
        $this->assertFalse($five->equals(new Dollar(6)));
    }
}
