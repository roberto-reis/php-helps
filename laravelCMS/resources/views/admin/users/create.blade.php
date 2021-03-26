@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5>
                <i class="icon fas fa-ban"></i>
                Ocorreu um erro!
            </h5>     
            <ul>
                
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name') }}" id="nome" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="senha" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmeSenha" class="col-sm-2 col-form-label">Senha Novamente</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" id="confirmeSenha" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>
        
                <div class="form-group row">  
                    <label class="col-sm-2 col-form-label"></label>         
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                    </div>
                </div>
        
            </form>
        </div>
    </div>


@endsection