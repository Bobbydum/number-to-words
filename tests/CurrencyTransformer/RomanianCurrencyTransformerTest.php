<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class RomanianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new RomanianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShowDecimalIfZero(true);

        return [
            [100, 'ROL', 'un leu'],
            [200, 'ROL', 'doi lei'],
            [140, 'ROL', 'un leu și patruzeci de bani'],
            [145, 'ROL', 'un leu și patruzeci și cinci de bani'],
            [200000, 'ROL', 'două mii de lei'],
            [12100, 'ROL', 'una sută douăzeci și unu de lei și 00', $options],
            [12321, 'ROL', 'una sută douăzeci și trei de lei și 21', $options],
            [12500, 'ROL', 'una sută douăzeci și cinci de lei și 00', $options],
        ];
    }
}
