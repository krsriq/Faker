<?php

namespace Faker\Extension;

/**
 * @experimental This interface is experimental and does not fall under our BC promise
 */
interface ColorExtension extends Extension
{
    /**
     * @example 'NavajoWhite'
     */
    public function colorName(): string;

    /**
     * @example '#fa3cc2'
     */
    public function hexColor(): string;

    /**
     * @example '340,50,20'
     */
    public function hslColor(): string;

    /**
     * @example array(340, 50, 20)
     */
    public function hslColorAsArray(): array;

    /**
     * @example 'rgba(0,255,122,0.8)'
     */
    public function rgbaCssColor(): string;

    /**
     * @example '0,255,122'
     */
    public function rgbColor(): string;

    /**
     * @example '[0,255,122]'
     */
    public function rgbColorAsArray(): array;

    /**
     * @example 'rgb(0,255,122)'
     */
    public function rgbCssColor(): string;

    /**
     * @example '#ff0044'
     */
    public function safeHexColor(): string;

    /**
     * @example 'blue'
     */
    public function safeColorName(): string;
}
