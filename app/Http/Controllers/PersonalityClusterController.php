<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use App\Services\PersonalityCluster;
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

}
