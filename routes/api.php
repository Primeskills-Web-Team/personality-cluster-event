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
