@extends('admin.template.main')

@section('title', 'Listado de etiquetas')

@section('content')
    <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Crear nueva etiqueta</a>
    <!-- BUSCADOR DE TAGS -->
        {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            <div class="input-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
                <!-- <span class="input-group-addon" id="search"></span> -->
            </div>
        {!! Form::close() !!}
    <!-- FIN DEL BUSCADOR -->
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">&#9998;</a>
                        <a 
                            href="{{ route('tags.destroy', $tag->id) }}" 
                            class="btn btn-danger"
                            onclick="return confirm('¿Seguro que desea eliminar la etiqueta?')">
                            &#10008;
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {!! $tags->render() !!}
    </div>
@endsection