<?php

namespace Bezhanov\Ethereum;

class Converter
{
    /**
     * unitMap
     *
     * @var array
     */
    private $unitMap = [
        'wei' => '1',
        'kwei' => '1000',
        'Kwei' => '1000',
        'babbage' => '1000',
        'femtoether' => '1000',
        'mwei' => '1000000',
        'lovelace' => '1000000',
        'picoether' => '1000000',
        'gwei' => '1000000000',
        'shannon' => '1000000000',
        'nanoether' => '1000000000',
        'nano' => '1000000000',
        'szabo' => '1000000000000',
        'microether' => '1000000000000',
        'micro' => '1000000000000',
        'finney' => '1000000000000000',
        'milliether' => '1000000000000000',
        'milli' => '1000000000000000',
        'ether' => '1000000000000000000',
        'kether' => '1000000000000000000000',
        'grand' => '1000000000000000000000',
        'einstein' => '1000000000000000000000',
        'mether' => '1000000000000000000000000',
        'gether' => '1000000000000000000000000000',
        'tether' => '1000000000000000000000000000000'
    ];

    /**
     * fromWei
     *
     * @param  string $amount
     * @param  string $unit
     * @return string
     */
    public function fromWei(string $amount, string $unit = 'ether'): string
    {
        if ($unit == 'wei') {
            return $amount;
        }
        return  (string) bcdiv($amount, $this->getValueOfUnit($unit), $this->getDivisionScale($amount, $unit));
    }

    /**
     * toWei
     *
     * @param  string $amount
     * @param  string $unit
     * @return string
     */
    public function toWei(string $amount, string $unit = 'ether'): string
    {
        if ($unit == 'wei') {
            return $amount;
        }
        return bcmul($amount, $this->getValueOfUnit($unit));
    }

    /**
     * getValueOfUnit
     *
     * @param  string $unit
     * @return string
     */
    private function getValueOfUnit(string $unit = 'ether')
    {
        if (!isset($this->unitMap[$unit])) {
            $this->throwExceptionForUnit($unit);
        }

        return $this->unitMap[$unit];
    }

    /**
     * getDivisionScale
     *
     * @param  string $amount
     * @param  string $unit
     * @return mixed
     */
    private function getDivisionScale(string $amount, string $unit)
    {
        if (!isset($this->unitMap[$unit])) {
            $this->throwExceptionForUnit($unit);
        }
        $zeroes = substr_count($this->unitMap[$unit], '0');
        $decimals = strlen($amount) - strpos($amount, '.') - 1;

        return $zeroes + $decimals;
    }

    /**
     * throwExceptionForUnit
     *
     * @param  string $unit
     * @return void
     */
    private function throwExceptionForUnit(string $unit)
    {
        $message = sprintf('A unit "%s" doesn\'t exist, please use the one of the following units: %s', $unit, implode(',', array_keys($this->unitMap)));

        throw new \UnexpectedValueException($message);
    }
}

