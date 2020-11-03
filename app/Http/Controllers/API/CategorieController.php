<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categorie::all();
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {

        $category = Categorie::create($request->all());
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $category)
    {
        if (is_null($category)) {
            return response()->json(['error' => '$Category not found'], 404);
        }
        return $category;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, Categorie $category)
    {


        if (is_null($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $category->update($request->all());
        return  $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $category)
    {

        $category->delete();
        return response()->json(['categorie' => $category->name, 'text' => 'Categorie deleted '], 200);
    }

}
