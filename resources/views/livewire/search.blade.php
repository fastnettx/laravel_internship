<div>
    <input type="text" wire:model="search" placeholder="enter product name..."/>
    <ul>

        @foreach($products as $product)
            <li>
                <p>
                    <a href="{{route('product.show', ['id'=>$product->id])}}">{{ $product->name }} </a>
                    
                </p>
            </li>
        @endforeach
    </ul>
</div>
