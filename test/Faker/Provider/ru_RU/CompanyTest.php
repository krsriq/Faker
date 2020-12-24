<?php

namespace Faker\Test\Provider\ru_RU;

use Faker\Factory;
use Faker\Generator;
use Faker\Provider\ru_RU\Company;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testINN()
    {
        //        $f2 = (new Generator())->withMaybe(0)->mimeType();
//        $generator = new Generator();
//        $f1 = $generator->withUnique()->mimeType();
//        $f2 = $generator->withUnique()->ext(\Faker\Extension\FileExtension::class)->mimeType();
//        $f3 = $generator->withUnique()->ext(\Faker\Extension\FileExtension::class)->mimeType();
        //  $f1 = (new Generator())->withMaybe(0)->ext(\Faker\Extension\FileExtension::class)->mimeType();

        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\pt_PT\Person($faker));
        $tin = $faker->taxpayerIdentificationNumber();
        $dv = $faker->dvCalcMod11(12);



        $evenValidator = function($digit) {
            return $digit % 2 === 0;
        };
        $f1 = (new Generator())->withValid($evenValidator)->ext(\Faker\Extension\FileExtension::class)->mimeType();


        self::assertMatchesRegularExpression('/^[0-9]{10}$/', $this->faker->inn);
        self::assertEquals('77', substr($this->faker->inn('77'), 0, 2));
        self::assertEquals('02', substr($this->faker->inn(2), 0, 2));
    }

    public function testKPP()
    {
        self::assertMatchesRegularExpression('/^[0-9]{9}$/', $this->faker->kpp);
        self::assertEquals('01001', substr($this->faker->kpp, -5, 5));
        $inn10 = $this->faker->inn10;
        self::assertEquals(substr($inn10, 0, 4), substr($this->faker->kpp($inn10), 0, 4));
    }

    public function testCatchPhrase()
    {
        $phrase = $this->faker->catchPhrase;
        self::assertNotNull($phrase);
        self::assertGreaterThanOrEqual(
            3,
            count(explode(' ', $this->faker->catchPhrase)),
            "'$phrase' - should be contain 3 word"
        );
    }

    public function checksumProvider()
    {
        return [
            ['143525744', '4'],
            ['500109285', '3'],
            ['500109285', '3'],
            ['500109285', '3'],
            ['027615723', '1'],
        ];
    }

    /**
     * @dataProvider checksumProvider
     */
    public function testInn10Checksum($inn10, $checksum)
    {
        self::assertSame($checksum, $this->faker->inn10Checksum($inn10), $inn10);
    }

    public function inn10ValidatorProvider()
    {
        return [
            ['5902179757', true],
            ['5408294405', true],
            ['2724164617', true],
            ['0726000515', true],
            ['6312123552', true],
            ['1111111111', false],
            ['0123456789', false],
        ];
    }

    /**
     * @dataProvider inn10ValidatorProvider
     */
    public function testInn10IsValid($inn10, $isValid)
    {
        self::assertSame($isValid, $this->faker->inn10IsValid($inn10), $inn10);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
