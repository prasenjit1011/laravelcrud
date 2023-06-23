<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\{Request, JsonResponse};

class ProductCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productList = Product::select('id', 'name', 'type', 'description')->paginate(10);


        return response()->json($productList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $path = $request->file('file')->store('files');
        
        $product = Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'file' => $path
        ]);
        
        if(empty($product)){
            return response()->json($product, 400);
        }

        $product = [
                    'id' => $product['id'] ?? NULL,
                    'name' => $product['name'] ?? NULL,
                    'type' => $product['type'],
                    'description' => $product['description']
                ];
        
        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productDetails = Product::select('id','name', 'type', 'description', 'file')->find($id);
        return response()->json($productDetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
