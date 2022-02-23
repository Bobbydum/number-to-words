<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class PortugueseCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new PortugueseCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShowFractionIfZero(true);

        return [
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros'],
            [54500, 'EUR', 'quinhentos e quarenta e cinco euros e 00 centavo', $options],
            [12100, 'EUR', 'cento e vinte e um euros e 00 centavo', $options],
            [12321, 'EUR', 'cento e vinte e três euros e 21 centavos', $options],
            [12500, 'EUR', 'cento e vinte e cinco euros e 00 centavo', $options],
        ];
    }
}
