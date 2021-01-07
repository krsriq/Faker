<?php

declare(strict_types=1);

namespace Faker\Test\Core;

use Faker\Test\TestCase;

final class ColorTest extends TestCase
{
    public function testHexColor()
    {
        self::assertMatchesRegularExpression('/^#[a-f0-9]{6}$/i', $this->faker->hexColor());
    }

    public function testSafeHexColor()
    {
        self::assertMatchesRegularExpression('/^#[a-f0-9]{6}$/i', $this->faker->safeHexColor());
    }

    public function testRgbColorAsArray()
    {
        self::assertCount(3, $this->faker->rgbColorAsArray());
    }

    public function testRgbColor()
    {
        $regexp = '([01]?[0-9]?[0-9]|2[0-4][0-9]|25[0-5])';
        self::assertMatchesRegularExpression('/^' . $regexp . ',' . $regexp . ',' . $regexp . '$/i', $this->faker->rgbColor());
    }

    public function testRgbCssColor()
    {
        $regexp = '([01]?[0-9]?[0-9]|2[0-4][0-9]|25[0-5])';
        self::assertMatchesRegularExpression('/^rgb\(' . $regexp . ',' . $regexp . ',' . $regexp . '\)$/i', $this->faker->rgbCssColor());
    }

    public function testRgbaCssColor()
    {
        $regexp = '([01]?[0-9]?[0-9]|2[0-4][0-9]|25[0-5])';
        $regexpAlpha = '([01]?(\.\d+)?)';
        self::assertMatchesRegularExpression('/^rgba\(' . $regexp . ',' . $regexp . ',' . $regexp . ',' . $regexpAlpha . '\)$/i', $this->faker->rgbaCssColor());
    }

    public function testSafeColorName()
    {
        self::assertMatchesRegularExpression('/^[\w]+$/', $this->faker->safeColorName());
    }

    public function testColorName()
    {
        self::assertMatchesRegularExpression('/^[\w]+$/', $this->faker->colorName());
    }

    public function testHslColor()
    {
        $regexp360 = '(?:36[0]|3[0-5][0-9]|[12][0-9][0-9]|[1-9]?[0-9])';
        $regexp100 = '(?:100|[1-9]?[0-9])';
        self::assertMatchesRegularExpression('/^' . $regexp360 . ',' . $regexp100 . ',' . $regexp100 . '$/', $this->faker->hslColor());
    }

    public function testHslColorArray()
    {
        self::assertCount(3, $this->faker->hslColorAsArray());
    }
}
