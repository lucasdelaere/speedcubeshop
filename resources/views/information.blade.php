<x-layouts.frontend>
    <x-slot name="title">
        Information
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/checkouts.css')}}">
    </x-slot>


    <main>
    <!-- accordion & right column (sidebar) can be turned into x-components -->
    <!-- begin accordion -->
    <div class="accordion accordion-flush accordionCheckout border-bottom border-dark-subtle d-lg-none">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button border-bottom border-dark-subtle collapsed position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-cart2"></i><p class="ps-2 m-0"><span id="showOrHide">Show</span> order summary</p><span class="position-absolute" id="totalPrice">{{session('shippingCost') ? Cart::total() + session('shippingCost') : Cart::total()}} &euro;</span>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
                <div class="accordion-body">
                    <div class="mx-auto">
                        <!-- begin productlist -->
                        <ul class="pt-2 ps-0 list-style-none">
                            @foreach($products as $product)
                            <li class="row pt-3 align-items-center">
                                <div class="position-relative p-0 col-3">
                                    <img src="{{$product->photo_id ? asset($product->photo->file): "http://via.placeholder.com/62x62"}}" alt="productpicture{{$product->id}}" class="img-fluid h-0 p-0 border">
                                    <span class="thumbnail position-absolute top-0 start-100 translate-middle text-white text-center fs12 bg-secondary">{{$product->quantity}}</span>
                                </div>
                                <div class="col-7 ps-2">
                                    <p class="fs14 fw500 m-0">{{$product->name}}</p>
<!--                                    <p class="fs12 fw400 m-0">Stickerless (Bright)</p>-->
                                </div>
                                <span class="fs14 fw500 col-2 p-0 d-flex justify-content-end">{{$product->price}} &euro;</span>
                            </li>
                            @endforeach
                        </ul>
                        <!-- end productlist -->
<!--                        <div class="input-group mb-3 pt-3 border-top">
                            <input type="text" class="form-control fs14 fw400" placeholder="Gift card or discount code (soon to come)" aria-label="Gift card or discount code (soon to come)" aria-describedby="button-apply-discount">
                            <button class="btn btn-outline-secondary" type="button">Apply</button>
                        </div>-->
                        <div class="d-flex justify-content-between fw400 fs14 border-top pt-3">
                            <p>Sub Total:</p>
                            <p>{{Cart::subtotal()}} &euro;</p>
                        </div>
                        <div class="d-flex justify-content-between fw400 fs14">
                            <p>Shipping:</p>
                            <p class="fs12">
                                @if(session('shippingCost'))
                                    {{session('shippingCost')}}
                                @else
                                    Calculated at next step
                                @endif
                            </p>
                        </div>
                        <div class="d-flex justify-content-between fw400 fs16 border-top pt-3">
                            <p>Total:</p>
                            <p class="fs24 fw500">{{session('shippingCost') ? Cart::total() + session('shippingCost') : Cart::total()}} &euro;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end accordion -->
    <div class="container">
        <div class="row">
            <!-- begin left column -->
            <section id="information" class="col-12 col-lg-7 pt-4">
                <div class="px-lg-4 mx-auto">
                    <ol class="progress-bar">
                        <li class="progress-item progress-item-completed">
                            <a href="{{route('cart')}}">Cart</a>
                        </li>
                        <li class="progress-item progress-item-current">
                            <span>Information</span>
                        </li>
                        <li class="progress-item">
                            <span>Shipping</span>
                        </li>
                        <li class="progress-item">
                            <span>Payment</span>
                        </li>
                    </ol>
                    <!-- begin form -->
                    <form action="{{route('shipping')}}" method="POST" class="mb-5">
                        @csrf
                        <section id="contactInformation" class="mb-5">
                            <div class="d-flex justify-content-between">
                                <h2 class="text-mixedcase">Contact information</h2>
                                @guest
                                <p class="fw400 fs14">Already have an account? <a href="{{route('login')}}" class="text-decoration-none fw700">Log in</a></p>
                                @endguest
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" @if(Auth::user()) value="@if(Auth::user()) {{Auth::user()->email}} @elseif(session('email')){{session('email')}} @endif" @endif>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </section>

                        <section id="shippingAddress">
                            <h2 class="mb-4 text-mixedcase">Shipping address</h2>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Country/region" name="country" @if(session('country')) value="{{session('country')}}" @endif required>
                                <label for="country">Country/region</label>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" id="firstName" name="first_name" value="@if(Auth::user()) {{Auth::user()->first_name}} @elseif(session('first_name')){{session('first_name')}} @endif" required>
                                    <label for="firstName">First Name</label>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" id="lastName" name="last_name" value="@if(Auth::user()) {{Auth::user()->last_name}} @elseif(session('last_name')){{session('last_name')}} @endif" required>
                                    <label for="lastName">Last Name</label>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="company" placeholder="Company (optional)">
                                <label for="company">Company (optional)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address" @if(session('address')) value="{{session('address')}}" @endif required>
                                <label for="address">Address</label>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="appartment" placeholder="Apartment, suite, etc. (optional)">
                                <label for="appartment">Apartment, suite, etc. (optional)</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Postal Code" id="postalCode" name="postal_code" @if(session('postal_code')) value="{{session('postal_code')}}" @endif required>
                                    <label for="postalCode">Postal code</label>
                                    @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" id="city" name="city" @if(session('city')) value="{{session('city')}}" @endif required>
                                    <label for="city">City</label>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone" name="phone_number" @if(session('phone_number')) value="{{session('phone_number')}}" @endif required>
                                <label for="phone">Phone</label>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- add functionality later -->
