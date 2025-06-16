<?php

namespace App\Http\Controllers;

use App\Services\IBGEService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class IBGEController extends Controller
{
    public function __construct(private IBGEService $ibgeService) {}

    public function states(): JsonResponse
    {
        $states = $this->ibgeService->getStates();

        return response()->json($states, Response::HTTP_OK);
    }

    public function cities(string $uf): JsonResponse
    {
        $cities = $this->ibgeService->getCitiesByState($uf);

        return response()->json($cities, Response::HTTP_OK);
    }
}
