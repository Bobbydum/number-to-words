<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class DutchCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new DutchCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowFractionIfZero(true);

        return [
            [100, 'EUR', 'één euro'],
            [200, 'EUR', 'twee euro'],
            [500, 'EUR', 'vijf euro'],
            [52481, 'EUR', 'vijfhonderdvierentwintig euro e éénentachtig euro-cent'],
            [54000, 'EUR', 'vijfhonderdveertig euro'],
            [54100, 'EUR', 'vijfhonderdéénenveertig euro'],
            [54200, 'EUR', 'vijfhonderdtweeenveertig euro'],
            [54400, 'EUR', 'vijfhonderdvierenveertig euro'],
            [54500, 'EUR', 'vijfhonderdvijfenveertig euro'],
            [54501, 'EUR', 'vijfhonderdvijfenveertig euro e één euro-cent'],
            [54552, 'EUR', 'vijfhonderdvijfenveertig euro e tweeenvijftig euro-cent'],
            [54599, 'EUR', 'vijfhonderdvijfenveertig euro e negenennegentig euro-cent'],
            [54500, 'EUR', 'vijfhonderdvijfenveertig euro e 00 euro-cent', $options],
            [12100, 'EUR', 'honderdéénentwintig euro e 00 euro-cent', $options],
            [12321, 'EUR', 'honderddrieentwintig euro e 21 euro-cent', $options],
            [12500, 'EUR', 'honderdvijfentwintig euro e 00 euro-cent', $options],
            [61500, 'EUR', 'zeshonderdvijftien euro'],
            [154552, 'USD', 'duizend vijfhonderdvijfenveertig dollar e tweeenvijftig cent'],
            [304501, 'EUR', 'drieduizend vijfenveertig euro e één euro-cent'],
        ];
    }
}
