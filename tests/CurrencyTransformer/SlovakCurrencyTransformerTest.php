<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class SlovakCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SlovakCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);

        return [
            [100, 'USD', 'jeden dolár'],
            [2000, 'USD', 'dvadsať dolárov'],
            [2100, 'USD', 'dvadsaťjeden dolárov'],
            [12100, 'EUR', 'sto dvadsaťjeden EUR', $options],
            [12321, 'EUR', 'sto dvadsaťtri EUR 21/100', $options],
            [12500, 'EUR', 'sto dvadsaťpäť EUR', $options],
        ];
    }
}
