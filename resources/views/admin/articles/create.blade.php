@extends('admin.template.main')

@section('title', 'Crear artículo')

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Título:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoría:') !!}
                {!! Form::select('categoriy_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Contenido:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Añade contenido...']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tags', 'Etiquetas:') !!}
                {!! Form::select('tags[]', $tags, null, [class' => 'form-control', 'multiple', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Imagen:') !!}
                {!! Form::file('image') !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Agregar artículo', ['class' => 'btn btn-secondary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection