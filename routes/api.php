<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyGuestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\ApartmentInfoController;
use App\Http\Controllers\SpaceController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    
    Route::group(['prefix'=>'user'],function(){
        // login
        Route::post('login',[UserController::class,'login']);
        // register
        Route::post('register',[UserController::class,'register']);

        
    });
    

    Route::middleware('auth:api')->group(function(){
        Route::group(['prefix'=>'user'],function(){
            Route::put('{id}/registrationstep',[UserController::class,'registrationStep']);
        });


        Route::group(['prefix'=>'apartment'],function(){
            
            //property types
            Route::group(["prefix"=>'property'],function(){

                // create property type
                Route::post("type",[PropertyTypeController::class,'create']);

                // update property type
                Route::put("type/{id}",[PropertyTypeController::class,'update']);

                // get property type
                Route::get("type/{id}",[PropertyTypeController::class,'get']);

                // all property types
                Route::get("type",[PropertyTypeController::class,'all']);

                // create property guest
                Route::post("guest",[PropertyGuestController::class,'create']);

                // update property guest
                Route::put("guest/{id}",[PropertyGuestController::class,'update']);

                // get property guest
                Route::get("guest/{id}",[PropertyGuestController::class,'get']);

                // all property types
                Route::get("guest",[PropertyGuestController::class,'all']);

                // spaces
                // create space
                Route::post("space",[SpaceController::class,'create']);

                // update property guest
                Route::put("space/{id}",[SpaceController::class,'update']);

                // get property guest
                Route::get("space/{id}",[SpaceController::class,'get']);

                // all property types
                Route::get("space",[SpaceController::class,'all']);

                // media
                // create media
                Route::post("media",[MediaController::class,'create']);

                // update media
                Route::put("media/{id}",[MediaController::class,'update']);

                // get media
                Route::get("media/{id}",[MediaController::class,'get']);

                // all media
                Route::get("media",[MediaController::class,'all']);

                // ammenities
                // create ammenities
                Route::post("amenities",[AmenityController::class,'create']);

                // update amenities
                Route::put("amenities/{id}",[AmenityController::class,'update']);

                // get amenities
                Route::get("amenities/{id}",[AmenityController::class,'get']);

                // all amenities
                Route::get("amenities",[AmenityController::class,'all']);

                

            });

            
            // apartment info
            // create apartment info
            Route::post("info",[ApartmentInfoController::class,'create']);

            // update apartment info
            Route::put("info/{id}",[ApartmentInfoController::class,'update']);

            // get apartment info
            Route::get("info/{id}",[ApartmentInfoController::class,'get']);

            // all apartment info
            Route::get("info",[ApartmentInfoController::class,'all']);
        });

        
    });
    
});

