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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width:"100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <th>{{$fornecedor->nome}}</th>
                                <th>{{$fornecedor->site}}</th>
                                <th>{{$fornecedor->uf}}</th>
                                <th>{{$fornecedor->email}}</th>
                                <th><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></th>
                                <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $fornecedores->appends($request)->links() }}

                <!--
                <br>
                {{ $fornecedores->count() }} - Total de registro(s) por paáina.
                <br>
                {{ $fornecedores->total() }} - Total de registros da consulta.
                <br>
                {{ $fornecedores->firstItem() }} - Numero do primeiro registro da página.
                <br>
                {{ $fornecedores->lastItem() }} - Numero do ultimo registro da página.
                -->
                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} de ({{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
            </div>
        </div>
    </div>
@endsection