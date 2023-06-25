<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="css/slick/slick-theme.css">
    <link rel="stylesheet" href=
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header+footer.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body class="popr fw700">

<!-- begin header -->
<header id="myHeader" class="container-fluid bg-black"> <!-- bg-black op alle niet-home pagina's! -->
    <!-- begin navbar -->
    <nav class="navbar row">
        <section class="col-12 col-lg-10 offset-lg-1">
            <div class="row flex-nowrap align-items-center justify-content-between mb-1">
                <div class="col-4 d-lg-none p-0 d-flex justify-content-center">
                    <button class="navbarToggler py-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" title="Menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div class="navbar-brand col-4 col-lg-2 justify-content-center m-0">
                    <a href="./index.html" title="Home"><img src="images/index/SCS-logo.png" alt="Logo" class="img-fluid"></a>
                </div>
                <div class="input-group col-4 col-lg-8 w-50 d-none d-lg-flex mx-4">
                    <input type="text" class="form-control popr fw700" placeholder="Search" aria-label="Search" aria-describedby="Search-bar">
                    <button class="navSearch-button btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="col-4 col-lg-2 d-flex gap-2 gap-md-3 justify-content-center align-content-center navIcons">
                    <a href="./login.html" title="Login" class="d-none d-lg-block"><i class="bi bi-person"></i></a>
                    <a href="./wishlist.html" title="Wishlist" class="d-none d-lg-block"><i class="bi bi-heart"></i></a>
                    <a href="./cart.html" title="Cart" class="position-relative"><i class="bi bi-cart3"></i><span id="cartCounter" class="position-absolute top-0 start-100 translate-middle text-white text-center fs10 bg-green">2</span></a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <ul class="navUl justify-content-center d-none d-lg-flex w-50">
                    <li><a href="./index.html" class="hover-underline-animation">Home</a></li>
                    <li><a href="./shop.html" class="hover-underline-animation">Shop</a></li>
                    <li><a href="tutorials.html" class="hover-underline-animation">Tutorials</a></li>
                    <li><a href="./contact.html" class="hover-underline-animation">Contact</a></li>
                </ul>
            </div>
        </section>
    </nav>
    <!-- end navbar -->

    <!-- begin offcanvas -->
    <div class="offcanvas offcanvas-start overflow-auto" data-bs-scroll="true" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <img src="images/index/SCS-logo.png" alt="Logo" class="img-fluid">
            <button type="button" data-bs-dismiss="offcanvas" class="closeOffcanvas">&times;</button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="input-group w-100" id="offcanvasSearch" role="search">
                <input type="text" class="form-control popr fs14 fw700" placeholder="Search" aria-label="Search" aria-describedby="Search-bar">
                <button class="btn btn-outline-secondary" type="button" id="offcanvasSearch-button"><i class="bi bi-search"></i></button>
            </div>
            <ul class="navbar-nav flex-grow-1 mb-4">
                <li class="nav-item border-bottom">
                    <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" href="./shop.html">Shop</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" href="tutorials.html">Tutorials</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" href="./contact.html">Contact</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" href="./wishlist.html">Wishlist</a>
                </li>
            </ul>
            <div class="fs14 fw700 text-center">
                <a class="text-decoration-none" href="login.html">Login</a><span class="px-2"> or </span><a class="text-decoration-none" href="register.html">Register</a>
            </div>
        </div>
    </div>
    <!-- end offcanvas -->
</header>
<!-- end header -->

