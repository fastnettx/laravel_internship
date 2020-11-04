<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return $brand;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {

        $brand = new Brand($request->except(['image']));
        $brand->save();
        $brand->addMediaFromRequest('image')->toMediaCollection('images_brand');
        $brand->getFirstMediaUrl('images_brand');
        return $brand;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
//        $brand_image = Media::where('model_id', $brand->id)->first();
//        $brand['file'] = $brand_image->file_name;
        $brand->getFirstMediaUrl('images_brand');
        return $brand;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {

        $data = $request->all();
        $brand->media()->delete();
        $brand->addMediaFromRequest('image')
            ->toMediaCollection('images_brand');
        $brand->update($data);

        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->media()->delete();
        $brand->delete();
        return response()->json(['product' => $brand->name, 'text' => 'Brand deleted '], 200);
    }
}
