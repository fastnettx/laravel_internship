<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::simplePaginate(5);

//            dd($brand->getFirstMedia('images_brand'));
//        dd($brand->getFirstMedia('images_brand'));

        return view('brand.index', ['brands' => $brands]);
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
        return view('brand.show', ['brand' => $brand]);

    }


}
