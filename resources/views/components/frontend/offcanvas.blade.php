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
                <a class="nav-link active" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
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
            @can('backend')
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{route('backend.index')}}">Dashboard</a>
            </li>
            @endcan
        </ul>
        <div class="fs14 fw700 text-center">
            @guest
            @if (Route::has('login'))
                <a class="text-decoration-none" href="{{route('login')}}">Login</a>
            @endif
            @if (Route::has('register'))
                <span class="px-2"> or </span><a class="text-decoration-none" href="{{ route('register') }}">Register</a>
            @endif

            @else
                <a href="#" class="text-decoration-none">Account</a>
                <span class="px-2"> | </span>
                <a class="text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</div>
<!-- end offcanvas -->
