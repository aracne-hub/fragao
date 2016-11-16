@extends('layout')

@section('content')
    <style>
        @foreach($categorias as $categoria)
            @if($categoria->fotol)
                .{{ strtolower($categoria->nome) }}-image{
                    background: url("/{{ $categoria->fotol }}") bottom center;
                }
                @endif
                @if($categoria->fotom)
                @media only screen and (min-width: 768px) and (max-width: 959px) {
                    .{{ strtolower($categoria->nome) }}-image {
                        background: url("/{{ $categoria->fotom }}") bottom center;
                    }
                }
                @endif
                @if($categoria->fotos)
                @media only screen and (max-width: 767px) {
                    .{{ strtolower($categoria->nome) }}-image {
                        background: url("/{{ $categoria->fotos }}") bottom center;
                    }
                }
            @endif
        @endforeach
    </style>
    @foreach($categorias as $categoria)
        <section>
            @unless($categoria->fotol)
                <div class="icone_lanche wow fadeInDown" data-wow-delay="{{ $loop->first ? '1300' : '1000' }}ms">
                    <img src="/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                    <h1>{{ $categoria->nome }}</h1>
                </div>
            @else
            <div class="vertical-image {{ strtolower($categoria->nome) }}-image">
                <div class="pattern">
                    <div class="icone-lanche-grande wow flipInX" data-wow-delay="1000ms">
                        <img src="/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                        <h1>{{ $categoria->nome }}</h1>
                    </div>
                </div>
            </div>
            @endunless
            <div class="container">
            @foreach($categoria->lanches as $lanche)
                @if($loop->iteration % 2)
                    <div class="grid-16 grupo">
                @endif
                    <div class="grid-7 wow {{ ($loop->iteration % 2) ? 'fadeInLeft esquerda' : 'fadeInRight direita' }}" data-wow-delay="{{ 100*$loop->iteration }}ms">
                        <div class="cabecalho">
                            <h2 class="nome_lanche">{{ $loop->iteration }}. {{ $lanche->nome }}</h2>
                            <h2 class="preco_lanche">R$ {{ substr($lanche->preco, 0, -3) }}<sup>{{ substr($lanche->preco, -3) }}</sup></h2>
                        </div>
                        <div class="separador"></div>
                        <h3 class="ingredientes_lanche">{{ $lanche->ingredientes }}</h3>
                    </div>
                @if($loop->iteration % 2 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
            </div>
        </section>
    @endforeach
@stop