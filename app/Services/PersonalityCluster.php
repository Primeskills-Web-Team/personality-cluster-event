<?php

namespace App\Services;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use Illuminate\Http\JsonResponse;

interface PersonalityCluster
{
    function saveDataUser(StoreUserDataPersonalityRequest $storeUserDataPersonalityRequest): JsonResponse;
}
