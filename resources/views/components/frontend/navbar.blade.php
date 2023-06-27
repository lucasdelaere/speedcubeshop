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
                <a href="{{ route('frontend.index') }}" title="Home"><img src="{{asset('images/index/SCS-logo.png')}}" alt="Logo" class="img-fluid"></a>
            </div>
            <div class="input-group col-4 col-lg-8 w-50 d-none d-lg-flex mx-4">
                <input type="text" class="form-control popr fw700" placeholder="Search" aria-label="Search" aria-describedby="Search-bar">
                <button class="navSearch-button btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-4 col-lg-2 d-flex gap-2 gap-md-3 justify-content-center align-content-center navIcons">
                @guest
                    <a href="{{ route('login') }}" title="Login" class="d-none d-lg-block"><i class="bi bi-person"></i></a>
                @else
                    <div class="d-none d-lg-block dropdown " title="Account">
                        <a href="#" id="accountDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                            <li><h6 class="dropdown-header text-center">Welcome,  <span class="fw-bold">{{Auth::user()->first_name}}</span>.</h6></li>
                            <li><hr class="dropdown-divider"></hr></li>
                            <li><a class="dropdown-item fs12" href="#">Account</a></li>
                            @can('backend')
                            <li><a class="dropdown-item fs12" href="{{route('backend.index')}}">Dashboard</a></li>
                            @endcan
                            <li><a class="dropdown-item fs12" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
                                    Logout
                                </a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
                <a href="./wishlist.html" title="Wishlist" class="d-none d-lg-block"><i class="bi bi-heart"></i></a>
                <livewire:cart-counter>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <ul class="navUl justify-content-center d-none d-lg-flex w-50">
                <li><a href="{{ route('frontend.index') }}" class="hover-underline-animation">Home</a></li>
                <li><a href="{{ route('shop') }}" class="hover-underline-animation">Shop</a></li>
                <li><a href="{{ route('tutorials') }}" class="hover-underline-animation">Tutorials</a></li>
                <li><a href="./contact.html" class="hover-underline-animation">Contact</a></li>
            </ul>
        </div>
    </section>
</nav>
<!-- end navbar -->
