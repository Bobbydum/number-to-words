<?php

namespace NumberToWords\NumberTransformer;

class PortugueseBrazilianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new PortugueseBrazilianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'zero'],
            [1, 'um'],
            [2, 'dois'],
            [3, 'três'],
            [4, 'quatro'],
            [5, 'cinco'],
            [6, 'seis'],
            [7, 'sete'],
            [8, 'oito'],
            [9, 'nove'],
            [11, 'onze'],
            [12, 'doze'],
            [16, 'dezesseis'],
            [19, 'dezenove'],
            [20, 'vinte'],
            [21, 'vinte e um'],
            [26, 'vinte e seis'],
            [30, 'trinta'],
            [31, 'trinta e um'],
            [40, 'quarenta'],
            [43, 'quarenta e três'],
            [50, 'cinqüenta'],
            [55, 'cinqüenta e cinco'],
            [60, 'sessenta'],
            [67, 'sessenta e sete'],
            [70, 'setenta'],
            [79, 'setenta e nove'],
            [100, 'cem'],
            [101, 'cento e um'],
            [199, 'cento e noventa e nove'],
            [203, 'duzentos e três'],
            [287, 'duzentos e oitenta e sete'],
            [300, 'trezentos'],
            [356, 'trezentos e cinqüenta e seis'],
            [410, 'quatrocentos e dez'],
            [434, 'quatrocentos e trinta e quatro'],
            [578, 'quinhentos e setenta e oito'],
            [689, 'seiscentos e oitenta e nove'],
            [729, 'setecentos e vinte e nove'],
            [717, 'setecentos e dezessete'],
            [894, 'oitocentos e noventa e quatro'],
            [999, 'novecentos e noventa e nove'],
            [1000, 'um mil'],
            [1001, 'um mil e um'],
            [1097, 'um mil e noventa e sete'],
            [1104, 'um mil cento e quatro'],
            [1243, 'um mil duzentos e quarenta e três'],
            [2200, 'dois mil e duzentos'],
            [2385, 'dois mil trezentos e oitenta e cinco'],
            [3766, 'três mil setecentos e sessenta e seis'],
            [4196, 'quatro mil cento e noventa e seis'],
            [5846, 'cinco mil oitocentos e quarenta e seis'],
            [6459, 'seis mil quatrocentos e cinqüenta e nove'],
            [7232, 'sete mil duzentos e trinta e dois'],
            [8569, 'oito mil quinhentos e sessenta e nove'],
            [9539, 'nove mil quinhentos e trinta e nove'],
            [1000001, 'um milhão e um'],
            [2000025, 'dois milhões e vinte e cinco'],
            [5100000, 'cinco milhões e cem mil'],
            [5015004, 'cinco milhões quinze mil e quatro'],
            [5123000, 'cinco milhões cento e vinte e três mil'],
            [7100100, 'sete milhões cem mil e cem'],
            [8100345, 'oito milhões cem mil trezentos e quarenta e cinco'],
            [8000016, 'oito milhões e dezesseis'],
            [100000001, 'cem milhões e um'],
            [345199054, 'trezentos e quarenta e cinco milhões cento e noventa e nove mil e cinqüenta e quatro'],
            [1000077000, 'um bilhão e setenta e sete mil'],
            [1000777000, 'um bilhão setecentos e setenta e sete mil'],
        ];
    }
}