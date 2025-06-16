<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IBGEService
{

    public function getStates(): array
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        return $response->json();
    }

    public function getCitiesByState(string $uf): array
    {
        $response = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$uf}/municipios");
        return $response->json();
    }
}
