<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BrandController extends Controller
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
        $brands = Brand::all();
        return response()->json($brands->toArray(), 200);
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
        if (!$this->checkingAdministratorRights()) {
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'image' => 'required|image',

        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }
        $brand = new Brand($request->except(['image']));
        $brand->save();
        $brand->addMediaFromRequest('image')->toMediaCollection('images_brand');


        return response()->json($brand->toArray(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        if (is_null($brand)) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $brand->toArray();
        $brand_image = Media::where('model_id', $id)->first();
        $brand['file'] = $brand_image->file_name;
        return response()->json($brand, 200);
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
        if (!$this->checkingAdministratorRights()) {
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'image' => 'required|image',

        ]);
        if ($validator->fails()) {
            response()->json($validator->errors(), 404);
        }

        $brand = Brand::find($id);
        $data = $request->all();
        $brand->media()->delete($id);
        $brand->addMediaFromRequest('image')
            ->toMediaCollection('images_brand');
        $brand->update($data);

        return response()->json($brand->toArray(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->checkingAdministratorRights()) {
            return response()->json(['error' => 'You are not an administrator'], 404);
        }
        $brand = Brand::find($id);
        if (is_null($brand)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $brand->media()->delete($id);
        $brand->delete($id);
        return response()->json(['product' => $brand->name, 'text' => 'Brand deleted '], 200);
    }
}
