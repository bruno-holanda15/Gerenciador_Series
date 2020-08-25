@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
<form method="post">
    @csrf
    <div class="row">
        <div class="col col-6">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="col col-3">
            <label for="qtd_temporadas" class="">Quantidade de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" required>
        </div>
        <div class="col col-3">
            <label for="qtd_episodios" class="">Quantidade de episodios</label>
            <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios" required>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Adicionar</button>
</form>
@endsection