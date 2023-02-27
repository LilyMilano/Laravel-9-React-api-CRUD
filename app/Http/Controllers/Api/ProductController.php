<?php

namespace App\Http\Controllers\Api;

use id;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $product->description = $request["description"];
        $product->price = $request["price"];
        $product->stock = $request["stock"];
        $product->save();

        return response()->json([
            'mensaje' => 'Datos del producto modificado',
            'data' => $product,
        ]);
    }

    public function destroy(string $id)
    {
        $product = Product::destroy($id);
        return $product;
    }
}