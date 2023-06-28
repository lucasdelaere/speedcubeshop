<x-layouts.frontend>
    <x-slot name="title">
        Payment
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/checkouts.css')}}">
    </x-slot>

    <main>
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
<!--                            <div class="input-group mb-3 pt-3 border-top">
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
                        <li class="progress-item progress-item-completed">
                            <a href="{{route('information')}}">Information</a>
                        </li>
                        <li class="progress-item progress-item-completed">
                            <a href="{{route('shipping.get')}}">Shipping</a>
                        </li>
                        <li class="progress-item progress-item-current">
                            <span>Payment</span>
                        </li>
                    </ol>

                    <div class="border rounded py-2 px-3 fw400 fs14">
                        <div class="row border-bottom pb-2">
                            <div class="col-10">
                                <div class="d-flex flex-column flex-md-row">
                                    <div class="col-3">Contact</div>
                                    <div class="col-10">{{session('email')}}</div>
                                </div>
                            </div>
                            <a href="{{route('information')}}" class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">Change</a>
                        </div>
                        <div class="row border-bottom py-2">
                            <div class="col-10">
                                <div class="d-flex flex-column flex-md-row">
                                    <div class="col-3">Ship to</div>
                                    <div class="col-10">{{session('address')}}, {{session('postal_code')}} {{session('city')}}, {{session('country')}}</div>
                                </div>
                            </div>
                            <a href="{{route('information')}}" class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">Change</a>
                        </div>
                        <div class="row pt-2">
                            <div class="col-10">
                                <div class="d-flex flex-column flex-md-row">
                                    <div class="col-3">Method </div>
                                    <div class="col-10">{{substr(session('shippingMethod'), 0, -1)}} · {{session('shippingCost')}} €</div>
                                </div>
                            </div>
                            <a href="{{route('shipping.get')}}" class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">Change</a>
                        </div>
                    </div>

                    <!-- begin payment -->
                    <section id="paymentSection" class="my-5">
                        <div class="mb-4">
                            <h2 class="text-mixedcase">Payment</h2>
                            <p class="m-0 fs14 fw400">All transactions are secure and encrypted</p>
                        </div>
                        <form action="{{route('checkout')}}" method="POST">
                            @csrf
                            <fieldset class="form-group border rounded py-2 px-4 fw400 fs14">
                                <!-- radio buttons are grouped by 'name' attribute -->
                                <div class="row py-2">
                                    <div class="form-check">
                                        <input type="radio" name="paymentMethod" class="row form-check-input"  id="bancontact" value="bancontact" aria-controls="multiCollapse1" onclick="toggleCollapse(this)" checked>
                                        <label class="form-check-label" for="bancontact"><img src="{{asset('images/checkout/bancontact.png')}}" alt="bancontact"></label>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="collapse multi-collapse show" id="multiCollapse1">
                                        <div class="border rounded bg-light text-center">
                                            <i class="bi bi-credit-card"></i>
                                            <p>After clicking "Complete order", you will be redirected to Bancontact to complete your purchase securely.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top pb-2 pt-4">
                                    <div class="form-check col-3">
                                        <input type="radio" name="paymentMethod" class="row form-check-input"  id="creditCard" value="card" aria-controls="multiCollapse2" onclick="toggleCollapse(this)">
                                        <label class="form-check-label" for="creditCard">Credit card</label>
                                    </div>
                                    <div class="col-9 black fs12 align-items-center d-flex justify-content-end gap-1"><img src="{{asset('images/checkout/visa.svg')}}" alt="visa"><img src="{{asset('images/checkout/mastercard.svg')}}" alt="mastercard"><img src="{{asset('images/checkout/american_express.svg')}}" alt="american express">
                                        <img src="{{asset('images/checkout/discover.svg')}}" alt="discover"> and more...</div>
                                </div>
                                <div class="row pb-2">
                                    <div class="collapse multi-collapse" id="multiCollapse2">
                                        <div class="border rounded bg-light text-center">
                                            <i class="bi bi-credit-card"></i>
                                            <p>After clicking "Complete order", you will be redirected to Stripe to complete your purchase securely.</p>
                                        </div>
                                    </div>
<!--                                    <div class="collapse multi-collapse" id="multiCollapse2">
                                        <div class="border rounded bg-light text-center px-3">
                                            <div class="form-floating my-3">
                                                <input type="tel" class="form-control" id="cardNumber" placeholder="Card number" maxlength="19">
                                                <label for="cardNumber">Card number</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="Card name" id="cardName">
                                                <label for="cardName">Name on card</label>
                                            </div>
                                            <div class="input-group gap-3 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control rounded" placeholder="Expiration date (MM/YY)" id="expirationDate">
                                                    <label for="expirationDate">Expiration date (MM/YY)</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="tel" class="form-control rounded" placeholder="Security code" id="securityCode">
                                                    <label for="securityCode">Security code</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="row border-top pb-2 pt-4">
                                    <div class="form-check">
                                        <input type="radio" name="paymentMethod" class="row form-check-input"  id="PayPal" aria-controls="multiCollapse3" onclick="toggleCollapse(this)" disabled>
                                        <label class="form-check-label" for="PayPal"><img src="{{asset('images/checkout/paypal.png')}}" alt="paypal"></label>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="collapse multi-collapse" id="multiCollapse3">
                                        <div class="border rounded bg-light text-center">
                                            <i class="bi bi-credit-card"></i>
                                            <p>After clicking "Complete order", you will be redirected to PayPal to complete your purchase securely.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top pb-2 pt-4">
                                    <div class="form-check">
                                        <input type="radio" name="paymentMethod" class="row form-check-input" id="amazonPay" aria-controls="multiCollapse4" onclick="toggleCollapse(this)" disabled>
                                        <label class="form-check-label" for="amazonPay"><img src="{{asset('images/checkout/amazonpay.png')}}" alt="amazonpay"></label>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="collapse multi-collapse" id="multiCollapse4">
                                        <div class="border rounded bg-light text-center">
                                            <i class="bi bi-credit-card"></i>
                                            <p>You will be asked to login with Amazon. <br>
                                                Amazon Pay total 44,85 &dollar; USD</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{route('shipping.get')}}" class="text-decoration-none fw400 fs14"> &lt; Return to shipping</a>
                                <button type="submit" class="text-decoration-none text-white btn-green p-3 text-center rounded">Complete order</button>
                            </div>
                        </form>
                    </section>
                    <!-- end payment -->
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
        <script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
    </x-slot>

</x-layouts.frontend>