<!--                            <div class="form-check mb-3">
                                <input type="checkbox" id="createAccount" class="form-check-input">
                                <label for="createAccount" class="form-check-label">Create an account with this information</label>
                            </div>-->
                        </section>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{route('cart')}}" class="text-decoration-none fw400 fs14"> &lt; Return to cart</a>
                            <button type="submit" class="text-decoration-none text-white btn-green p-3 text-center rounded">Continue to shipping</button>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </section>
            <!-- end left column -->

            <!-- begin right column (sidebar) -->
            <section id="sidebar" class="bg-light d-none d-lg-block col-lg-5 border-start border-end">
                <div class="px-lg-4 mx-auto pt-3">
                    <!-- begin productlist -->
                    <ul class="pt-2 ps-0 list-style-none">
                        @foreach($products as $product)
                        <li class="row pt-3 align-items-center">
                            <div class="position-relative p-0 col-3">
                                <img src="{{$product->photo_id ? asset($product->photo->file): "http://via.placeholder.com/62x62"}}" alt="productpicture{{$product->id}}" class="img-fluid h-0 p-0 border">
                                <span class="thumbnail position-absolute top-0 start-100 translate-middle text-white text-center fs12 bg-secondary">2</span>
                            </div>
                            <div class="col-7 ps-2">
                                <p class="fs14 fw500 m-0">{{$product->name}}</p>
<!--                                <p class="fs12 fw400 m-0">Stickerless (Bright)</p>-->
                            </div>
                            <span class="fs14 fw500 col-2 p-0 d-flex justify-content-end">{{$product->price}} &euro;</span>
                        </li>
                        @endforeach
                    </ul>
                    <!-- end productlist -->
<!--                    <div class="input-group mb-3 pt-3 border-top">
                        <input type="text" class="form-control fs14 fw400" placeholder="Gift card or discount code" aria-label="Gift card or discount code" aria-describedby="button-apply-discount">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>-->
                    <div class="d-flex justify-content-between fw400 fs14 border-top pt-3">
                        <p>Sub Total:</p>
                        <p>{{Cart::subtotal()}} &euro;</p>
                    </div>
                    <div class="d-flex justify-content-between fw400 fs14">
                        <p>Shipping:</p>
                        <p class="fs12">
                            @if(session('shippingCost'))
                                {{session('shippingCost')}}
                            @else
                                Calculated at next step
                            @endif
                        </p>
                    </div>
                    <div class="d-flex justify-content-between fw400 fs16 border-top pt-3">
                        <p>Total:</p>
                        <p class="fs24 fw500">{{session('shippingCost') ? Cart::total() + session('shippingCost') : Cart::total()}} &euro;</p>
                    </div>
                </div>
            </section>
            <!-- end right column (sidebar) -->
        </div>
    </div>




</main>

<x-slot name="scripts">
    <script type="text/javascript" src="{{asset('js/checkouts.js')}}"></script>
</x-slot>

</x-layouts.frontend>
