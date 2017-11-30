# Ethereum Unit Converter 

A simple library for performing easy conversion between various Ethereum units.

The conversion logic has been modelled after [web3.js](https://github.com/ethereum/web3.js)

**Usage**

```php
$converter = new Bezhanov\Ethereum\Converter();

// convert from Wei to another unit:
$value = $converter->fromWei('21000000000000', 'finney');
echo $value; // "0.021"

// convert from another unit to Wei:
$value = $converter->toWei('1', 'ether');
echo $value; // "1000000000000000000"
```

**Supported units:**

- `kwei` / `ada`
- `mwei` / `babbage`
- `gwei` / `shannon`
- `szabo`
- `finney`
- `ether`
- `kether` / `grand` / `einstein`
- `mether`
- `gether`
- `tether`
