<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;

class ApiCurrencyController extends Controller
{
    private $currencyRepo;
    
    public function __construct(CurrencyRepositoryInterface $currencyRepo) 
    {
        $this->currencyRepo = $currencyRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return response()->json($this->currencyRepo->findActive());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        if($currency = $this->currencyRepo->findById($id)) {
            return response()->json($currency);
        }else {
            return response()->json(['message' => 'Currency not Found!'], 404);
        }
    }
     
}
