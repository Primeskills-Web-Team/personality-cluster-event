<?php

namespace App\Services;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

interface PersonalityCluster
{
    function saveDataUser(StoreUserDataPersonalityRequest $storeUserDataPersonalityRequest): JsonResponse;

    function statisticDataAll(): JsonResponse;

    function statisticDataAllView(): View;

    function getAllQuestion(): JsonResponse;
}
