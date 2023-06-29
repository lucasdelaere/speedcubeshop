<x-layouts.backend>
    <x-slot name="title">
        <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="d-flex">
                <h1 class="m-0">Create Product</h1>
                <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
            </div>
        </div>
    </x-slot>
        <form action="{{action('App\Http\Controllers\ProductController@store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group mb-3">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{old('name')}}">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Description">{{old('description')}}</textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <select name="brand_id" id="brand_id" class="form-control mb-3 @error('brand_id') is-invalid @enderror">
                    <option selected disabled>Select a brand</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" @if(old('brand_id') == $brand->id) selected @endif)>{{$brand->name}}</option>
                    @endforeach
                </select>
                @error('brand_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <select name="type_id" id="type_id" class="form-control mb-3 @error('type_id') is-invalid @enderror">
                    <option selected disabled>Select a type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" @if(old('type_id') == $type->id) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
                @error('type_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input name="price" type="number" class="form-control" id="price" placeholder="Price" step="0.01" min="0" value="{{old('price')}}">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input name="rating" type="number" class="form-control" id="rating" placeholder="Rating" min="0" value="{{old('rating')}}">
                @error('rating')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="photo_id">photo_id: </label>
                <input id="photo_id" name="photo_id" type="file" class="form-control">
                @error('photo_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">SUBMIT</button>
        </form>
</x-layouts.backend>
