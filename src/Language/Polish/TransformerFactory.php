<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Language\Polish\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;

class TransformerFactory implements TransformerFactoryInterface
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'pl';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'Polish';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'Polski';

    /**
     * Return language identifier (RFC 3066)
     *
     * @return string
     */
    public function getLanguageIdentifier()
    {
        return self::LANGUAGE_IDENTIFIER;
    }

    /**
     * Create number transformer
     *
     * @return NumberTransformerInterface
     */
    public function createNumberTransformer()
    {
        return new NumberTransformer(new GrammarCaseSelector());
    }

    /**
     * Create currency transformer
     *
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer()
    {
        return new CurrencyTransformer(new NumberTransformer(new GrammarCaseSelector()), new GrammarCaseSelector());
    }
}