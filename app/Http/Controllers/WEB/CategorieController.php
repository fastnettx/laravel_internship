<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('category.index', ['categories' => $categories]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categorie::findOrFail($id);
        $products = [];
        foreach ($category->products as $product) {
            array_push($products, $product);
        }

        $paginator = $this->paginate($products, 4);
        return view('category.show', ['products' => $paginator, 'category' => $category]);
    }


    public function filter(Request $request)
    {
        $array_categories = $request->input('$category');
        $categories = Categorie::all()->whereIn('id', $array_categories)->all();
        $products = [];
        foreach ($categories as $category) {
            foreach ($category->products as $product) {
                array_push($products, $product);
            }
        }
        $category = Categorie::all();
//        $paginator = $this->paginate($products, 4);
//        return view('category.index', ['products' => $paginator, 'categories' => $category]);
        return view('category.index', ['products' => $products, 'categories' => $category]);
    }

    private function paginate($items, $perPage)
    {
        if (is_array($items)) {
            $items = collect($items);
        }
        return new LengthAwarePaginator(
            $items->forPage(Paginator::resolveCurrentPage(), $perPage),
            $items->count(), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }


}
