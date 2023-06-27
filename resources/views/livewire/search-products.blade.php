<div>
    <section id="sectionSearch">
        <div id="products" class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 mb-5">
            @foreach($products as $product)
                <div>
                    <article class="card col bg-light p-0">
                        <a href="{{ route('products.showFrontend', $product) }}" class="p-0">
                            <img src="{{$product->photo_id ? asset($product->photo->file): "http://via.placeholder.com/62x62"}}" alt="productpicture{{$product->id}}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <div class="d-flex">
                                @for( $i = 0; $i < $product->rating; $i++)
                                    <i class="fa-solid fa-star productStar yellow"></i>
                                @endfor
                                @for( $i = 0; $i < 5-$product->rating; $i++)
                                    <i class="fa-solid fa-star productStar"></i>
                                @endfor
                            </div>
                            <p class="popeb">&euro; {{$product->price}}</p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button wire:click="addToCart({{$product}})" class="btn-green">ADD TO CART</button>
                                    @if(session('itemAdded') && session('itemAdded')['id'] == $product->id)
                                        <i wire:poll.2000ms class="bi bi-check-circle-fill text-success ms-2"></i>
                                    @endif
                                </div>
                                <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                            </div>
                        </div>
                    </article >
                </div>
            @endforeach
        </div>
        {{$products->links()}}
    </section>
</div>
