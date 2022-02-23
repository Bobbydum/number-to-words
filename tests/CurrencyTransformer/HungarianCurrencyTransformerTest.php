<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class HungarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new HungarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        return [
//            [0, 'HUF', 'nulla forint'],
//            [53, 'HUF', 'nulla forint ötvenhárom fillér'],
//            [100, 'HUF', 'egy forint'],
//            [103, 'HUF', 'egy forint három fillér'],
//            [300, 'HUF', 'három forint'],
//            [301, 'HUF', 'három forint egy fillér'],
//            [1000, 'HUF', 'tíz forint'],
//            [1100, 'HUF', 'tizenegy forint'],
//            [1130, 'HUF', 'tizenegy forint harminc fillér'],
//            [110000, 'HUF', 'egyezeregyszáz forint'],
//            [200000, 'HUF', 'kettőezer forint'],
//            [210000, 'HUF', 'kettőezer-egyszáz forint'],
//            [99900, 'EUR', 'kilencszázkilencvenkilenc euró'],
//            [100054, 'EUR', 'egyezer euró ötvennégy cent'],
//            [101000, 'USD', 'egyezertíz dollár'],
//            [101000, 'HUF', 'egyezertíz forint 00 fillér', $options],
//            [111111, 'USD', 'egyezeregyszáztizenegy dollár tizenegy cent'],
//            [12100, 'HUF', 'egyszázhuszonegy forint 00 fillér', $options],
//            [12321, 'HUF', 'egyszázhuszonhárom forint 21 fillér', $options],
//            [12500, 'HUF', 'egyszázhuszonöt forint 00 fillér', $options],
//            [22500, 'HUF', 'kétszázhuszonöt forint 00 fillér', $options],
        ];
    }
}
