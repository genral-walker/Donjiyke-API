<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::all();
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
            'kg' => 'required|string',
            'metre_run' => 'required|string',
            'colour' => 'required|string',
            'description' => 'required|string',
            'balance' => 'required|string'
        ]);

        $stock = Stock::create([
            'kg' => $fields['kg'],
            'metre_run' => $fields['metre_run'],
            'colour' => $fields['colour'],
            'description' => $fields['description'],
            'balance' => $fields['balance']
        ]);

        return response($stock, 201);
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
        $stock = Stock::find($id);
        $stock->update($request->all());
        return $stock;
    }
}










// class ProductController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         return Product::all();
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'slug' => 'required',
//             'price' => 'required'
//         ]);

//         return Product::create($request->all());
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         return Product::find($id);
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $product = Product::find($id);
//         $product->update($request->all());
//         return $product;
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         return Product::destroy($id);
//     }

//      /**
//      * Search for a name
//      *
//      * @param  str  $name
//      * @return \Illuminate\Http\Response
//      */
//     public function search($name)
//     {
//         return Product::where('name', 'like', '%'.$name.'%')->get();
//     }
// }