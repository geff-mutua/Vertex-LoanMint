<?php

use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Http\Resources\BorrowersList;
use Illuminate\Support\Facades\Route;

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

Route::get('data',function(){
   return BorrowersList::collection(
        Borrower::all()
    );
    // return json_encode(['data'=>[
    //     "id"=> 1,
    //   "avatar"=> "10.png",
    //   "full_name"=> "Korrie O'Crevy",
    //   "post"=> "Nuclear Power Engineer",
    //   "email"=> "kocrevy0@thetimes.co.uk",
    //   "city"=> "Krasnosilka",
    //   "start_date"=> "09/23/2021",
    //   "salary"=> "$23896.35",
    //   "age"=> "61",
    //   "experience"=> "1 Year",
    //   "status"=> 2
    // ]]);
});
