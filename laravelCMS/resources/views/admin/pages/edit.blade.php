@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <h1>Editar Página</h1>

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
            <form action="{{ route('pages.update', ['page' => $page->id]) }}" method="post" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ $page->title }}" id="title" class="form-control @error('title') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control bodyField">{{ $page->body }}</textarea>
                    </div>
                </div>
        
                <div class="form-group row">  
                    <label class="col-sm-2 col-form-label"></label>         
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Slavar">
                    </div>
                </div>
        
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js"></script>    
    <script>
        tinymce.init({
            selector:'textarea.bodyField',
            height:500,
            menubar: false,
            plugins:['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar:'undo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css:[
                '{{asset('assets/css/content.css')}}'
            ],
            images_upload_url:'{{ route('imageupload') }}',
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>


@endsection