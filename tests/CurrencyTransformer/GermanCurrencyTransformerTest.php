<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class GermanCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new GermanCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShowDecimalIfZero(true);

        $options2 = new CurrencyTransformerOptions();
        $options2->setShowDecimalIfZero(true);

        return [
            [600, 'EUR', 'sechs Euro'],
            [54532, 'EUR', 'fünfhundertfünfundvierzig Euro und 32 cent', $options],
            [54500, 'EUR', 'fünfhundertfünfundvierzig Euro und 00 cent', $options],
            [54500, 'EUR', 'fünfhundertfünfundvierzig Euro und null cent', $options2],
            [54503, 'EUR', 'fünfhundertfünfundvierzig Euro und drei cent', $options2],
        ];
    }
}
