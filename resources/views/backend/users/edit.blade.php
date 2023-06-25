<x-layouts.backend>
    <x-slot name="title">Edit User</x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <hr>
                <!-- patch schrijft enkel aangepaste velden weg en schrijft ook aangepaste timestamps weg -->
                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\UsersController@update', $user->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name:') !!}
                    {!! Form::text('first_name', $user->first_name, ['placeholder'=>'First Name', 'class'=>'form-control']) !!}
                    @error('first_name')
                    <!-- $message is useful, but can also write own message -->
                    <p class="text-danger fs-6"> {{$message}} </p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name:') !!}
                    {!! Form::text('last_name', $user->last_name, ['placeholder'=>'Last Name', 'class'=>'form-control']) !!}
                    @error('last_name')
                    <!-- $message is useful, but can also write own message -->
                    <p class="text-danger fs-6"> {{$message}} </p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail:') !!}
                    {!! Form::text('email', $user->email, ['class'=>'form-control', 'placeholder' => 'Email']) !!}
                    @error('email')
                    <p class="text-danger fs-6"> {{$message}} </p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Select role:') !!}
                    {!! Form::select('role_id', $roles,$user->role->id,['class'=>'form-control']) !!} <!-- value, innerHTML, default value (if nothing chosen), [classes]-->
                    @error('role_id')
                    <p class="text-danger fs-6"> {{$message}} </p>
                    @enderror

                </div>
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'), $user->is_active, ['class'=>'form-control']) !!}
                </div> <!-- 0 ('Non Active') is default -->
                @error('is_active')
                <p class="text-danger fs-6"> {{$message}} </p>
                @enderror
                <div class="form-group">
                    {!! Form::label('password','Password:') !!}
                    {!! Form::password('password',['class'=>'form-control', 'placeholder' => 'Password required...']) !!}
                </div>
                @error('password')
                <p class="text-danger fs-6"> {{$message}} </p>
                @enderror
                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo_id:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="d-flex justify-content-end">
                    <div class="form-group mr-1">
                        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['\App\Http\Controllers\UsersController@destroy', $user->id]]) !!}
                    <div class="form-group mr-1">
                        {!! Form::submit('Delete User',['class' => 'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

                @include('includes.form_error')
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <img class="img-fluid img-thumbnail"
                     src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/600x600'}}"
                     alt="{{$user->name}}">
            </div>
        </div>
    </div>
</x-layouts.backend>
