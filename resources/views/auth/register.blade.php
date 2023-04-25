<x-layouts.frontend>
    <x-slot name="title">register</x-slot>

    <!-- begin main -->
    <main class="container pb-5">
        <p class="path-style mt-3">Home &gt; Register</p>
        <header>
            <h1 class="fw700 fs20 mb-4">CREATE AN ACCOUNT</h1>
        </header>
        <hr class="text-secondary">
        <form class="col-12 col-md-6 py-3" method="POST" action="{{ route('register') }}">
            @csrf

            <p class="fw400 fs12">Create an account for faster checkout and to manage your orders</p>
            <div class="mb-3">
                <label for="first_name" class="mb-2 fw500 fs12">First Name <span class="text-danger">&ast;</span></label>
                <input type="text" id="first_name" name="first_name" class="form-control px-3 py-2 fw400 fs12 @error('first_name') is-invalid @enderror" placeholder="First Name" value="{{ old('first_name') }}" required>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="mb-2 fw500 fs12">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control px-3 py-2 fw400 fs12 @error('last_name') is-invalid @enderror" placeholder="Last Name" value="{{ old('last_name') }}">

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="mb-2 fw500 fs12">Your Email Address <span class="text-danger">&ast;</span></label>
                <input type="email" id="email" name="email" class="form-control px-3 py-2 fw400 fs12 @error('email') is-invalid @enderror" placeholder="Your Email Address" value="{{ old('email') }}" required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="mb-2 fw500 fs12">Your Password <span class="text-danger">&ast;</span></label>
                <input type="password" id="password" name="password" class="form-control px-3 py-2 fw400 fs12 @error('password') is-invalid @enderror" placeholder="Your Password" required>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirm" class="mb-2 fw500 fs12">Confirm Password <span class="text-danger">&ast;</span></label>
                <input type="password" id="password_confirm" name="password_confirmation" class="form-control px-3 py-2 fw400 fs12 @error('password') is-invalid @enderror" placeholder="Your Password" required>

            </div>
            <button class="btn-black w-50" type="submit">CREATE AN ACCOUNT</button>
        </form>
    </main>
    <!-- end main -->
</x-layouts.frontend>
