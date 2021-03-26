@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Meus Usuários</h1>

@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a> <br><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>        
                <tbody>
                    @foreach ($users as $user)        
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>

                            @if ($user->id !== $loggedId )
                                <form class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            @endif

                            
                        </td>
                    </tr>
                @endforeach
                </tbody>        
            </table>
        </div>
    </div>

    {{ $users->links() }}

@endsection