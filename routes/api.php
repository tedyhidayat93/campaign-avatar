<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignFolderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\PromptController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('campaign-folders', CampaignFolderController::class);
Route::apiResource('campaigns', CampaignController::class);
