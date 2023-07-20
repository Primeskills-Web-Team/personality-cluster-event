<?php

namespace App\Services\Impl;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use App\Models\User;
use App\Services\PersonalityCluster;
use Exception;
use Illuminate\Http\JsonResponse;
use Primeskills\Web\Exceptions\PrimeskillsException;
use Primeskills\Web\Response\Response;

class PersonalityClusterServiceImpl implements PersonalityCluster
{
    /**
     * @param StoreUserDataPersonalityRequest $storeUserDataPersonalityRequest
     * @return JsonResponse
     */
    function saveDataUser(StoreUserDataPersonalityRequest $storeUserDataPersonalityRequest): JsonResponse
    {
        try {
            $user = new User();
            $user->name = $storeUserDataPersonalityRequest->name;
            $user->email = $storeUserDataPersonalityRequest->email;
            $user->gender = $storeUserDataPersonalityRequest->gender;
            $user->personality = $storeUserDataPersonalityRequest->personality;
            $user->save();

            return Response::builder()
                ->setCode(201)
                ->buildJson();
        } catch (Exception $exception) {
            throw new PrimeskillsException(500, $exception->getMessage());
        }
    }
}
