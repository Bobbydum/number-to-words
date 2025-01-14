<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class UkrainianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new UkrainianCurrencyTransformer();
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
            [100, 'UAH', 'одна гривня'],
            [200, 'UAH', 'дві гривні'],
            [500, 'UAH', 'п\'ять гривень'],
            [34000, 'UAH', 'триста сорок гривень'],
            [34100, 'UAH', 'триста сорок одна гривня'],
            [34200, 'RUB', 'триста сорок два рубля'],
            [34400, 'UAH', 'триста сорок чотири гривні'],
            [34500, 'UAH', 'триста сорок п\'ять гривень'],
            [34500, 'UAH', 'триста сорок п\'ять гривень 00 копійок', $options],
            [34501, 'UAH', 'триста сорок п\'ять гривень одна копійка'],
            [34501, 'UAH', 'триста сорок п\'ять гривень 1 копійка', $options],
            [34501, 'UAH', 'триста сорок п\'ять гривень одна копійка', $options2],
            [34552, 'UAH', 'триста сорок п\'ять гривень п\'ятдесят дві копійки'],
            [34599, 'UAH', 'триста сорок п\'ять гривень дев\'яносто дев\'ять копійок'],
            [234200, 'UAH', 'дві тисячі триста сорок дві гривні'],
        ];
    }
}
