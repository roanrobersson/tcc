@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('comanda_listar'),
                             'title' => 'Visualizando comanda']);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír esse item?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

  <script type="text/javascript">
    jQuery(function($) {
        $('.valorItem').autoNumeric('init');
    });
  </script>

<div class="container p-0">



  <div class="container card-comanda-titulo rounded">
    <div class="row card-comanda-titulo-row-nomeCliente text-center">
      <div class="col-12 text-center">
        {{ $comanda->nomeCliente }}
      </div>
    </div>
    <hr class="row m-0 p-0" style="border-top: 1px solid white;">
    <div class="row card-comanda-titulo-row-valorTotal">
      <div class="col-3 text-left" style="transform: translateY(10%)">
        Itens:
        {{ $comanda->itens->count()}}
      </div>
      <div class="col-5 text-left" style="transform: translateY(10%)">
        Valor total:
        <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $comanda->itens->sum('valor') }}</span>
      </div>
      <div class="col-4 text-right">
        <!-- Botão novo pedido-->
        <a class="botao-categoria-editar" href="{{ route('comanda_novoPedido') }}"> <img class="list-img-action" src="{{ asset('img/add_white.png') }}" alt="img_editar"> </a>

        @if($comanda->itens->count('valor') > 0.01)
          <!-- Botão PagarComanda -->
          <a class="botao-categoria-editar ml-4" href="{{ route('comanda_pagar', ['id' => $comanda->id]) }}"> <img class="list-img-action" src="{{ asset('img/pay.png') }}" alt="img_editar"> </a>
        @endif
      </div>

    </div>
  </div>


  @forelse ($comanda->itens->sortBy("nome") as $ci)
  <div class="container">
    <div class="row lista-itens-comanda-linha">
      <div class="col-6">
        {{ $ci->nome }}
      </div>
      <div class="col-3 text-center ">
        <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $ci->valor }}</span>
      </div>
      <div class="col-3 text-right">
        <!-- Botão excluir -->
        <button type="button" class="botao-categoria-excluir" onclick="abrirModal({{$ci->pivot->id}}, '{{ route('comanda_apagar_item', ['id' => $comanda->id, 'idItem' => $ci->pivot->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/garbage.png') }}" alt="img_excluir"></button>
      </div>
    </div>
  </div>

  @empty
  <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Nenhum item foi adicionado na comanda!
  </div>
  @endforelse

  <div class="container">
    <div class="row comanda-ValorTotal rounded">
      <div class="col-6">
        Valor total:
      </div>
      <div class="col-3 text-center">
        <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $comanda->itens->sum('valor') }}</span>
      </div>
    </div>
  </div>


</div>


@endsection
