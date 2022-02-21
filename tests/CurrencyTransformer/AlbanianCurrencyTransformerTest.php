<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class AlbanianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new AlbanianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        return [
            [100, 'USD', 'një dollar'],
            [2000, 'USD', 'njëzet dollars'],
            [21240, 'ALL', 'dyqind e dymbëdhjetë leks 40 qindarkas', $options],
            [21200, 'ALL', 'dyqind e dymbëdhjetë leks 00 qindarkas', $options],
        ];
    }
}
