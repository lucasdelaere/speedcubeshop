<x-layouts.frontend>
    <x-slot name="title">
        Cart
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    </x-slot>

    <main class="container">
        <p class="path-style py-3">Home > Cart</p>
        <h1 class="fw700 fs20">MY CART</h1>
        <livewire:cart-products :cartProducts="$cartProducts">

        <!-- begin section bestSellers -->
        <section id="bestSellers" class="py-5 w-100">
            <header class="text-start mb-4">
                <h3 class="fw700 fs14">BEST SELLERS</h3>
            </header>
            <!-- begin slider -->
            <div class="slick-slider-bestsellers">
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
        <!-- end section bestSellers -->
    </main>

    <x-slot name="scripts">
        <script src="{{asset('js/cart.js')}}"></script>
    </x-slot>
</x-layouts.frontend>
