<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::all();                     // json(['result'=>'success','created_at'=>$message],200)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'target_roll' => 'required|string',
            'metre_run' => 'required|string',
            'metre_out' => 'required|string',
            'date_out' => 'required|string',
            'balance' => 'required|string',
            'issuer' =>  'required|string',
            'issued_to' => 'required|string'

        ]);

        $sale = Sale::create([
            'target_roll' => $fields['target_roll'],
            'metre_run' => $fields['metre_run'],
            'metre_out' => $fields['metre_out'],
            'date_out' => $fields['date_out'],
            'balance' => $fields['balance'],
            'issuer' =>  $fields['issuer'],
            'issued_to' => $fields['issued_to']
        ]);

        return response($sale, 201);
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
        //
    }
}
