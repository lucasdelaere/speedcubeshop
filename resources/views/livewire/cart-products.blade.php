<div class="row">
    <!-- begin productList -->
    <section id="productList" class="col-12 col-md-8">
        <div class="row bg-light py-2 my-3 fw600 fs12">
            <p class="col-6 mb-0">PRODUCTS</p>
            <div class="col-6">
                <div class="row">
                    <p class="col-4 col-lg-3 mb-0">PRICE</p>
                    <p class="col-6 col-lg-4 mb-0">QUANTITY</p>
                    <p class="d-none d-lg-block col-lg-3 mb-0">TOTAL</p>
                </div>
            </div>
        </div>
        <div id="products">
            @forelse($products as $product)
            <article class="card mb-2">
                <div class="row align-items-center my-3">
                    <div class="col-6">
                        <div class="row align-items-center">
                            <a href="{{ route('products.showFrontend', $product) }}" class="col-6 col-lg-7">
                                <img src="{{$product->photo_id ? asset($product->photo->file): "http://via.placeholder.com/62x62"}}" alt="productpicture{{$product->id}}" class="card-img-top">
                            </a>
                            <div class="col-6 col-lg-5 fs12">
                                <p class="fw700 fs14">{{$product->name}}</p>
                                <!-- for when lube and sticker color can be chosen -->
                                <!--                                        <em><p class="fw400">Stickerless (Bright)</p>
                                                                            <p>Logo Sticker: <span class="fw400">Default</span></p>
                                                                            <p>Apply Pro Setup: <span class="fw400">Yes</span></p>
                                                                        </em>-->
                            </div>
                        </div>
                    </div>
                    <div class="card-body col-6">
                        <div class="row align-items-center">
                            <div class="col-4 col-lg-3 fw500 fs14">&euro; {{$product->price}}</div>
                            <div class="col-6 col-lg-4">
                                <input wire:model.lazy="quantity.{{$product->id}}" type="number" class="w-70 py-2 px-2" min="1">
                            </div>
                            <div class="d-none d-lg-block col-lg-3 fw600 fs14">&euro; {{$product->price * $quantity[$product->id]}}</div>
                            <div class="col-2"><button wire:click="removeFromCart({{$product->id}})" class="btn bg-transparent p-0"><i class="fa-solid fa-xmark fa-lg black"></i></button></div>
                        </div>
                    </div>
                </div>
            </article >
            @empty
                Your cart is empty!
            @endforelse
        </div>
    </section>
    <!-- end productList -->

    <!-- begin orderSummary -->
    <section id="orderSummary" class="col-12 col-md-4 fw600 fs12">
        <div class="py-2 mb-5 my-3 border-bottom border-dark">ORDER SUMMARY</div>
        <div class="d-flex justify-content-between fs14">
            <p>Sub Total:</p>
            <!-- check of dit auto-update of je moet refreshen, anders variabele aanmaken in livewire component en hier meegeven -->
            <p>&euro; {{ Cart::subtotal() }}</p>
        </div>
        <hr>
        <p class="fw400 fs12"><em>Shipping and discounts calculated at checkout</em></p>
        <hr>
        <div class="d-flex justify-content-between fw900 fs14">
            <p>Total (incl. tax):</p>
            <p>&euro; {{ Cart::total() }}</p>
        </div>
        <hr>
        @if(Cart::content()->count() > 0)
            <form action="{{route('information')}}" method="GET">
                @csrf
                <button class="btn-green w-100 mb-2" type="submit">PROCEED TO CHECKOUT</button>
            </form>

        @endif
        <a href="{{route('shop')}}" class="text-decoration-none text-white"><button class="btn-black w-100">CONTINUE SHOPPING</button></a>
    </section>
    <!-- end orderSummary -->
</div>
