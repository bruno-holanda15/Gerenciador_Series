<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function listaTemporadas(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;
        return view('temporadas.index',[
            'serie' => $serie, 
            'temporadas' => $temporadas
        ]);
    }
}
