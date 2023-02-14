<?php

use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Http\Resources\BorrowersList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MPESAResponseController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


#Get the mpesa confirmation endpoint here
Route::group(['prefix' => 'v1/vtx/merchant/lms/202211/notify'], function () {
    Route::post('validation',[MPESAResponseController::class,'validation']);
    Route::post('confirmation',[MPESAResponseController::class,'confirmation']);
});