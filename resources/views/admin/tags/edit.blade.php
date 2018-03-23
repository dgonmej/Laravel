@extends('admin.template.main')

@section('title', 'Editar la categoría ' . $tag->name)

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => ['tags.update', $tag], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la etiqueta', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-secondary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection