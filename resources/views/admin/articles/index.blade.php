@extends('admin.template.main')

@section('title', 'Listado de artículos')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-secondary">Crear nuevo artículo</a>
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">&#9998;</a>
                        <a 
                            href="{{ route('categories.destroy', $category->id) }}"
                            class="btn btn-danger"
                            onclick="return confirm('¿Seguro que desea eliminar la categoría?')">
                            &#10008;
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {!! $categories->render() !!}
    </div>
@endsection