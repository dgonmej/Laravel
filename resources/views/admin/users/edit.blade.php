@extends('admin.template.main')

@section('title', 'Editar el usuario ' . $user->name)

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo electrónico:') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Tipo de usuario:') !!}
                {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-secondary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection