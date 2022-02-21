<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class GreekCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new GreekCurrencyTransformer();
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
            [222222200, 'EUR', 'δύο εκατομμύρια διακόσιες είκοσι δύο χίλιάδες διακόσια είκοσι δύο ευρώ'],
            [222222200, 'USD', 'δύο εκατομμύρια διακόσιες είκοσι δύο χίλιάδες διακόσια είκοσι δύο δολάρια'],
            [3100, 'USD', 'τριάντα ένα δολάριο'],
            [2222, 'EUR', 'είκοσι δύο ευρώ είκοσι δύο σεντς'],
            [2200, 'EUR', 'είκοσι δύο ευρώ 00 σεντς', $options],
            [2222, 'EUR', 'είκοσι δύο ευρώ είκοσι δύο σεντς', $options2],
            [2200, 'EUR', 'είκοσι δύο ευρώ μηδέν σεντς', $options2],
            [24300, 'EUR', 'διακόσια σαράντα τρια ευρώ 00 σεντς', $options],
            [2222, 'EUR', 'είκοσι δύο ευρώ 22 σεντς', $options],
            [456700, 'EUR', 'τέσσερις χίλιάδες πεντακόσια εξήντα επτά ευρώ 00 σεντς', $options],
            [156700, 'EUR', 'χίλια πεντακόσια εξήντα επτά ευρώ 00 σεντς', $options],
        ];
    }
}
