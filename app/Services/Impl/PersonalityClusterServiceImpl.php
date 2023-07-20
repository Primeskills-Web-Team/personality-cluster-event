<?php

namespace App\Services\Impl;

use App\Http\Requests\StoreUserDataPersonalityRequest;
use App\Models\Question;
use App\Models\User;
use App\Services\PersonalityCluster;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
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
            DB::beginTransaction();
            $user = new User();
            $user->name = $storeUserDataPersonalityRequest->name;
            $user->email = $storeUserDataPersonalityRequest->email;
            $user->gender = $storeUserDataPersonalityRequest->gender;
            $user->personality = $storeUserDataPersonalityRequest->personality;
            $user->save();

            foreach ($storeUserDataPersonalityRequest->scores as $score) {
                $scoreUser = new Question();
                $scoreUser->user_id = $user->id;
                $scoreUser->question_id = $score->question_id;
                $scoreUser->score = $score->score;
                $scoreUser->save();
            }

            DB::commit();

            return Response::builder()
                ->setCode(201)
                ->buildJson();
        } catch (Exception $exception) {
            throw new PrimeskillsException(500, $exception->getMessage());
        }
    }

    function statisticDataAll(): JsonResponse
    {
        $queryPersonality = "select upper(u.personality) as personal , count(*) as total from users u group by personal";
        $queryGender = "select upper(u.gender) as gen , count(*) as total from users u group by gen";

        $data = DB::select($queryPersonality);
        $dataGender = DB::select($queryGender);

        $personality = [];
        foreach ($data as $dt) {
            $personality[] = [
                "personality" => $dt->personal,
                "total" => $dt->total ?? 0,
            ];
        }

        $gender = [
            "male" => 0,
            "female" => 0
        ];
        foreach ($dataGender as $dt) {
            if ($dt->gen == 'MALE') {
                $gender['male'] += $dt->total;
            }

            if ($dt->gen == 'FEMALE') {
                $gender['female'] += $dt->total;
            }
        }

        return Response::builder()
            ->setData([
                "gender" => $gender,
                "personality" => $personality
            ])->buildJson();
    }

    function statisticDataAllView(): View
    {
        return view("welcome", $this->statisticDataAll()->getData(true));
    }

    function getAllQuestion(): JsonResponse
    {
        $question = Question::select('id','question', 'question_type', 'style')->get();
        return Response::builder()
            ->setData($question)->buildJson();
    }
}
