<x-layouts.backend>
    <x-slot name="title">Create User</x-slot>
    <hr>
    @include('includes.form_error') <!-- validation -->
    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\UsersController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['placeholder'=>'First Name', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['placeholder'=>'Last Name', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder' => 'Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Select role:') !!}
        {!! Form::select('role_id', $roles,null,['class'=>'form-control']) !!} <!-- value, innerHTML, default value (if nothing chosen), [classes]-->

    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control']) !!}
    </div> <!-- 0 ('Non Active') is default -->
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control', 'placeholder' => 'Password required...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo_id:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</x-layouts.backend>
