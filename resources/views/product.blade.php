<x-layouts.frontend>
    <x-slot name="title">
        Product
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/product.css')}}">
    </x-slot>

    <main class="container">
        <p class="path-style py-3">Home &gt; Puzzles &gt; {{$product->name}}</p>
        <!-- begin productTop -->
        <section id="productTop" class="row mb-5">
            <!-- begin productcol1 -->
            <div class="col-12 col-md-6 mb-5">
                <div class="slider-for mb-5">
                    @for($i = 0; $i<5; $i++)
                        <img src="{{$product->photo_id ? asset($product->photo->file) : "http://via.placeholder.com/62x62"}}" class="img-fluid" alt="{{$product->name . $i}}">
                    @endfor
                </div>
                <div class="slider-nav">
                    @for($i = 0; $i <5; $i++)
                        <img src="{{$product->photo_id ? asset($product->photo->file) : "http://via.placeholder.com/62x62"}}" class="img-fluid" alt="{{$product->name . $i}}">
                    @endfor
                </div>
            </div>
            <!-- end productcol1 -->
            <!-- begin productcol2 -->
            <div class="col-12 col-md-6">
                <header class="mb-3">
                    <h1>{{$product->name}}</h1>
                </header>
                <div class="d-flex pb-3 align-items-center">
                    @for ($i = 0; $i < $product->rating; $i++)
                    <i class="fa-solid fa-star fa-xs yellow"></i>
                    @endfor
                    @for ($i = 0; $i < 5-$product->rating; $i++)
                    <i class="fa-solid fa-star fa-xs"></i>
                    @endfor
                    <p class="fw400 fs12 mb-0 ms-4">164 reviews</p>
                </div>
                <div class="mb-4">
                    <p class="p-style" id="brand">Brand &emsp; {{$product->brand->name }}</p>
                    <p class="p-style" id="status">Status &emsp; <span><i class="fa-solid fa-xs fa-circle"></i> Ready to ship!</span></p>
                </div>
                <p class="fw600">&euro;{{$product->price}}</p>
                <p class="fw600 fs12 mb-0">Quantity:</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="input-group w-60">
                            <button class="btn btn-light btn-outline-secondary" type="button">-</button>
                            <input type="number" value="1" min="1" class="form-control text-center" id="quantity"/>
                            <button class="btn btn-light btn-outline-secondary" type="button">+</button>
                        </div>
                        <i class="bi bi-heart"></i>
                    </div>
                    <button type="submit" class="btn-green w-100">ADD TO CART</button>
                </form>
            </div>
            <!-- end productcol2 -->
            <!-- begin productcol3, to be added later (make cols md-4) -->
            <!--            <div class="col-12 col-md-4">
                <div class="accordion accordion-flush">
                    <div class="accordion-item" id="accordionColor">
                        <h2 class="accordion-header" id="headingColor">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColor" aria-expanded="true" aria-controls="collapseColor">
                                Plastic Color: Stickerless (Bright)
                            </button>
                        </h2>
                        <div id="collapseColor" class="accordion-collapse collapse show" aria-labelledby="headingColor" data-bs-parent="#accordionColor">
                            <div class="accordion-body px-0">
                                <div class="d-flex">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <img src="{{asset('images/product/stickerless-bright.png')}}" alt="stickerless (bright)">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <img src="{{asset('images/product/black.png')}}" alt="black">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush">
                    <div class="accordion-item" id="accordionLube">
                        <h2 class="accordion-header" id="headingLube">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLube" aria-expanded="true" aria-controls="collapseLube">
                                Lubricant applied: No
                            </button>
                        </h2>
                        <div id="collapseLube" class="accordion-collapse collapse show" aria-labelledby="headingLube" data-bs-parent="#accordionLube">
                            <div class="accordion-body px-0">
                                <div class="row">
                                    <img src="{{asset('images/product/lube-service.jpg')}}" alt="lube service" class="col-3">
                                    <div class="form-check col-9 d-flex justify-content-start align-items-center">
                                        <input type="checkbox" class="form-check-input me-2 mt-0" id="lubeService">
                                        <label for="lubeService" class="form-check-label float-end"> Add Lube Service to product for &euro;4,75</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- end productcol3 -->
        </section>
        <!-- end productTop -->

        <!-- begin productBottom -->
        <section id="productBottom" class="row mb-5">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="true">DESCRIPTION</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">REVIEWS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">PRODUCT DETAILS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="policy-tab" data-bs-toggle="tab" data-bs-target="#policy-tab-pane" type="button" role="tab" aria-controls="policy-tab-pane" aria-selected="false">RETURN POLICY</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade p-style show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">{{$product->description}}
                </div>
                <div class="tab-pane fade p-style" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">...</div>
                <div class="tab-pane fade p-style" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                    <div class="row">
                        <ul class="col-2">
                            <li>Type</li>
                            <li>Size</li>
                            <li>Weight</li>
                            <li>Released</li>
                        </ul>
                        <ul class="col-4">
                            <li>{{$product->type->name}}</li>
                            <li>{{$product->size}}</li>
                            <li>{{$product->weight}}</li>
                            <li>{{$product->created_at->toDateString()}}</li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade p-style" id="policy-tab-pane" role="tabpanel" aria-labelledby="policy-tab" tabindex="0">Shop in confidence with easy 90 day returns or exchanges via our automated self-service system. Exclusions may apply where advertised.</div>
            </div>
        </section>
        <hr>
        <!-- end productBottom -->

        <!-- begin section relatedProducts -->
        <section id="relatedProducts" class="py-5 w-100">
            <header class="text-start mb-4">
                <h3>RELATED PRODUCTS</h3>
            </header>
            <!-- begin slider -->
            <div class="slick-slider-related">
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <a href="product.html">
                        <img src="images/index/placeholder-3x3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star yellow"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5 class="card-title">QiYi MS Magnetic 3x3 - Stickerless (Bright)</h5>
                        <p class="popeb">&euro; 7,77</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn-green">ADD TO CART</button>
                            <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                        </div>
                    </div>
                </article>
            </div>
            <!-- end slider -->
        </section>
        <!-- end section relatedProducts -->
    </main>

    <x-slot name="scripts">
        <script src="{{asset('js/product.js')}}"></script>
    </x-slot>
</x-layouts.frontend>