<!-- begin main -->
<main class="container">
    <p class="path-style py-3">Home &gt; Puzzles &gt; QiYi MS Magnetic 3x3</p>
    <!-- begin productTop -->
    <section id="productTop" class="row mb-5">
        <!-- begin productcol1 -->
        <div class="col-12 col-md-4 mb-5">
            <div class="slider-for mb-5">
                <img src="images/product/cube1.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube2.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube3.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube4.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube4.jpg" class="img-fluid" alt="...">
            </div>
            <div class="slider-nav">
                <img src="images/product/cube1.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube2.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube3.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube4.jpg" class="img-fluid" alt="...">
                <img src="images/product/cube4.jpg" class="img-fluid" alt="...">
            </div>
        </div>
        <!-- end productcol1 -->
        <!-- begin productcol2 -->
        <div class="col-12 col-md-4">
            <header class="mb-3">
                <h1>QiYi MS Magnetic 3x3</h1>
            </header>
            <div class="d-flex pb-3 align-items-center">
                <i class="fa-solid fa-star fa-xs yellow"></i>
                <i class="fa-solid fa-star fa-xs yellow"></i>
                <i class="fa-solid fa-star fa-xs yellow"></i>
                <i class="fa-solid fa-star fa-xs yellow"></i>
                <i class="fa-solid fa-star fa-xs yellow"></i>
                <p class="fw400 fs12 mb-0 ms-4">164 reviews</p>
            </div>
            <div class="mb-4">
                <p class="p-style" id="brand">Brand &emsp; QiYi</p>
                <p class="p-style" id="status">Status &emsp; <span><i class="fa-solid fa-xs fa-circle"></i> Ready to ship!</span></p>
            </div>
            <p class="fw600">&euro;7,57</p>
            <p class="fw600 fs12 mb-0">Quantity:</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="input-group w-60">
                    <button class="btn btn-light btn-outline-secondary" type="button">-</button>
                    <input type="number" value="1" min="1" class="form-control text-center" id="quantity"/>
                    <button class="btn btn-light btn-outline-secondary" type="button">+</button>
                </div>
                <i class="bi bi-heart"></i>
            </div>
            <button class="btn-green w-100">ADD TO CART</button>
        </div>
        <!-- end productcol2 -->
        <!-- begin productcol3 -->
        <div class="col-12 col-md-4">
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
                                        <img src="images/product/stickerless-bright.png" alt="stickerless (bright)">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <img src="images/product/black.png" alt="black">
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
                                <img src="images/product/lube-service.jpg" alt="lube service" class="col-3">
                                <div class="form-check col-9 d-flex justify-content-start align-items-center">
                                    <input type="checkbox" class="form-check-input me-2 mt-0" id="lubeService">
                                    <label for="lubeService" class="form-check-label float-end"> Add Lube Service to product for &euro;4,75</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="tab-pane fade p-style show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">QiYi MS Magnetic 3x3 is an entry-level speed cube that performs nearly as well as a mid-level!
            </div>
            <div class="tab-pane fade p-style" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">...</div>
            <div class="tab-pane fade p-style" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                <div class="row">
                    <ul class="col-2">
                        <li>Type</li>
                        <li>Magnets</li>
                        <li>Size</li>
                        <li>Weight</li>
                        <li>Released</li>
                    </ul>
                    <ul class="col-2">
                        <li>3x3</li>
                        <li>Moderate</li>
                        <li>56 mm</li>
                        <li>58 g</li>
                        <li>2020-04-24</li>
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
<!-- end main -->

