<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\BandController;
use App\Http\Controllers\Api\StageController;
use App\Http\Controllers\Api\FaqController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
  Route::get('user', [UserController::class, 'find']);

  // Images
  Route::get('images', [ImageController::class, 'get']);
  Route::post('images/order', [ImageController::class, 'order']);
  Route::get('image/{image}', [ImageController::class, 'find']);
  Route::post('image/upload', [ImageController::class, 'upload']);
  Route::post('image', [ImageController::class, 'store']);
  Route::put('image/coords/{image}', [ImageController::class, 'coords']);
  Route::put('image/{image}', [ImageController::class, 'update']);
  Route::get('image/state/{image}', [ImageController::class, 'toggle']);
  Route::delete('image/{image}', [ImageController::class, 'destroy']);

  // Stages
  Route::get('stages', [StageController::class, 'get']);

  // Band
  Route::get('bands/{constraint?}', [BandController::class, 'get']);
  Route::get('band/{band}', [BandController::class, 'find']);
  Route::post('band', [BandController::class, 'store']);
  Route::put('band/{band}', [BandController::class, 'update']);
  Route::get('band/state/{band}', [BandController::class, 'toggle']);
  Route::post('bands/order', [BandController::class, 'order']);
  Route::delete('band/{band}', [BandController::class, 'destroy']);

  // Faq
  Route::get('faqs', [FaqController::class, 'get']);
  Route::get('faq/{faq}', [FaqController::class, 'find']);
  Route::post('faq', [FaqController::class, 'store']);
  Route::put('faq/{faq}', [FaqController::class, 'update']);
  Route::get('faq/state/{faq}', [FaqController::class, 'toggle']);
  Route::delete('faq/{faq}', [FaqController::class, 'destroy']);

});



