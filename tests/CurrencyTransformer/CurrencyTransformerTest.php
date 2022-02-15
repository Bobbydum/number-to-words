<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;
use PHPUnit\Framework\TestCase;

abstract class CurrencyTransformerTest extends TestCase
{
    protected CurrencyTransformer $currencyTransformer;

    /**
     * @dataProvider providerItConvertsMoneyAmountToWords
     */
    public function testItConvertsMoneyAmountToWords(
        float $amount,
        string $currency,
        string $expectedString,
        ?CurrencyTransformerOptions $options = null
    ): void {
        if (null === $this->currencyTransformer) {
            self::markTestIncomplete('Please initialize $currencyTransformer property.');
        }

        self::assertEquals($expectedString, $this->currencyTransformer->toWords($amount, $currency, $options));
    }

    abstract public function providerItConvertsMoneyAmountToWords(): array;
}
