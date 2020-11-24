@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    @livewireScripts

    <div class="featurebox col-md-12 col-sm-12 col-xs-12 pt-5">
        <div class="row justify-content-md-left ml-5">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="card-body">
                Search product
                <div >
                    @livewire('search')
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="card-body">
                    <form method="GET" action="{{ route('product.index') }}">
                        <div class="text-center">Filter products by price</div>
                        <div class="input-group mb-3">
                            <label for="price_from">from
                                <input type="text" name="price_from">
                            </label>
                        </div>
                        <div class="input-group mb-1">
                            <label for="price_to">up
                                <input type="text" name="price_to">
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Фильтр</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-sm card">
                <div class="col-md-7  col-xs-12">
                    <div class="feature text-left">
                        <h4 class="text-center"><a href="{{ route('product.index') }}"
                                                   class="">Products</a></h4>
                        <p>To select a product, select this section</p>
                    </div>
                </div>
            </div>
            <div class="col-sm card">
                <div class="col-md-7  col-xs-12">
                    <div class="feature text-left">
                        <h4 class="text-center"><a href="{{ route('brand.index') }}"
                                                   class="">Brands</a></h4>
                        <p>To select a brand, select this section</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm card">
                <div class="col-md-7  col-xs-12">
                    <div class="feature text-left">
                        <h4 class="text-center"><a href="{{ route('category.index') }}"
                            >Category</a></h4>
                        <p>To select a category, select this section</p>
                    </div>
                </div>
            </div>
            <div class="col-sm card">
                <div class="col-md-7  col-xs-12 ">
                    <div class="feature text-left">
                        <h4 class="text-center"><a href="{{ route('post.index') }}"
                                                   class="">Blogs</a></h4>
                        <p> To select a blog, select this section</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
