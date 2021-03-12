<?php

namespace Bezhanov\Tests\Ethereum;

use Bezhanov\Ethereum\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new Converter();
    }

    public function testFromWei()
    {
        foreach ($this->getFromWeiExpectedResults() as $unit => $result) {
            $amount = '1.234';
            $value = $this->converter->fromWei($amount, $unit);
            $this->assertEquals($value, $result);
        }
    }

    public function testFromWeiInvalidUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.234';
        $this->converter->fromWei($amount, 'test');
    }

    public function testToWei()
    {
        foreach ($this->getToWeiExpectedResults() as $unit => $result) {
            $amount = '1.234';
            $value = $this->converter->toWei($amount, $unit);
            $this->assertEquals($value, $result);
        }
    }

    public function testToWeiInvalidUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $amount = '1.234';
        $this->converter->toWei($amount, 'test');
    }

    private function getFromWeiExpectedResults(): array
    {
       return [
           'wei'        => '1.234',
           'kwei'       => '0.001234',
           'babbage'    => '0.001234',
           'femtoether' => '0.001234',
           'mwei'       => '0.000001234',
           'lovelace'   => '0.000001234',
           'picoether'  => '0.000001234',
           'gwei'       => '0.000000001234',
           'shannon'    => '0.000000001234',
           'nanoether'  => '0.000000001234',
           'nano'       => '0.000000001234',
           'szabo'      => '0.000000000001234',
           'microether' => '0.000000000001234',
           'micro'      => '0.000000000001234',
           'finney'     => '0.000000000000001234',
           'milliether' => '0.000000000000001234',
           'milli'      => '0.000000000000001234',
           'ether'      => '0.000000000000000001234',
           'kether'     => '0.000000000000000000001234',
           'grand'      => '0.000000000000000000001234',
           'einstein'   => '0.000000000000000000001234',
           'mether'     => '0.000000000000000000000001234',
           'gether'     => '0.000000000000000000000000001234',
           'tether'     => '0.000000000000000000000000000001234'
       ];
    }

    private function getToWeiExpectedResults(): array
    {
        return [
            'wei'        => '1.234',
            'kwei'       => '1234',
            'babbage'    => '1234',
            'femtoether' => '1234',
            'mwei'       => '1234000',
            'lovelace'   => '1234000',
            'picoether'  => '1234000',
            'gwei'       => '1234000000',
            'shannon'    => '1234000000',
            'nanoether'  => '1234000000',
            'nano'       => '1234000000',
            'szabo'      => '1234000000000',
            'microether' => '1234000000000',
            'micro'      => '1234000000000',
            'finney'     => '1234000000000000',
            'milliether' => '1234000000000000',
            'milli'      => '1234000000000000',
            'ether'      => '1234000000000000000',
            'kether'     => '1234000000000000000000',
            'grand'      => '1234000000000000000000',
            'einstein'   => '1234000000000000000000',
            'mether'     => '1234000000000000000000000',
            'gether'     => '1234000000000000000000000000',
            'tether'     => '1234000000000000000000000000000'
        ];
    }
}
