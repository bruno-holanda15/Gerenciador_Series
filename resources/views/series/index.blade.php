@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

        <div hidden id="inputEdicao{{ $serie->id }}">
            <input class="" type="text"  value="{{ $serie->nome }}" name="" >
            
            <button href="" class="btn btn-warning btn-sm mr-2" onclick="editarSerie({{ $serie->id }})">
                <i class="fas fa-check" aria-hidden="true"></i>
            </button>
            @csrf    
        </div>

        <div class="d-flex justify-content">

            <button href="" class="btn btn-info btn-sm mr-2" onclick="toggle({{ $serie->id }})">
                    <i class="fa fa-address-card"></i>
            </button>
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-success btn-sm mr-2">
                <i class="fa fa-film" aria-hidden="true"></i>
            </a>
            <form method="post" action="/series/{{ $serie->id }}"
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
<script>

function toggle(serieId){

   var inputNome = document.getElementById(`inputEdicao${serieId}`);
   var nomeSpan = document.getElementById(`nome-serie-${serieId}`);

    if(inputNome.hasAttribute('hidden')){
        inputNome.removeAttribute('hidden');
        nomeSpan.hidden = true;
    }else{
        nomeSpan.removeAttribute('hidden');
        inputNome.hidden = true;
    }

}

function editarSerie(serieId){
    let formData = new FormData();
    var nome = document.querySelector(`#inputEdicao${serieId} > input`).value;
    var token = document.querySelector(`input[name="_token"]`).value;
    formData.append('nome', nome);
    formData.append('_token', token);

    const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggle(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });

}

</script>
@endsection