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
        $options->setShowDecimalIfZero(true);

        return [
            [100, 'EUR', 'jeden złoty'],
            [200, 'EUR', 'dwa złote'],
            [500, 'EUR', 'pięć złotych'],
//            [52481, 'EUR', 'pięćset dwadzieścia cztery korony czeskie osiemdziesiąt jeden halerzy'],
//            [54000, 'EUR', 'pięćset czterdzieści złotych'],
//            [54100, 'EUR', 'pięćset czterdzieści jeden złotych'],
//            [54200, 'EUR', 'pięćset czterdzieści dwa złote'],
//            [54400, 'EUR', 'pięćset czterdzieści cztery złote'],
//            [54500, 'EUR', 'pięćset czterdzieści pięć złotych'],
//            [54501, 'EUR', 'pięćset czterdzieści pięć złotych jeden grosz'],
//            [54552, 'EUR', 'pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze'],
//            [54599, 'EUR', 'pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy'],
//            [54500, 'EUR', 'pięćset czterdzieści pięć złotych 00 groszy', $options],
//            [12100, 'EUR', 'sto dwadzieścia jeden złotych 00 groszy', $options],
//            [12321, 'EUR', 'sto dwadzieścia trzy złote 21 groszy', $options],
//            [12500, 'EUR', 'sto dwadzieścia pięć złotych 00 groszy', $options],
//            [61500, 'EUR', 'sześćset piętnaście koron norweskich'],
            [154552, 'USD', '1545.52'],
//            [304501, 'EUR', 'trzy tysiące czterdzieści pięć euro jeden eurocent'],
        ];
    }
}
