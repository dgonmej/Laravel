@extends('admin.template.main')

@section('title', 'Crear usuario')

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo electrónico:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Contraseña:') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Tipo de usuario:') !!}
                {!! Form::select(
                    'type', ['member' => 'Miembro', 'admin' => 'Administrador'], 
                    null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-secondary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection