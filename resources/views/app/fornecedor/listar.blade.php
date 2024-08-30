@extends('app.layout.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a>
            </ul>
        </div>
        <div class="informacao-pagina"> 
            <div style="widht: 30%; margin-left: auto; margin-right: auto;">
                ...Listar...
            </div>
        </div>
    </div>
@endsection