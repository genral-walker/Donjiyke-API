<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Payments::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'target_ledger' => 'required|string',
            'payment' => 'required|string',
            'date' => 'required|string',

        ]);

        $payment = Payments::create([
            'target_ledger' => $fields['target_ledger'],
            'payment' => $fields['payment'],
            'date' => $fields['date'],
        ]);

        return response($payment, 201);         
    }
}
