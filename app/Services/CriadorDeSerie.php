<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{

    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $qtd_episodios)
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($qtd_temporadas, $qtd_episodios, $serie);
        DB::commit();
        return $serie;
    }

    private function criaTemporadas(int $qtd_temporadas, int $qtd_episodios, Serie $serie)
    {
        for ($i = 1; $i <=$qtd_temporadas ; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($temporada, $qtd_episodios);
        }
    }

    private function criaEpisodios(Temporada $temporada, int $qtd_episodios)
    {
        for ($j = 1; $j <= $qtd_episodios ; $j++) { 
            $temporada->episodios()->create(['numero' => $j]);
        }
    }

}