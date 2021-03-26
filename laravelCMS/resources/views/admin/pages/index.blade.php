@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>Minhas Páginas</h1>

@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
            <a href="{{ route('pages.create') }}" class="btn btn-md btn-success">Nova Página</a> <br><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th width="250">Ações</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach ($pages as $page)                            
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>
                                    <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-info">Editar</a>
                                    <form class="d-inline" action="{{ route('pages.destroy', ['page' => $page->id]) }}" method="POST" onclick="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>                                    
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>        
                </table>
        </div>
    </div>

    {{ $pages->links() }}

@endsection