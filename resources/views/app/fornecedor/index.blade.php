<h3> Fornecedor </h3>

@php
/*
    if() {
    } elseif() {
    } else {
    }
*/
@endphp
Fornecedor: {{$fornecedores[0]['nome']}}
</br>
Status: {{$fornecedores[0]['status']}}
</br>

@if(!($fornecedores[0]['status']== 'S'))
   Fornecedor Inativo
@endif    
</br>
@unless($fornecedores[0]['status']== 'S')<!-- Verifica se o retorno é verdadeiro de modo inverso ao if -->
    Fornecedor Inativo
@endunless