<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Cs extends Ru
{
    const LOCALE = 'cs';
    const LANGUAGE_NAME = 'Czech';
    const LANGUAGE_NAME_NATIVE = 'Czech';

    private $minus = 'mínus';

    private static $exponent = [
        0 => [''],
        3 => ['tisíc', 'tisíce', 'tisíc'],
        6 => ['milión', 'milióny', 'miliónů'],
        9 => ['miliarda', 'miliardy', 'miliardů'],
        12 => ['bilion', 'biliony', 'bilionů'],
        15 => ['biliarda', 'biliardy', 'biliard'],
        18 => ['trilion', 'triliony', 'trilionů'],
        21 => ['triliarda', 'triliardy', 'triliard'],
        24 => ['kvadrilion', 'kvadriliony', 'kvadrilionů'],
        30 => ['kvintilion', 'kvintiliony', 'kvintilionů'],
        36 => ['sextilion', 'sextiliony', 'sextilionů'],
        42 => ['septilion', 'septiliony', 'septilionů'],
        48 => ['oktilion', 'oktiliony', 'oktilionů'],
        54 => ['nonilion', 'noniliony', 'nonilionů'],
        60 => ['decilion', 'deciliony', 'decilionů'],
        66 => ['undecilion', 'undeciliony', 'undecilionů'],
        72 => ['duodecilion', 'duodeciliony', 'duodecilionů'],
        78 => ['tredecilion', 'tredeciliony', 'tredecilionů'],
        84 => ['kvatrodecilion', 'kvatrodeciliony', 'kvatrodecilionů'],
        90 => ['kvindecilion', 'kvindeciliony', 'kvindecilionů'],
        96 => ['sexdecilion', 'sexdeciliony', 'sexdecilionů'],
        102 => ['septendecilion', 'septendeciliony', 'septendecilionů'],
        108 => ['oktodecilion', 'oktodeciliony', 'oktodecilionů'],
    ];

    private static $hundreds = [
        'sto',
        'stě',
        'sta',
        'set'
    ];

    private static $digits = [
        [
            'nula',
            'jeden',
            'dva',
            'tři',
            'čtyři',
            'pět',
            'šest',
            'sedm',
            'osm',
            'devět',
        ],
        [
            'nula',
            'jedna',
            'dvě',
            'tři',
            'čtyři',
            'pět',
            'šest',
            'sedm',
            'osm',
            'devět',
        ]
    ];

    protected static $currencyNames = [
        'ALL' => [
            [1, 'лек', 'лека', 'леков'],
            [2, 'киндарка', 'киндарки', 'киндарок']
        ],
        'AUD' => [
            [1, 'австралийский доллар', 'австралийских доллара', 'австралийских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'BGN' => [
            [1, 'лев', 'лева', 'левов'],
            [2, 'стотинка', 'стотинки', 'стотинок']
        ],
        'BRL' => [
            [1, 'бразильский реал', 'бразильских реала', 'бразильских реалов'],
            [1, 'сентаво', 'сентаво', 'сентаво']
        ],
        'BYN' => [
            [1, 'белорусский рубль', 'белорусских рубля', 'белорусских рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'BYR' => [
            [1, 'белорусский рубль', 'белорусских рубля', 'белорусских рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'CAD' => [
            [1, 'канадский доллар', 'канадских доллара', 'канадских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'CHF' => [
            [1, 'швейцарский франк', 'швейцарских франка', 'швейцарских франков'],
            [1, 'сантим', 'сантима', 'сантимов']
        ],
        'CNY' => [
            [1, 'китайский юань', 'китайских юаня', 'китайских юаней'],
            [1, 'фынь', 'фыня', 'фыней']
        ],
        'CYP' => [
            [1, 'кипрский фунт', 'кипрских фунта', 'кипрских фунтов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'CZK' => [
            [2, 'чешская крона', 'чешских кроны', 'чешских крон'],
            [1, 'галирж', 'галиржа', 'галиржей']
        ],
        'DKK' => [
            [2, 'датская крона', 'датских кроны', 'датских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'EEK' => [
            [2, 'эстонская крона', 'эстонских кроны', 'эстонских крон'],
            [1, 'сенти', 'сенти', 'сенти']
        ],
        'EUR' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'центов']
        ],
        'GBP' => [
            [1, 'фунт стерлингов', 'фунта стерлингов', 'фунтов стерлингов'],
            [1, 'пенс', 'пенса', 'пенсов']
        ],
        'HKD' => [
            [1, 'гонконгский доллар', 'гонконгских доллара', 'гонконгских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'HRK' => [
            [2, 'хорватская куна', 'хорватских куны', 'хорватских кун'],
            [2, 'липа', 'липы', 'лип']
        ],
        'HUF' => [
            [1, 'венгерский форинт', 'венгерских форинта', 'венгерских форинтов'],
            [1, 'филлер', 'филлера', 'филлеров']
        ],
        'IRR' => [
            [1, 'иранский риал', 'иранских риала', 'иранских риалов'],
            [1, 'динар', 'динара', 'динаров']
        ],
        'ISK' => [
            [2, 'исландская крона', 'исландских кроны', 'исландских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'JPY' => [
            [2, 'иена', 'иены', 'иен'],
            [2, 'сена', 'сены', 'сен']
        ],
        'KGS' => [
            [1, 'киргизский сом', 'киргизских сома', 'киргизских сомов'],
            [1, 'тыйын', 'тыйына', 'тыйынов']
        ],
        'KZT' => [
            [0, 'казахский тенге', 'казахских тенге', 'казахских тенге'],
            [1, 'тиын', 'тиына', 'тиынов']
        ],
        'KWD' => [
            [1, 'кувейтский динар', 'кувейтских динара', 'кувейтских динаров'],
            [1, 'филс', 'филса', 'филсов']
        ],
        'LTL' => [
            [1, 'лит', 'лита', 'литов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'LVL' => [
            [1, 'лат', 'лата', 'латов'],
            [1, 'сентим', 'сентима', 'сентимов']
        ],
        'MDL' => [
            [1, 'молдавский лей', 'молдавских лея', 'молдавских леев'],
            [1, 'бань', 'баня', 'баней']
        ],
        'MKD' => [
            [1, 'македонский динар', 'македонских динара', 'македонских динаров'],
            [1, 'дени', 'дени', 'дени']
        ],
        'MTL' => [
            [2, 'мальтийская лира', 'мальтийских лиры', 'мальтийских лир'],
            [1, 'сентим', 'сентима', 'сентимов']
        ],
        'NOK' => [
            [2, 'норвежская крона', 'норвежских кроны', 'норвежских крон'],
            [0, 'эре', 'эре', 'эре']
        ],
        'NZD' => [
            [1, 'новозеландский доллар', 'новозеландских доллара', 'новозеландских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'PLN' => [
            [1, 'злотый', 'злотых', 'злотых'],
            [1, 'грош', 'гроша', 'грошей']
        ],
        'ROL' => [
            [1, 'румынский лей', 'румынских лей', 'румынских лей'],
            [1, 'бани', 'бани', 'бани']
        ],
        'RUB' => [
            [1, 'рубль', 'рубля', 'рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'RUR' => [
            [1, 'российский рубль', 'российских рубля', 'российских рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'SEK' => [
            [2, 'шведская крона', 'шведских кроны', 'шведских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'SGD' => [
            [1, 'сингапурский доллар', 'сингапурских доллара', 'сингапурских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'SIT' => [
            [1, 'словенский толар', 'словенских толара', 'словенских толаров'],
            [2, 'стотина', 'стотины', 'стотин']
        ],
        'SKK' => [
            [2, 'словацкая крона', 'словацких кроны', 'словацких крон'],
            [0, '', '', '']
        ],
        'TRL' => [
            [2, 'турецкая лира', 'турецких лиры', 'турецких лир'],
            [1, 'пиастр', 'пиастра', 'пиастров']
        ],
        'TRY' => [
            [2, 'турецкая лира', 'турецкие лиры', 'турецких лир'],
            [1, 'куруш', 'куруша', 'курушей']
        ],
        'TMT' => [
            [1, 'манат', 'маната', 'манатов'],
            [1, 'тенге', 'тенге', 'тенге']
        ],
        'UAH' => [
            [2, 'гривна', 'гривны', 'гривен'],
            [2, 'копейка', 'копейки', 'копеек'],
        ],
        'USD' => [
            [1, 'доллар США', 'доллара США', 'долларов США'],
            [1, 'цент', 'цента', 'центов']
        ],
        'UZS' => [
            [1, 'сум', 'сума', 'сумов'],
            [1, 'тийин', 'тийина', 'тийинов'],
        ],
        'YUM' => [
            [1, 'югославский динар', 'югославских динара', 'югославских динаров'],
            [1, 'пара', 'пара', 'пара']
        ],
        'ZAR' => [
            [1, 'ранд', 'ранда', 'рандов'],
            [1, 'цент', 'цента', 'центов']
        ]
    ];

    private $wordSeparator = ' ';

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    protected function toWords($number, $power = 0, $cursuffix = null, $finalFeminineDigit = false)
    {
        $ret = '';

        if ($number < 0) {
            $ret .= $this->minus;
            $number *= -1;
        }

        if (strlen($number) > 3) {
            $maxp = strlen($number) - 1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power

                if (isset(self::$exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($number, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);

                    if ($snum !== '') {
                        $cursuffix = self::$exponent[$power][count(self::$exponent[$power]) - 1];

                        $ret .= $this->toWords($snum, $p, $cursuffix, $finalFeminineDigit);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $number = substr($number, $maxp - $curp, $curp - $p + 1);
            if ($number == 0) {
                return $ret;
            }
        } elseif ($number == 0 || $number == '') {
            return $this->wordSeparator . self::$digits[0][0];
        }

        $h = $t = $d = 0;

        switch (strlen($number)) {
            case 3:
                $h = (int)substr($number, -3, 1);

            case 2:
                $t = (int)substr($number, -2, 1);

            case 1:
                $d = (int)substr($number, -1, 1);
                break;

            case 0:
                return;
                break;
        }

        if ($h) {
            // inflection of the word "hundred"
            if ($h == 1) {
                $ret .= $this->wordSeparator . self::$hundreds[0];
            } elseif ($h == 2) {
                $ret .= $this->wordSeparator . "dvě" . $this->wordSeparator . self::$hundreds[1];
            } elseif (($h > 1) && ($h < 5)) {
                $ret .= $this->wordSeparator . self::$digits[0][$h] . $this->wordSeparator . self::$hundreds[2];
            } else {        //if ($h >= 5)
                $ret .= $this->wordSeparator . self::$digits[0][$h] . $this->wordSeparator . self::$hundreds[3];
            }
            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->wordSeparator . 'and';
        }

        // ten, twenty etc.
        switch ($t) {
            case 2:
            case 3:
            case 4:
                $ret .= $this->wordSeparator . self::$digits[0][$t] . 'cet';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'padesát';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'šedesát';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'sedmdesát';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'osmdesát';
                break;

            case 9:
                $ret .= $this->wordSeparator . 'devadesát';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'deset';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'jedenáct';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'čtrnáct';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'patnáct';
                        break;

                    case 9:
                        $ret .= $this->wordSeparator . 'devatenáct';
                        break;

                    case 2:
                    case 3:
                    case 6:
                    case 7:
                    case 8:
                        $ret .= $this->wordSeparator . self::$digits[0][$d] . 'náct';
                        break;
                }
                break;
        }

        if (($t != 1) && ($d > 0) && (($power == 0) || ($number >= 1))) {
            if($power === 3 || ($power === 0 && $finalFeminineDigit === true)){
                $ret .= $this->wordSeparator . self::$digits[1][$d];
            }else{
                $ret .= $this->wordSeparator . self::$digits[0][$d];
            }

        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // inflection of exponental words
            if ($number == 1) {
                $idx = 0;
            } elseif ((($number > 1) && ($number < 5)) || ((intval("$t$d") > 1) && (intval("$t$d") < 5))) {
                $idx = 1;
            } else {
                $idx = 2;
            }

            $ret .= $this->wordSeparator . $lev[$idx];
        }

        return $ret;
    }

    /**
     * @param string $currency
     * @param int $decimal
     * @param int $fraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        return $this->toWords($decimal);

    }
}
