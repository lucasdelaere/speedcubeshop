<x-layouts.backend>
    <x-slot name="title">Edit Brand</x-slot>

    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex align-items-center">
            <h1 class="mb-0 mr-3">Edit | <strong>{{$brand->name}}</strong></h1>
        </div>

        <div class="d-flex">
            <a class="btn btn-primary mx1 my-2 rounded-pill" href="{{ route('brands.index') }}">All brands</a>
            <a class="btn btn-primary mx-1 my-2 rounded-pill" href="{{ route('brands.create') }}">Create brand</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6">
            <form action="{{action('App\Http\Controllers\BrandController@update', $brand->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name" value="{{$brand->name}}">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$brand->description}}</textarea>
                    @error('description')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE</button>
            </form>
        </div>
    </div>
</x-layouts.backend>

