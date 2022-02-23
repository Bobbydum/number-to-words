<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class ItalianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new ItalianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        $options = new CurrencyTransformerOptions();
        $options->setConvertFraction(false);
        $options->setShortCurrencySyntax(true);
        $options->setShowFractionIfZero(true);

        return [
            [12100, 'EUR', 'centoventuno euro e 00 centesimi', $options],
            [12321, 'EUR', 'centoventitre euro e 21 centesimi', $options],
            [12500, 'EUR', 'centoventicinque euro e 00 centesimi', $options],
            [12321, 'EUR', 'centoventitre euro e ventuno centesimi'],
            [52481, 'EUR', 'cinquecentoventiquattro euro e ottantuno centesimi'],
            [54000, 'EUR', 'cinquecentoquaranta euro'],
            [54100, 'EUR', 'cinquecentoquarantuno euro'],
            [54200, 'EUR', 'cinquecentoquarantadue euro'],
            [54400, 'EUR', 'cinquecentoquarantaquattro euro'],
            [54500, 'EUR', 'cinquecentoquarantacinque euro'],
            [54501, 'EUR', 'cinquecentoquarantacinque euro e uno centesimi'],
            [54552, 'EUR', 'cinquecentoquarantacinque euro e cinquantadue centesimi'],
            [54599, 'EUR', 'cinquecentoquarantacinque euro e novantanove centesimi'],
            [54500, 'EUR', 'cinquecentoquarantacinque euro e 00 centesimi', $options],
            [61500, 'EUR', 'seicentoquindici euro'],
            [154552, 'EUR', 'millecinquecentoquarantacinque euro e cinquantadue centesimi'],
            [304501, 'EUR', 'tremilaquarantacinque euro e uno centesimi'],
        ];
    }
}
