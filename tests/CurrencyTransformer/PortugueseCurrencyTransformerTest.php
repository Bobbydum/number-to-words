<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class PortugueseCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new PortugueseBrazilianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        return [
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros'],
            [54500, 'PLN', 'pięćset czterdzieści pięć złotych 00 groszy', $options],
            [12100, 'PLN', 'sto dwadzieścia jeden złotych 00 groszy', $options],
            [12321, 'PLN', 'sto dwadzieścia trzy złote 21 groszy', $options],
            [12500, 'PLN', 'sto dwadzieścia pięć złotych 00 groszy', $options],
        ];
    }
}
