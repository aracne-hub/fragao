@extends('layout')

@section('content')
    <style>
        @foreach($categorias as $categoria)
            @if($categoria->fotol)
            .{{ strtolower($categoria->nome) }}-image{
                background: url("/fotos/{{ $categoria->fotol }}") bottom center;
            }
            @endif
            @if($categoria->fotom)
            @media only screen and (min-width: 768px) and (max-width: 959px) {
                .{{ strtolower($categoria->nome) }}-image {
                    background: url("/fotos/{{ $categoria->fotom }}") bottom center;
                }
            }
            @endif
            @if($categoria->fotos)
            @media only screen and (max-width: 767px) {
                .{{ strtolower($categoria->nome) }}-image {
                    background: url("/fotos/{{ $categoria->fotos }}") bottom center;
                }
            }
            @endif
        @endforeach
    </style>
<!--    <section>
        <div class="container">
            <div class="icone_lanche wow fadeInDown" data-wow-delay="1300ms">
                <img src="/img/dog.png" alt="Hotdog">
                <h1>Dog</h1>
            </div>
            <div class="grid-16 grupo">
                <div class="grid-7 wow fadeInLeft esquerda" data-wow-delay="300ms">
                    <div class="cabecalho">
                        <h2 class="nome_lanche">1. Dog</h2>
                        <h2 class="preco_lanche">R$ 3<sup>,90</sup></h2>
                    </div>
                    <div class="separador"></div>
                    <h3 class="ingredientes_lanche">Pão, Salsicha, Batata Palha, Tomate e Alface e mais um monte de cois pra encher</h3>
                </div>
                <div class="grid-7 wow fadeInRight direita" data-wow-delay="300ms">
                    <div class="cabecalho">
                        <h2 class="nome_lanche">2. Double Dog</h2>
                        <h2 class="preco_lanche">R$ 4<sup>,90</sup></h2>
                    </div>
                    <div class="separador"></div>
                    <h3 class="ingredientes_lanche">Pão, 2 Salsichas, Batata Palha, Tomate e Alface</h3>
                </div>
            </div>
            <div class="grid-16 grupo">
                <div class="grid-7 wow fadeInLeft esquerda" data-wow-delay="600ms">
                    <div class="cabecalho">
                        <h2 class="nome_lanche">3. Dog Chicken</h2>
                        <h2 class="preco_lanche">R$ 5<sup>,90</sup></h2>
                    </div>
                    <div class="separador"></div>
                    <h3 class="ingredientes_lanche">Pão, Salsicha, Frango, Batata Palha, Tomate e Alface</h3>
                </div>
                <div class="grid-7 wow fadeInRight direita" data-wow-delay="600ms">
                    <div class="cabecalho">
                        <h2 class="nome_lanche">4. Dog Calabresa</h2>
                        <h2 class="preco_lanche">R$ 6<sup>,90</sup></h2>
                    </div>
                    <div class="separador"></div>
                    <h3 class="ingredientes_lanche">Pão, Salsicha, Calabresa, Batata Palha, Tomate e Alface</h3>
                </div>
            </div>
            <div class="grid-16 grupo">
                <div class="grid-7 wow fadeInLeft esquerda" data-wow-delay="900ms">
                    <div class="cabecalho">
                        <h2 class="nome_lanche">5. Dog Bacon</h2>
                        <h2 class="preco_lanche">R$ 6<sup>,90</sup></h2>
                    </div>
                    <div class="separador"></div>
                    <h3 class="ingredientes_lanche">Pão, Salsicha, Bacon, Batata Palha, Tomate e Alface</h3>
                </div>
            </div>
        </div>
    </section>-->
    @foreach($categorias as $categoria)
        <section>
            @unless($categoria->fotol)
                <div class="icone_lanche wow fadeInDown" data-wow-delay="{{ $loop->first ? '1300' : '1000' }}ms">
                    <img src="/icones/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                    <h1>{{ $categoria->nome }}</h1>
                </div>
            @else
            <div class="vertical-image {{ strtolower($categoria->nome) }}-image">
                <div class="pattern">
                    <div class="icone-lanche-grande wow flipInX" data-wow-delay="1000ms">
                        <img src="/icones/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                        <h1>{{ $categoria->nome }}</h1>
                    </div>
                </div>
            </div>
            @endunless
        </section>
    @endforeach
@stop