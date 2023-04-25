<x-frontend.head>
    <x-slot name="title">SpeedCubeShop</x-slot>
    {{ $slot }}
</x-frontend.head>
<body class="popr fw700">

<!-- begin header -->
<header id="myHeader">
    <!-- begin carousel -->
    <div id="carouselHeader" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false"> <!-- data-bs-pause="hover" (default) pauses the sliding animation on hover -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="0" class="active d-none d-md-block" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="1" aria-label="Slide 2" class="d-none d-md-block"></button>
            <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="2" aria-label="Slide 3" class="d-none d-md-block"></button>
            <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="3" aria-label="Slide 4" class="d-none d-md-block"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item one active" data-bs-interval="5000">
                <div class="carousel-caption jump-animation">
                    <a href="#popularCubes"><button class="btn-orange">Learn more<br><i class="fa-solid fa-angle-down"></i></button></a>
                </div>
            </div>
            <div class="carousel-item two" data-bs-interval="5000">
                <div class="carousel-caption jump-animation">
                    <a href="#popularCubes"><button class="btn-orange">Learn more<br><i class="fa-solid fa-angle-down"></i></button></a>
                </div>
            </div>
            <div class="carousel-item three" data-bs-interval="5000">
                <div class="carousel-caption jump-animation">
                    <a href="#popularCubes"><button class="btn-orange">Learn more<br><i class="fa-solid fa-angle-down"></i></button></a>
                </div>
            </div>
            <div class="carousel-item four" data-bs-interval="5000">
                <div class="carousel-caption jump-animation">
                    <a href="#popularCubes"><button class="btn-orange">Learn more<br><i class="fa-solid fa-angle-down"></i></button></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev d-block d-md-none" type="button" data-bs-target="#carouselHeader" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-block d-md-none" type="button" data-bs-target="#carouselHeader" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carousel -->
    <x-frontend.navbar></x-frontend.navbar>

    <x-frontend.offcanvas></x-frontend.offcanvas>

    <!-- HTML code to include a video as header -->
    <!--<div id="hero">
        <video muted loop id="vid">
            <source src="images/index/4x4solve.mp4" type="video/mp4">
        </video>
    </div> -->
</header>
<!-- end header -->
