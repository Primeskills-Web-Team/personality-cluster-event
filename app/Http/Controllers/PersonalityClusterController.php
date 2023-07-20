<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use App\Services\PersonalityCluster;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class PersonalityClusterController extends Controller
{
    /**
     * @var PersonalityCluster $personalityClusterService
     */
    private $personalityClusterService;

    /**
     * @param PersonalityCluster $personalityClusterService
     */
    public function __construct(PersonalityCluster $personalityClusterService)
    {
        $this->personalityClusterService = $personalityClusterService;
    }

    public function store(StoreUserDataPersonalityRequest $storeUserDataPersonalityRequest): JsonResponse
    {
        return $this->personalityClusterService->saveDataUser($storeUserDataPersonalityRequest);
    }

    public function statisticAllData(): JsonResponse
    {
        return $this->personalityClusterService->statisticDataAll();
    }

    public function statisticAllDataView(): View
    {
        return $this->personalityClusterService->statisticDataAllView();
    }
    public function questions(): JsonResponse
    {
        return $this->personalityClusterService->getAllQuestion();
    }

}
