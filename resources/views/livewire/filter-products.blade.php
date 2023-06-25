<div>
    <div class="row">
        <!-- begin offcanvas -->
        <div wire:ignore class="offcanvas-xl offcanvas-start overflow-auto col-xl-3" data-bs-scroll="true" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasFilter">
            <div class="offcanvas-header">
                <button type="button" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasFilter" class="btn-close ms-auto"></button>
            </div>
            <form>
                <!-- price range -->
                <div class="accordion accordion-flush accordionShop">
                    <div class="accordion-item" id="accordionPrice">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                Price range
                            </button>
                        </h2>
                        <div id="collapsePrice" class="accordion-collapse collapse show" aria-labelledby="headingPrice" data-bs-parent="#accordionPrice">
                            <div class="accordion-body">
                                <div wire:ignore id="slider" class="ms-3 mb-2"></div>
                                <div class="d-flex justify-content-between">
                                    <div wire:ignore id="sliderMin" class="p-style"></div>
                                    <div wire:ignore id="sliderMax" class="p-style"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- minimal rating -->
                <div class="accordion accordion-flush accordionShop">
                    <div class="accordion-item" id="accordionRating">
                        <h2 class="accordion-header" id="headingRating">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRating" aria-expanded="true" aria-controls="collapseRating">
                                Minimal Rating
                            </button>
                        </h2>
                        <div id="collapseRating" class="accordion-collapse collapse show" aria-labelledby="headingRating" data-bs-parent="#accordionRating">
                            <div class="accordion-body">
                                <div id="rater" class="star-rating pb-3" style="width: 160px; height: 32px; background-size: 32px;" wire:click="setRating($event.target.getAttribute('data-rating'))">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- puzzle type -->
                <div class="accordion accordion-flush accordionShop">
                    <div class="accordion-item" id="accordionType">
                        <h2 class="accordion-header" id="headingType">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseType" aria-expanded="true" aria-controls="collapseType">
                                PUZZLE TYPE
                            </button>
                        </h2>
                        <div id="collapseType" class="accordion-collapse collapse show" aria-labelledby="headingType" data-bs-parent="#accordionType">

                            <div class="accordion-body">
                                @foreach($types as $type)
                                    <div class="form-check">
                                        <input wire:model="selectedTypes" class="form-check-input" type="checkbox" value="{{ $type->name }}" id="type{{$type->name}}">
                                        <label class="form-check-label offcanvasText" for="type{{$type->name}}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- brand -->
                <div class="accordion accordion-flush accordionShop">
                    <div class="accordion-item" id="accordionBrand">
                        <h2 class="accordion-header" id="headingBrand">
                            <button class="accordion-button offcanvasHeader pt-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseType">
                                BRAND
                            </button>
                        </h2>
                        <div id="collapseBrand" class="accordion-collapse collapse show" aria-labelledby="headingBrand" data-bs-parent="#accordionBrand">
                            <div class="accordion-body">
                                @foreach($brands as $brand)
                                    <div class="form-check">
                                        <input wire:model="selectedBrands" class="form-check-input" type="checkbox"
                                               value="{{$brand->name}}" id="brand{{$brand->id}}">
                                        <label class="form-check-label offcanvasText" for="brand{{$brand->name }}">
                                            {{$brand->name}}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end offcanvas -->
        <div class="col-12 col-xl-9">
            <header>
                <h1 class="text-center text-xl-start fw700">PUZZLES</h1>
            </header>
            <!-- begin optionsBar -->
            <section id="optionsBar" class="container bg-light py-2 mb-5 mt-5 mt-xl-3">
                <div class="d-flex justify-content-between">
                    <div id="refineBy" class="d-xl-none d-flex" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter"> <!-- geen offcanvasFilter vanaf xl -->
                        <i class="bi bi-filter align-self-center"></i>
                        <p class="optionsBar-text align-self-center ms-2 d-none d-md-block">REFINE BY</p>
                    </div>
                    <div class="d-flex">
                        <p class="optionsBar-text align-self-center me-2 d-none d-md-block">Sort by</p>
                        <select name="sortBy" id="sortBy">
                            <!-- eventueel nog best selling option -->
                            <option value="">Rating</option>
                            <option value="">Alphabetically, A-Z</option>
                            <option value="">Alphabetically, Z-A</option>
                            <option value="">Price, low to high</option>
                            <option value="">Price, high to low</option>
                            <option value="">Date, old to new</option>
                            <option value="">Date, new to old</option>
                        </select>
                    </div>
                    <div class="d-none d-lg-flex">
                        <p class="optionsBar-text align-self-center me-2">Items per page</p>
                        <select name="itemsPerPage" id="itemsPerPage">
                            <!-- eventueel nog best selling option -->
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="20">20</option>
                            <option value="24">24</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        <p class="optionsBar-text align-self-center me-2 d-none d-md-block">View as</p>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary" for="btnradio1"><i class="fa-solid fa-grip-lines"></i></label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradio2"><i class="fa-solid fa-table-cells-large"></i></label>

                            <input type="radio" class="btn-check d-none d-md-block" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-secondary d-none d-md-block" for="btnradio3"><i class="fa-solid fa-table-cells"></i></label>

                        </div>
                    </div>
                </div>
            </section>
            <!-- end optionsBar -->
            <!-- begin sectionProducts -->
            <section id="sectionProducts">
                <!-- nu worden producten onder elkaar weergegeven op mobile en in een grid vanaf medium, later moet alles mogelijk zijn op elke resolutie met de 'View as'-knoppen -->
                <div id="products" class="row row-cols-1 row-cols-md-3 g-3 mb-5">
                    @foreach($products as $product)
                        <div>
                            <article class="card col bg-light p-0">
                                <div class="container-fluid">
                                    <div class="row flex-md-none">
                                        <a href="{{ route('products.showFrontend', $product) }}" class="col-4 col-md-12 p-0">
                                            <img src="{{$product->photo_id ? asset($product->photo->file): "http://via.placeholder.com/62x62"}}" alt="productpicture{{$product->id}}" class="card-img-top">
                                        </a>
                                        <div class="card-body col-8 col-md-12">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <div class="d-flex">
                                                @for( $i = 0; $i < $product->rating; $i++)
                                                    <i class="fa-solid fa-star productStar yellow"></i>
                                                @endfor
                                                @for( $i = 0; $i < 5-$product->rating; $i++)
                                                    <i class="fa-solid fa-star productStar"></i>
                                                @endfor
                                            </div>
                                            <p class="card-description d-md-none">{{ Str::limit($product->description, 120) }}
                                            </p>
                                            <p class="popeb">&euro; {{ $product->price }}</p>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn-green">ADD TO CART</button>
                                                <a href="#" class="align-self-center"><i class="bi bi-heart addWishlist"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article > <!-- of shadow met een :hover in css, of onmouseenter en onmouseleave events via js toevoegen aan elk product -->
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
<!--                <div class="d-flex justify-content-between path-style">
                    <p>Showing: 1-12 of 758</p>
                    <div id="pageNav" class="d-flex text-decoration-none">
                        <a href="#" title="Prev"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#" title="Prev"><p>PREV</p></a>
                        <a href="#"><p>1</p></a>
                        <a href="#"><p>2</p></a>
                        <a href="#"><p>3</p></a>
                        <p>...</p>
                        <a href="#"><p>64</p></a>
                        <a href="#" title="Next"><p>NEXT</p></a>
                        <a href="#" title="Next"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>-->
            </section>
            <!-- end sectionProducts -->
        </div>
    </div>
</div>
