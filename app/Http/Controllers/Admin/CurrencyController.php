<?php

namespace App\Http\Controllers\Admin;

 
use App\Http\Controllers\Controller;
use App\Services\CurrencyRepositoryInterface;

class CurrencyController extends Controller
{
    private $currencyRepo;
    
    public function __construct(CurrencyRepositoryInterface $currencyRepo) {
        $this->currencyRepo = $currencyRepo;
    }
    public function index() 
    {
        $currencies = $this->currencyRepo->findAll();
        return view('currencies',compact('currencies'));
    }
}
