<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class BulgarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new BulgarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowFractionIfZero(true);

        $options2 = new CurrencyTransformerOptions();
        $options2->setShowFractionIfZero(true);

        return [
            [222222200, 'BGN', 'два милиона двеста двадесет и две хиляди двеста двадесет и два лв.'],
            [222222200, 'BGN', 'два милиона двеста двадесет и две хиляди двеста двадесет и два лв.'],
            [3100, 'BGN', 'тридесет и един лв.'],
            [2222, 'BGN', 'двадесет и два лв. двадесет и две ст.'],
            [2200, 'BGN', 'двадесет и два лв. 00 ст.', $options],
            [2222, 'BGN', 'двадесет и два лв. двадесет и две ст.', $options2],
            [2200, 'BGN', 'двадесет и два лв. нула ст.', $options2],
            [24300, 'BGN', 'двеста четиридесет и три лв. 00 ст.', $options],
            [2222, 'BGN', 'двадесет и два лв. 22 ст.', $options],
            [456700, 'BGN', 'четири хиляди петстотин шестдесет и седем лв. 00 ст.', $options],
            [156700, 'BGN', 'хиляда петстотин шестдесет и седем лв. 00 ст.', $options],
            [12100, 'BGN', 'сто двадесет и един лв. 00 ст.', $options],
            [12321, 'BGN', 'сто двадесет и три лв. 21 ст.', $options],
            [12500, 'BGN', 'сто двадесет и пет лв. 00 ст.', $options],
            [10111110111, 'BGN', 'сто и един милиона сто и единадесет хиляди сто и един лв. 11 ст.', $options],
            [12321, 'BGN', 'сто двадесет и три лв. двадесет и една ст.'],
        ];
    }
}
