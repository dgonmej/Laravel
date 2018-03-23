@extends('admin.template.main')

@section('title', 'Listado de usuarios')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-secondary">Registrar nuevo usuario</a>
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->type == "admin")
                            <span class="badge badge-danger">{{ $user->type }}</span>
                        @else
                            <span class="badge badge-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">&#9998;</a>
                        <a 
                            href="{{ route('users.destroy', $user->id) }}"
                            class="btn btn-danger"
                            onclick="return confirm('¿Seguro que desea eliminar el usuario?')">
                            &#10008;
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {!! $users->render() !!}
    </div>
@endsection