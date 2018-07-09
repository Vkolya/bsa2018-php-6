<?php

namespace App\Services;

use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyGenerator;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;
    
    public function __construct(array $currencies) 
    {
       $this->currencies = $currencies;   
    }
    
    public function findAll(): array 
    {
        return $this->currencies;
    }

    public function findActive(): array 
    {
        $activeCurrencies = array_filter($this->currencies, function($currency) {
            return $currency->isActive();
        });
        return $activeCurrencies;
    }

    public function findById(int $id): ?Currency
    {
        foreach ($this->currencies as $currency) {
            if($currency->getId() == $id) {
                return $currency;
            }
        }
        return null;
    }
    public function save(Currency $currency): void 
    {
        foreach ($this->currencies as $key => $stored_currencies) {
            if($stored_currencies->getId() == $currency->getId()) {
                $this->currencies[$key] = $currency;
                return;
            }
        }
        array_push($this->currencies, $currency);
    }

    public function delete(Currency $currency): void
    {
        
        foreach ($this->currencies as $key => $stored_currencies) {
            if($stored_currencies->getId() == $currency->getId()) {
                unset($this->currencies[$key]);
            }
        }
    }
    public function getLastInsertedId() : int
    {
        return end($this->currencies)->getId();
    }
}