@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
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

    @if (session('warning'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            
                {{ session('warning') }}
            
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.save') }}" method="post">
                @csrf 
                @method('PUT')

                <div class="form-group row">
                    <label for="tituloSite" class="col-sm-2 col-form-label">Titulo do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="tituloSite" value="{{ $settings['title'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="subTitulo" class="col-sm-2 col-form-label">Sub-titulo do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" id="subTitulo" value="{{ $settings['subtitle'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" value="{{ $settings['email'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bgcolor" class="col-sm-2 col-form-label">Cor de Fundo</label>
                    <div class="col-sm-1">
                        <input type="color" name="bgcolor" id="bgcolor" value="{{ $settings['bgcolor'] }}" class="form-control" style="width: 70px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="textcolor" class="col-sm-2 col-form-label">Cor do Texto</label>
                    <div class="col-sm-1">
                        <input type="color" name="textcolor" id="textcolor" value="{{ $settings['textcolor'] }}" class="form-control" style="width: 70px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="titulo_site" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>                

            </form>
        </div>
    </div>
@endsection