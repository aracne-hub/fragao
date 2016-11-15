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
    @foreach($categorias as $categoria)
        <section>
            @unless($categoria->fotol)
                <div class="icone_lanche wow fadeInDown" data-wow-delay="{{ $loop->first ? '1300' : '1000' }}ms">
                    <div class="admin-edit">
                        <a href="#" class="editicons">
                            <i class="fa fa-pencil fa-fx"></i>
                        </a>
                        <a href="#" class="editicons">
                            <i class="fa fa-trash fa-fx"></i>
                        </a>
                    </div>
                    <img src="/icones/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                    <h1>{{ $categoria->nome }}</h1>
                </div>
                @else
                    <div class="vertical-image {{ strtolower($categoria->nome) }}-image">
                        <div class="pattern">
                            <div class="icone-lanche-grande wow flipInX" data-wow-delay="1000ms">
                                <div class="admin-edit">
                                    <a href="#" class="editicons">
                                        <i class="fa fa-pencil fa-fx"></i>
                                    </a>
                                    <a href="#" class="editicons">
                                        <i class="fa fa-trash fa-fx"></i>
                                    </a>
                                </div>
                                <img src="/icones/{{ $categoria->icone }}" alt="{{ $categoria->nome }}">
                                <h1>{{ $categoria->nome }}</h1>
                            </div>
                        </div>
                    </div>
                    @endunless
                    <div class="container">
                        @forelse($categoria->lanches as $lanche)
                            @if($loop->iteration % 2)
                                <div class="grid-16 grupo">
                                    @endif
                                    <div class="grid-7 wow fadeInLeft {{ ($loop->iteration % 2) ? 'esquerda' : 'direita' }}" data-wow-delay="{{ 150*$loop->iteration }}ms">
                                        <div class="admin-edit">
                                            <a href="#" class="editicons" data-toggle="modal" data-target="#lanche-{{ $lanche->id }}">
                                                <i class="fa fa-pencil fa-fx"></i>
                                            </a>
                                            <a href="/lanche/{{ $lanche->id }}" class="editicons" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Tem certeza que deseja apagar {{ $lanche->nome }}?">
                                                <i class="fa fa-trash fa-fx"></i>
                                            </a>
                                        </div>
                                        <div class="cabecalho">
                                            <h2 class="nome_lanche">{{ $loop->iteration }}. {{ $lanche->nome }}</h2>
                                            <h2 class="preco_lanche">R$ {{ substr($lanche->preco, 0, -3) }}<sup>{{ substr($lanche->preco, -3) }}</sup></h2>
                                        </div>
                                        <div class="separador"></div>
                                        <h3 class="ingredientes_lanche">{{ $lanche->ingredientes }}</h3>
                                    </div>
                                    {{--MODAL--}}
                                    <div class="modal fade" id="lanche-{{ $lanche->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        Editar {{ $lanche->nome }}
                                                    </h4>
                                                </div>
                                                <!-- Modal Body -->
                                                <form class="form-horizontal" role="form" method="POST" action="/lanche/{{ $lanche->id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                {{ method_field('PATCH') }}
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Nome</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="nome" value="{{ $lanche->nome }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Preço</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="preco" value="{{ $lanche->preco }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Ingredientes</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="ingredientes" value="{{ $lanche->ingredientes }}"/>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Fechar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Salvar
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{--/MODAL--}}
                                    @if($loop->iteration % 2 == 0)
                                </div>
                            @endif
                            @if($loop->last)
                                @if($loop->iteration % 2 == 0)
                                    <div class="grid-16 grupo">
                                        @endif
                                        <div class="grid-7 {{ ($loop->iteration % 2) ? 'direita' : 'esquerda' }}">
                                            <a href="#" data-toggle="modal" data-target="#novolanche-{{ $categoria->id }}">
                                                <div class="admin">
                                                    <i class="fa fa-plus-circle"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @empty
                                    <div class="grid-16 grupo">
                                        <div class="grid-7 esquerda">
                                            <a href="#" data-toggle="modal" data-target="#novolanche-{{ $categoria->id }}">
                                                <div class="admin">
                                                    <i class="fa fa-plus-circle"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforelse
                                    {{--MODAL--}}
                                    <div class="modal fade" id="novolanche-{{ $categoria->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        Novo Lanche
                                                    </h4>
                                                </div>
                                                <!-- Modal Body -->
                                                <form class="form-horizontal" role="form" action="/lanche/{{ $categoria->id }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Categoria:</label>
                                                            <label  class="col-sm-2 control-label">{{ $categoria->nome }}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Nome</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="nome" value=""/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Preço</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="preco" value=""/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-sm-2 control-label">Ingredientes</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="ingredientes" value=""/>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Fechar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Salvar
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{--/MODAL--}}
                    </div>
        </section>
    @endforeach
    <a href="#">
        <div class="admin">
            <i class="fa fa-plus-circle"></i>
        </div>
    </a>
@stop