<!-- begin footer -->
<footer class="container-fluid">
    <div class="container">
        <div class="row py-3" id="footerRow1">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="row">
                    <div class="accordion accordion-flush accordionFooter accordionSm col-12 col-md-4 d-md-none">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    LET US HELP YOU
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="" class="hover-underline-animation">Contact us</a></li>
                                        <li><a href="" class="hover-underline-animation">Shipping &amp; Delivery</a></li>
                                        <li><a href="" class="hover-underline-animation">Returns &amp; Exchanges</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordionFooter accordionMd col-12 col-md-4 d-none d-md-block">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOneMd">
                                <button class="accordion-button" type="button" aria-expanded="true" >
                                    LET US HELP YOU
                                </button>
                            </h2>
                            <div id="collapseOneMd" class="accordion-collapse collapse show" aria-labelledby="headingOneMd" data-bs-parent="#accordionOneMd">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="" class="hover-underline-animation">Contact us</a></li>
                                        <li><a href="" class="hover-underline-animation">Shipping &amp; Delivery</a></li>
                                        <li><a href="" class="hover-underline-animation">Returns &amp; Exchanges</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordionFooter accordionSm col-12 col-md-4 d-md-none">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    INFORMATION
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="" class="hover-underline-animation">Help Center</a></li>
                                        <li><a href="" class="hover-underline-animation">Sweepstakes</a></li>
                                        <li><a href="" class="hover-underline-animation">Wallpapers & Logos</a></li>
                                        <li><a href="" class="hover-underline-animation">Terms of Service</a></li><li><a href="" class="hover-underline-animation">Refund policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordionFooter accordionMd col-12 col-md-4 d-none d-md-block">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoMd">
                                <button class="accordion-button" type="button" aria-expanded="true" >
                                    INFORMATION
                                </button>
                            </h2>
                            <div id="collapseTwoMd" class="accordion-collapse collapse show" aria-labelledby="headingTwoMd" data-bs-parent="#accordionTwoMd">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="" class="hover-underline-animation">Help Center</a></li>
                                        <li><a href="" class="hover-underline-animation">Sweepstakes</a></li>
                                        <li><a href="" class="hover-underline-animation">Wallpapers &amp; Logos</a></li>
                                        <li><a href="" class="hover-underline-animation">Terms of Service</a></li>
                                        <li><a href="" class="hover-underline-animation">Refund policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordionFooter accordionSm col-12 col-md-4 d-md-none">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    GET TO KNOW US
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionThree">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="" class="hover-underline-animation">Reviews</a></li>
                                        <li><a href="" class="hover-underline-animation">Our Story</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordionFooter accordionMd col-12 col-md-4 d-none d-md-block" >
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThreeMd">
                                <button class="accordion-button" type="button" aria-expanded="true" >
                                    GET TO KNOW US
                                </button>
                            </h2>
                            <div id="collapseThreeMd" class="accordion-collapse collapse show" aria-labelledby="headingThreeMd" data-bs-parent="#accordionThreeMd">
                                <div class="accordion-body">
                                    <ul class="list-style-none p-0">
                                        <li><a href="#" class="hover-underline-animation">Reviews</a></li>
                                        <li><a href="#" class="hover-underline-animation">Our Story</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 pt-3">
                <!-- col-md-auto so that new row is used when icons are out of bound -->
                <div class="mb-5">
                    <p>STAY CONNECTED</p>
                    <ul id="socials" class="text-center d-flex p-0">

                        <a href="" id="facebook"><li><i class="fa-brands fa-facebook-f fa-sm"></i></li></a>

                        <a href="" id="twitter"><li><i class="fa-brands fa-twitter fa-sm"></i></li></a>

                        <a href="" id="instagram"><li><i class="fa-brands fa-instagram fa-sm"></i></li></a>

                        <a href="" id="youtube"><li><i class="fa-brands fa-youtube fa-sm"></i></li></a>

                        <a href="" id="tiktok"><li><i class="fa-brands fa-tiktok fa-sm"></i></li></a>

                        <a href="" id="discord"><li><i class="fa-brands fa-discord fa-sm"></i></li></a>

                        <a href="" id="reddit"><li><i class="fa-brands fa-reddit-alien fa-sm"></i></li></a>
                    </ul>
                </div>
                <div>
                    <p>GET SALES, NEW RELEASES, TIPS, AND NEWS</p>
                    <div class="d-flex flex-wrap">
                        <input id="newsletter" type="text" placeholder="enter your email">
                        <label for="newsletter"></label>
                        <button class="btn-black mt-1 mt-md-0 ms-0 ms-md-1" id="subscribebtn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3" id="footerRow2">
            <p>&copy; 2022 SpeedCubeShop, Inc.</p>
        </div>
    </div>

</footer>
<!-- end footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="css/slick/slick.min.js"></script>
<script src="https://kit.fontawesome.com/3706289f39.js" crossorigin="anonymous"></script>
<script src="node_modules/nouislider/dist/nouislider.js"></script>
<script src="js/product.js"></script>
</body>
</html>
