<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Smeghead\TddCopyingPhp\Pair;
use Smeghead\TddCopyingPhp\RateResolver;

require_once('vendor/autoload.php');

class RateResolverTest extends TestCase
{
    public function testAddRate()
    {
        $sut = new RateResolver();
        $sut->put(new Pair('CHF', 'USD'), 2);
        $sut->put(new Pair('CHF', 'JPY'), 3);

        $this->assertSame(2, $sut->get(new Pair('CHF', 'USD')));
        $this->assertSame(3, $sut->get(new Pair('CHF', 'JPY')));
    }
}
