<x-layouts.frontend>
    <x-slot name="title">
        Shipping
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
                            <li class="progress-item progress-item-current">
                                <span>Shipping</span>
                            </li>
                            <li class="progress-item">
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
                            <div class="row pt-2">
                                <div class="col-10">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="col-3">Ship to</div>
                                        <div class="col-10">{{session('address')}}, {{session('postal_code')}} {{session('city')}}, {{session('country')}}</div>
                                    </div>
                                </div>
                                <a href="{{route('information')}}" class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">Change</a>
                            </div>
                        </div>

                        <!-- begin shipping -->
                        <section id="shippingSection" class="my-5">
                            <h2 class="mb-4 text-mixedcase">Shipping method</h2>
                            <form action="{{route('payment')}}" method="POST">
                                @csrf
                                <fieldset class="form-group border rounded py-2 pe-3 px-4 fw400 fs14">
                                    <!-- radio buttons are grouped by 'name' attribute -->
                                    <div class="row pb-2">
                                        <div class="form-check col-10">
                                            <input type="radio" name="shippingMethod" class="form-check-input" id="ePacket1" value="ePacket1" @if(session('shippingMethod') && session('shippingMethod') == 'ePacket1') checked @elseif (!session('shippingMethod')) checked @endif>
                                            <label class="form-check-label" for="ePacket1">ePacket (7-21 business days estimate) DDU Duties & Taxes Included <br><span class="fs12">Estimated duty and tax &dollar;8.45 due upon delivery</span></label>
                                        </div>
                                        <div class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">8.45 &euro; </div>
                                    </div>
                                    <div class="row border-top py-2">
                                        <div class="form-check col-10">
                                            <input type="radio" name="shippingMethod" class="form-check-input" id="ePacket2" value="ePacket2" @if(session('shippingMethod') && session('shippingMethod') == 'ePacket2') checked @endif>
                                            <label class="form-check-label" for="ePacket2">ePacket (5-19 business days estimate) DDP Duties & Taxes included <br><span class="fs12">&dollar;8.15 shipping, &dollar;8.31 duties and taxes</span></label>
                                        </div>
                                        <div class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">16,46 &euro;</div>
                                    </div>
                                    <div class="row border-top py-2">
                                        <div class="form-check col-10">
                                            <input type="radio" name="shippingMethod" class="form-check-input" id="FedEx1" value="FedEx1" @if(session('shippingMethod') && session('shippingMethod') == 'FedEx1') checked @endif>
                                            <label class="form-check-label" for="FedEx1">FedEx Intl. Connect Plus (2-5 business days estimate) Duties & Taxes Included <br><span class="fs12">&dollar;18.73 shipping, $10.53 duties and taxes</span></label>
                                        </div>
                                        <div class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">29,26 &euro;</div>
                                    </div>
                                    <div class="row border-top pt-2">
                                        <div class="form-check col-10">
                                            <input type="radio" name="shippingMethod" class="form-check-input" id="FedEx2" value="FedEx2" @if(session('shippingMethod') && session('shippingMethod') == 'FedEx2') checked @endif>
                                            <label class="form-check-label" for="FedEx2">FedEx Intl. Priority (1-3 business days estimate) Duties & Taxes Included <br><span class="fs12">$28.18 shipping, $12.52 duties and taxes</span></label>
                                        </div>
                                        <div class="col-2 text-decoration-none black fs12 align-self-center d-flex justify-content-end">40,70 &euro;</div>
                                    </div>
                                </fieldset>


                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{route('information')}}" class="text-decoration-none fw400 fs14"> &lt; Return to information</a>
                                    <button type="submit" class="text-decoration-none text-white btn-green p-3 text-center rounded">Continue to payment</button>
                                </div>
                            </form>
                        </section>
                        <!-- end shipping -->
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
<!--                        <div class="input-group mb-3 pt-3 border-top">
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
