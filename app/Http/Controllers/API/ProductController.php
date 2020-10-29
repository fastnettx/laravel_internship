<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private function checkingAdministratorRights()
    {
        $user = Auth::user();
        return $user->checkTheAdmin();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products->toArray(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->checkingAdministratorRights()){
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required',
            'brand_id' => 'required',
            'in_stock' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }
        $product = Product::create($request->all());
        $product->categories()->attach($request->category);

        return response()->json($product->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product->toArray(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->checkingAdministratorRights()){
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required',
            'brand_id' => 'required',
            'in_stock' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->update($request->all());

        return response()->json($product->toArray(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->checkingAdministratorRights()){
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->delete($id);
        return response()->json(['product' => $product->name, 'text' => 'Product deleted '], 200);
    }
}
