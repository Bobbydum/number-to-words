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
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        $options2 = new CurrencyTransformerOptions();
        $options2->setShowDecimalIfZero(true);

        return [
            [600, 'EUR', 'sechs Euro'],
            [54532, 'EUR', 'fünfhundertfünfundvierzig Euro und 32 Сent', $options],
            [54500, 'EUR', 'fünfhundertfünfundvierzig Euro und 00 Сent', $options],
            [54500, 'EUR', 'fünfhundertfünfundvierzig Euro und null Сent', $options2],
            [54503, 'EUR', 'fünfhundertfünfundvierzig Euro und drei Сent', $options2],
            [12100, 'EUR', 'einhunderteinundzwanzig Euro und 00 Сent', $options],
            [12321, 'EUR', 'einhundertdreiundzwanzig Euro und 21 Сent', $options],
            [12500, 'EUR', 'einhundertfünfundzwanzig Euro und 00 Сent', $options],
            [12100, 'EUR', 'einhunderteinundzwanzig Euro und null Сent', $options2],
            [12321, 'EUR', 'einhundertdreiundzwanzig Euro und einundzwanzig Сent', $options2],
            [12500, 'EUR', 'einhundertfünfundzwanzig Euro und null Сent', $options2],
        ];
    }
}
