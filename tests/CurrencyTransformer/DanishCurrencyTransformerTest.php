<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class DanishCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new DanishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        return [
            [100, 'DKK', 'en krone'],
            [200, 'USD', 'to dollars'],
            [600, 'EUR', 'seks euro'],
            [1300, 'CHF', 'tretten schweitzer franc'],
            [12100, 'DKK', 'et hundrede en og tyve kroner og 00 øre', $options],
            [12321, 'DKK', 'et hundrede tre og tyve kroner og 21 øre', $options],
            [12500, 'DKK', 'et hundrede fem og tyve kroner og 00 øre', $options],
        ];
    }
}
