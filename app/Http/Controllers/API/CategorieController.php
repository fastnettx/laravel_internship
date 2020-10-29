<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
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
        $category = Categorie::all();
        return response()->json($category->toArray(), 200);
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
            'parent_id' => 'required',
        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }
        $category = Categorie::create($request->all());
        return response()->json($category->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categorie::find($id);
        if (is_null($category)) {
            return response()->json(['error' => '$Category not found'], 404);
        }
        return response()->json($category->toArray(), 200);
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
            'parent_id' => 'required|',
        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }
        $category = Categorie::find($id);
        if (is_null($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $category->update($request->all());
        return response()->json($category->toArray(), 200);
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
        $category = Categorie::find($id);
        if (is_null($category)) {
            return response()->json(['error' => 'Categorie not found'], 404);
        }
        $category->delete($id);
        return response()->json(['categorie' => $category->name, 'text' => 'Categorie deleted '], 200);
    }

}
