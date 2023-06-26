<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CorsMiddleware;

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
app('router')->middleware([CorsMiddleware::class]);

Route::post('/booking', [TrainController::class,'book']);
Route::post('/cancel', [TrainController::class,'cancel']);
Route::get('/trainlist', function () {
    $trainList = DB::table('trainlist')->get();
    return response()->json($trainList);
});
Route::get('/trainstatus', function () {
    $trainList = DB::table('train_status')->get();
    return response()->json($trainList);
});
Route::get('/passenger', function () {
    $trainList = DB::table('passenger')->get();
    return response()->json($trainList);
});
Route::get('/generate_report', function () {
    $acList =DB::select('CALL ac_passenger_count()', [
    ]);
    $genList =DB::select('CALL general_passenger_count()', [
    ]);
    return response()->json(['AC'=>$acList,'GEN'=>$genList]);
});
Route::get('/xml', function () {
    $trainList = DB::table('xmldm')->get();
    return response()->json($trainList);
});