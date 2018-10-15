@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnURL' => route('categoria_listar'), 'title' => 'Nova categoria'] )@endnavbar_secundaria

  @alert @endalert

<div class="container p-0">



          <form class="bg-white p-3" action="{{ route('categoria_salvar') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="form-group" >
              <label for="nomeCategoria">Nome:</label>
              <input type="text" class="form-control" id="nomeCategoria" placeholder="Nome" required>
            </div>

            <div class="form-group">
              <label for="browseIcone">Ícone:</label>
              <img class="icone-upado" id="icone"/>
            </div>

            <div class="form-group">
              <label class= "btn btn-secondary" for="browseButton">Selecionar ícone</label>
              <input type="file" name="arquivo_icone" class="botao-browse" id="browseButton" onchange="readURL(this);"  accept=".png, .jpg" width="64" height="64" required>
            </div>

            <button type="submit" class="btn btn-primary botao-submit" >Salvar</button>

          </form>


</div>
@endsection
