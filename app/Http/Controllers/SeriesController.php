<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request, CriadorDeSerie $criadorSerie)
    {
        $serie = $criadorSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome} criada com sucesso "
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorSerie $removedorSerie)
    {
        $nomeSerie = $removedorSerie->removerSerie($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function editaNome(int $serieId, Request $request )
    {
        $serie = Serie::find($serieId);
        $serie->nome = $request->nome;
        $serie->save();
    }
}
