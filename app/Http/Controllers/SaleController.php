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
        return Sale::all();
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
            'material' => 'required|string',
            'meter' => 'required|string',
            'payment' => 'required|string',
            'cost' => 'required|string',
            'balance' => 'required|string'

        ]);

        $sale = Sale::create([
            'material' => $fields['material'],
            'meter' => $fields['meter'],
            'payment' => $fields['payment'],
            'cost' => $fields['cost'],
            'balance' => $fields['balance']
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
