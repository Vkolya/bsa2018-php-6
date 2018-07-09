<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CurrencyRepositoryInterface;
use App\Services\Currency;

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
        return response()->json($this->currencyRepo->findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $currency = 
            new Currency(
                $this->currencyRepo->getLastInsertedId()+1,
                $request['name'],
                $request['short_name'],
                $request['actual_course'],
                $request['actual_course_date'],
                $request['active']
            );
        $this->currencyRepo->save($currency);
        return response()->json($currency);
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
            return response()->json(['message' => 'Currency not found!'], 404);
        }
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($currency = $this->currencyRepo->findById($id)) {
            if (!empty($request->input('name'))) {
                $currency->setName($request->input('name'));
            }
            if (!empty($request->input('short_name'))) {
                $currency->setShortName($request->input('short_name'));
            }
            if (!empty($request->input('actual_course'))) {
                $currency->setActualCourse($request->input('actual_course'));
            }
            if (!empty($request->input('actual_course_date'))) {
                $currency->setActualCourseDate($request->input('actual_course_date'));
            }
            if (!empty($request->input('active'))) {
                $currency->setActive($request->input('active'));
            }
            $this->currencyRepo->save($currency);
            return response()->json($currency);
        }else {
            return response()->json(['message' => 'Currency not found!'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($currency = $this->currencyRepo->findById($id)) {
            $this->currencyRepo->delete($currency);
        }else {
            return response()->json(['message' => 'Currency not found!'], 404);
        }
    }
}
