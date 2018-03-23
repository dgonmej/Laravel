@extends('admin.template.main')

@section('title', 'Crear etiqueta')

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la etiqueta', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-secondary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection