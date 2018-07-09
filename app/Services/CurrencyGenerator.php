<?php

namespace App\Services;

use App\Services\Currency;

class CurrencyGenerator
{
    public static function generate(): array
    {
        return [
            new Currency(
                1,
                'Bitcoin',
                'BTC',
                6540.99,
                new \DateTime(),
                true
            ),
            new Currency(
                2,
                'Ethereum',
                'ETH',
                459.13,
                new \DateTime(),
                 true
            ),
            new Currency(
                3,
                'Litecoin',
                'LTC',
                81.49,
                new \DateTime(),
                 true
            ),
            new Currency(
                4,
                'EOS',
                'EOS',
                8.34,
                new \DateTime(),
                false
            ),
            new Currency(
                5,
                'Dash',
                'Dash',
                236.4,
                new \DateTime(),
                true
            ),
        ];
    }
}