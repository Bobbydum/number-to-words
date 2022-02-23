<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class FrenchCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new FrenchCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShowFractionIfZero(true);

        $options2 = new CurrencyTransformerOptions();
        $options2->setShowFractionIfZero(true);

        return [
            [100, 'EUR', 'un euro'],
            [200, 'EUR', 'deux euros'],
            [235715, 'EUR', 'deux mille trois cent cinquante-sept euros et quinze centimes'],
            [1522501, 'EUR', 'quinze mille deux cent vingt-cinq euros et un centime'],
            [123456789, 'XPF', 'un million deux cent trente-quatre mille cinq cent soixante-sept francs CFP et quatre-vingt-neuf centimes'],
            [754414599, 'AUD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars australiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'CAD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars canadiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'USD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars américains et quatre-vingt-dix-neuf cents'],
            [12100, 'EUR', 'cent vingt et un euros et 00 centimes', $options],
            [12321, 'EUR', 'cent vingt-trois euros et 21 centimes', $options],
            [12500, 'EUR', 'cent vingt-cinq euros et 00 centimes', $options],
            [12500, 'EUR', 'cent vingt-cinq euros et zéro centimes', $options2],
        ];
    }
}
