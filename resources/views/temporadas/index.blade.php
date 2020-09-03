@extends('layout')

@section('cabecalho')
Série {{ $serie->nome}}
@endsection

@section('conteudo')

<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">
         <a href="https://google.com"> Temporada {{ $temporada->numero }} </a>      
    </li>
    @endforeach
</ul>
@endsection