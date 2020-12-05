<?php

namespace Faker\Calculator;

/**
 * @deprecated Moved to ru_RU\Company, use {@link \Faker\Provider\ru_RU\Company}.
 * @see \Faker\Provider\ru_RU\Company
 */
class Inn
{
    /**
     * Generates INN Checksum
     * https://ru.wikipedia.org/wiki/%D0%98%D0%B4%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B9_%D0%BD%D0%BE%D0%BC%D0%B5%D1%80_%D0%BD%D0%B0%D0%BB%D0%BE%D0%B3%D0%BE%D0%BF%D0%BB%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D1%89%D0%B8%D0%BA%D0%B0
     *
     * @deprecated Use {@link \Faker\Provider\ru_RU\Company::innChecksum()} instead
     * @see \Faker\Provider\ru_RU\Company::innChecksum()
     *
     * @param string $inn
     * @return string Checksum (one digit)
     */
    public static function checksum($inn)
    {
        return \Faker\Provider\ru_RU\Company::innChecksum($inn);
    }

    /**
     * Checks whether an INN has a valid checksum
     *
     * @deprecated Use {@link \Faker\Provider\ru_RU\Company::innIsValid()} instead
     * @see \Faker\Provider\ru_RU\Company::innIsValid()
     *
     * @param string $inn
     * @return bool
     */
    public static function isValid($inn)
    {
        return \Faker\Provider\ru_RU\Company::innIsValid($inn);
    }
}
