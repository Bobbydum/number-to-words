<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class SwedishCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SwedishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowDecimalIfZero(true);

        return [
            [100, 'SEK', 'en kr'],
            [200, 'SEK', 'två kr'],
            [500, 'SEK', 'fem kr'],
            [52481, 'SEK', 'fem hundra tjugo fyra kr åttio en'],
            [54000, 'SEK', 'fem hundra fyrtio kr'],
            [54100, 'SEK', 'fem hundra fyrtio en kr'],
            [54200, 'SEK', 'fem hundra fyrtio två kr'],
            [54400, 'SEK', 'fem hundra fyrtio fyra kr'],
            [54500, 'SEK', 'fem hundra fyrtio fem kr'],
            [54501, 'SEK', 'fem hundra fyrtio fem kr en'],
            [54552, 'SEK', 'fem hundra fyrtio fem kr femtio två'],
            [54599, 'SEK', 'fem hundra fyrtio fem kr nittio nio'],
            [54500, 'SEK', 'fem hundra fyrtio fem kr 00', $options],
            [12100, 'SEK', 'en hundra tjugo en kr 00', $options],
            [12321, 'SEK', 'en hundra tjugo tre kr 21', $options],
            [12500, 'SEK', 'en hundra tjugo fem kr 00', $options],
            [61500, 'SEK', 'sex hundra femton kr'],
            [154552, 'USD', 'en tusen fem hundra fyrtio fem dollar femtio två cent'],
            [304501, 'EUR', 'tre tusen fyrtio fem euro en eurocent'],
        ];
    }
}
