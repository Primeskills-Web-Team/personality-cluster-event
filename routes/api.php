<?php

use App\Http\Controllers\PersonalityClusterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Primeskills\Web\Response\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/", function () {
    return Response::builder()
        ->version()
        ->buildJson();
});

Route::post("/personality-cluster", [PersonalityClusterController::class, 'store'])->name('personality-user-store');
Route::get("/personality-cluster/statistic", [PersonalityClusterController::class, 'statisticAllData'])->name('personality-user-statistic');
Route::get("/personality-cluster/questions", [PersonalityClusterController::class, 'questions'])->name('personality-user-question');
Route::get("/personality-cluster/statistic/view", [PersonalityClusterController::class, 'statisticAllDataView'])->name('personality-user-statistic-view');
