<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use Illuminate\Http\Request;

class LedgerController extends Controller
{

    public function index()
    {
        return Ledger::all();
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
            'balance' => 'required|string',
            'cost' =>  'required|string',

        ]);

        $ledger = Ledger::create([
            'material' => $fields['material'],
            'meter' => $fields['meter'],
            'payment' => $fields['payment'],
            'balance' => $fields['balance'],
            'cost' =>  $fields['cost'],
        ]);

        return response($ledger, 201);
    }
}
