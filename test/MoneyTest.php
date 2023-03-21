<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Smeghead\TddCopyingPhp\Bank;
use Smeghead\TddCopyingPhp\Money;
use Smeghead\TddCopyingPhp\Sum;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue(Money::dollar(10)->equals($five->times(2)));
        $this->assertTrue(Money::dollar(15)->equals($five->times(3)));
    }

    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    public function testCurrency()
    {
        $this->assertSame('USD', Money::dollar(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertTrue(Money::dollar(10)->equals($reduced));
    }

    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $this->assertTrue($five->equals($sum->augend));
        $this->assertTrue($five->equals($sum->addend));
    }

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');
        $this->assertTrue(Money::dollar(1)->equals($result));
    }

    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        $this->assertTrue(Money::dollar(1)->equals($result));
    }

    public function testMixedAddition()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce($fiveBucks->plus($tenFrancs), 'USD');
        $this->assertTrue(Money::dollar(10)->equals($result));
    }

    public function testSumPlusMoney()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $sum = new Sum($fiveBucks, $tenFrancs);
        $sum = $sum->plus($fiveBucks);
        $result = $bank->reduce($sum, 'USD');

        $this->assertTrue(Money::dollar(15)->equals($result));
    }

    public function testSumTimes() {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $sum = new Sum($fiveBucks, $tenFrancs);
        $sum = $sum->times(2);
        $result = $bank->reduce($sum, 'USD');

        $this->assertTrue(Money::dollar(20)->equals($result));
    }

}
