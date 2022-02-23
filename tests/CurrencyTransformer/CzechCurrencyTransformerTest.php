<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class CzechCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new CzechCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowFractionIfZero(true);

        $options2 = new CurrencyTransformerOptions();
        $options2->setShowFractionIfZero(true);

        $options3 = new CurrencyTransformerOptions();
        $options3->setConvertFraction(false);
        $options3->setShortCurrencySyntax(true);
        return [
            [222222200, 'CZK', 'dva milióny dvě stě dvacet dvě tisíc dvě stě dvacet dvě Kč'],
            [222222200, 'USD', 'dva milióny dvě stě dvacet dvě tisíc dvě stě dvacet dvě dolary'],
            [3100, 'USD', 'třicet jedna dolar'],
            [2222, 'CZK', 'dvacet dvě Kč dvacet dva'],
            [2200, 'CZK', 'dvacet dvě Kč 00', $options],
            [2222, 'CZK', 'dvacet dvě Kč dvacet dva', $options2],
            [24300, 'CZK', 'dvě stě čtyřicet tři Kč 00', $options],
            [12100, 'CZK', 'sto dvacet jedna Kč 00', $options],
            [12321, 'CZK', 'sto dvacet tři Kč 21', $options],
            [12500, 'CZK', 'sto dvacet pět Kč 00', $options],
            [12100, 'CZK', 'sto dvacet jedna Kč', $options3],
            [12300, 'CZK', 'sto dvacet tři Kč', $options3],
            [12500, 'CZK', 'sto dvacet pět Kč', $options3],
        ];
    }
}
