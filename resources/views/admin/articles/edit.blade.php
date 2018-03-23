@extends('admin.template.main')

@section('title', 'Editar categoría ' . $category->name)

@section('content')

    <div class="form-admin">
        {!! Form::open(['route' => ['categories.update', $category], 'method' => 'PUT']) !!}
        
            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoría', 'required']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-secondary']) !!}
            </div>
        
        {!! Form::close() !!}
    </div>

@endsection