<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLedgerRequest;
use App\Http\Requests\UpdateLedgerRequest;

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
            'date' => 'required|string',
            'client' => 'required|string',
            'material' => 'required|string',
            'meter' => 'required|string',
            'payment' => 'required|string',
            'balance' => 'required|string',
            'cost' =>  'required|string',

        ]);

        $ledger = Ledger::create([
            'date' => $fields['date'],
            'client' => $fields['client'],
            'material' => $fields['material'],
            'meter' => $fields['meter'],
            'payment' => $fields['payment'],
            'balance' => $fields['balance'],
            'cost' =>  $fields['cost'],
        ]);

        return response($ledger, 201);
    }

    public function update(Request $request, $id)
    {
        $ledger = Ledger::find($id);
        $ledger->update($request->all());
        return $ledger;
    }
}
