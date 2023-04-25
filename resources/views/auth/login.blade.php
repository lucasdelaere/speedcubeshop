<x-layouts.frontend>
    <x-slot:title>login</x-slot:title>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </x-slot>

    <!-- begin main -->
    <main class="container">
        <p class="path-style mt-3">Home &gt; Account</p>
        <header>
            <h1 class="fw700 fs20 mb-4">Account</h1>
        </header>

        <section class="d-flex flex-wrap flex-column flex-md-row position-relative border-bottom pb-5 mb-5">
            <!-- left column -->
            <div id="col-left">
                <div class="bg-light text-center py-3 mb-5 fw900 fs14">RETURNING CUSTOMER</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus required>
                        <label for="email" class="fw400 fs14">Email Address <span class="text-danger">&ast;</span></label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        <label for="password" class="fw400 fs14">Password <span class="text-danger">&ast;</span></label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn-black w-50 text-center" type="submit">LOGIN</button>
                </form>
                <p class="mt-3 fw400 fs12"><a href="" class="text-decoration-none">Forgot your password?</a> or <a href="{{ route('frontend.index') }}" class="text-decoration-none">Return to Store</a></p>
            </div>
            <!-- or -->
            <div class="position-absolute d-none d-lg-block" id="or">
                <span id="or-text" class="text-center">OR</span>
            </div>
            <!-- right column -->
            <div class="text-center" id="col-right">
                <div class="bg-light text-center py-3 mb-5 fw900 fs14">NEW CUSTOMER</div>
                <p class="fw400 fs12 px-5 mx-2">Create an account for faster checkout and to manage your orders.</p>
                <button class="btn-green px-5 mx-2"><a href="{{ route('register') }}" class="text-white text-decoration-none">CREATE AN ACCOUNT</a></button>
            </div>
        </section>
    </main>
    <!-- end main -->
</x-layouts.frontend>
