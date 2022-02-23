<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class El extends Words
{
    const LOCALE = 'el';
    const LANGUAGE_NAME = 'Greek';
    const LANGUAGE_NAME_NATIVE = 'Ελληνικά';
    const MINUS = 'μείον';

    protected $zero = 'μηδέν';

    const MALE = 0;
    const FEMALE = 1;
    const NEUTER = 2;

    protected static $ten = [
        ['', 'ένα', 'δύο', 'τρια', 'τέσσερα', 'πέντε', 'έξι', 'επτά', 'οκτώ', 'εννέα'],
        ['', 'μία', 'δύο', 'τρεις', 'τέσσερις', 'πέντε', 'έξι', 'επτά', 'οκτώ', 'εννέα'],
    ];

    protected static $teens = [
        'δέκα',
        'έντεκα',
        'δώδεκα',
        'δεκατρία',
        'δεκατέσσερα',
        'δεκαπέντε',
        'δεκαέξι',
        'δεκαεπτά',
        'δεκαοκτώ',
        'δεκαεννέα',
    ];

    protected static $tens = [
        2 => 'είκοσι',
        'τριάντα',
        'σαράντα',
        'πενήντα',
        'εξήντα',
        'εβδομήντα',
        'ογδόντα',
        'εννενήντα',
    ];

    protected static $hundred = [
        [''],
        ['εκατό', 'εκατόν'],
        ['διακόσια', 'διακόσιες'],
        ['τριακόσια', 'τριακόσιες'],
        ['τετρακόσια', 'τετρακόσιες'],
        ['πεντακόσια', 'πεντακόσιες'],
        ['εξακόσια', 'εξακόσιες'],
        ['επτακόσια', 'επτακόσιες'],
        ['οκτακόσια', 'οκτακόσιες'],
        ['εννιακόσια', 'εννιακόσιες'],
    ];

    protected static $mega = [
        [3 => self::FEMALE],
        [3 => self::MALE],
        ['χίλια', 'χίλιάδες', 'χίλιάδες', self::FEMALE],
        ['εκατομμύριο', 'εκατομμύρια', 'εκατομμύρια', self::MALE],
        ['δισεκατομμύριο', 'δισεκατομμύρια', 'δισεκατομμύρια', self::MALE],
        ['τρισεκατομμύριο', 'τρισεκατομμύρια', 'τρισεκατομμύρια', self::MALE],
        ['τετρακισεκατομμύριον', 'τετρακισεκατομμύριον', 'τετρακισεκατομμύριον', self::MALE],
        ['εξακισεκατομμύριον', 'εξακισεκατομμύριον', 'εξακισεκατομμύριον', self::MALE],
    ];

    protected static $currencyNames = [

        'EUR' => [
            ['ευρώ', 'ευρώ', 'ευρώ'],
            ['σεντ', 'σεντς', 'σεντς'],
        ],
        'USD' => [
            ['δολάριο', 'δολάρια', 'δολάρια'],
            ['σεντ', 'σέντς', 'σεντς'],
        ],
    ];

    private $wordSeparator = ' ';

    /**
     * @param $n
     * @param $f1
     * @param $f2
     * @param $f5
     * @return string
     */
    public function morphDigit($n, $f1, $f2, $f5)
    {
        if ($n > 1) {
            return $f2;
        }
        return $f1;
    }

    public function morph($number, $postfix)
    {
        $n = abs((int)$number) % 100;
        if ($n > 10 && $n < 20) {
            return $postfix[2] ?? $postfix[0];
        }
        $n = $n % 10;
        if ($n > 1 && $n < 5) {
            return $postfix[1] ?? $postfix[0];
        }
        if ($n == 1) {
            return $postfix[0];
        }

        return $postfix[2] ?? $postfix[0];
    }


    /**
     * @param $number
     * @param $currencyGender
     * @return string
     */
    protected function toWords($number, $currencyGender = -1)
    {
        if ((int)$number === 0) {
            return $this->zero;
        }

        $out = [];

        if ($number < 0) {
            $out[] = static::MINUS;
            $number *= -1;
        }

        $megaSize = count(static::$mega);
        $signs = $megaSize * 3;

        // $signs equal quantity of zeros of the biggest number in self::$mega
        // + 3 additional sign (point and two zero)
        [$unit, $subunit] = explode('.', sprintf("%{$signs}.2F", (float)$number));

        foreach (str_split($unit, 3) as $megaKey => $value) {
            if (!(int)$value) {
                continue;
            }

            $megaKey = $megaSize - $megaKey - 1;
            $gender = $megaKey === 1 && $currencyGender !== -1 ? $currencyGender : static::$mega[$megaKey][3];
            [$i1, $i2, $i3] = array_map('intval', str_split($value, 1));
            // mega-logic
            if ($i1 > 0 && ($i3 > 0 || $i2 > 0) && ($megaKey === 2 || $i1 === 1)) {
                $out[] = static::$hundred[$i1][1] ?? static::$hundred[$i1][0];
            } else {
                $out[] = static::$hundred[$i1][0];
            }
            # 1xx-9xx

            if ($i2 > 1) { # 20-99
                $out[] = static::$tens[$i2] . ' ' . static::$ten[$gender][$i3];
            } else { # 10-19 | 1-9
                if ($megaKey !== 2 || $i3 !== 1 || $i2 > 0) {
                    $out[] = ($i2 > 0) ? static::$teens[$i3] : static::$ten[$gender][$i3];
                }
            }

            if ($megaKey > 1) {
                $out[] = $this->morphDigit(
                    $value,
                    static::$mega[$megaKey][0],
                    static::$mega[$megaKey][1],
                    static::$mega[$megaKey][2]
                );
            }
        }

        return trim(preg_replace('/\s+/', ' ', implode(' ', $out)));
    }

    /**
     * @param string $currency
     * @param int $decimal
     * @param int $fraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null): string
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];
        $return = '';
        $return .= sprintf(
            '%s%s%s',
            $this->toWords($decimal),
            $this->wordSeparator,
            $this->morph($decimal, $currencyNames[0])
        );
        if (null === $fraction && !$this->options->isShowFractionIfZero()) {
            return $return;
        }
        if ($fraction > 0 || $this->options->isShowFractionIfZero()) {
            if (0 === (int)$fraction) {
                $fraction = '00';
            }
            if ($this->options->isConvertFraction()) {
                $fraction = sprintf(
                    '%s',
                    $this->toWords($fraction),
                );
            }
            $return .= sprintf(
                '%s%s%s%s',
                $this->wordSeparator,
                $fraction,
                $this->wordSeparator,
                $this->morph($fraction, $currencyNames[1])
            );
        }

        return $return;
    }
}
