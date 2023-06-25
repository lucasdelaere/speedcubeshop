<x-layouts.backend>
    <x-slot name="title">
            <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="d-flex">
                    <h1 class="m-0">Create Brand</h1>
                    <a href="{{route('brands.index')}}" class="btn btn-primary m-2 rounded-pill">All Brands</a>
                </div>
            </div>
            <form action="{{action('App\Http\Controllers\BrandController@store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input name="description" type="text" class="form-control" id="description" placeholder="Description">
                    @error('description')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">SUBMIT</button>
            </form>

    </x-slot>
</x-layouts.backend>
