<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ServiceListingController;
use App\Http\Controllers\API\ServiceRequestController;
// use App\Http\Resources\Services;
// use App\Http\Resources\ServiceListing;
use App\Models\service_listing;
use App\Models\Services;



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

Route::prefix('/user')->name('user.')->namespace('User')->group(function(){
  //All the user routes will be defined here...

  Route::get('/', [App\Http\Controllers\API\PassportAuthController::class, 'index']);

  Route::post('login', [App\Http\Controllers\API\PassportAuthController::class, 'login']);
  Route::post('register', [App\Http\Controllers\API\PassportAuthController::class, 'register']);
  Route::post('dashboard', [App\Http\Controllers\API\PassportAuthController::class, 'dashboard']);

  Route::get('services', [App\Http\Controllers\API\ServiceController::class, 'index']);
  Route::get('services/add', [App\Http\Controllers\API\ServiceController::class, 'store']);
  Route::get('service-listing', [App\Http\Controllers\API\ServiceListingController::class, 'index']);

  Route::post('service-request', [App\Http\Controllers\API\ServiceRequestController::class, 'store']);
  Route::post('emergency', [App\Http\Controllers\API\ServiceRequestController::class, 'emergencyRequest']);


Route::get('service-listing/{category}', function (Request $request) {
   $category= $request->input('category');

        $service_listing = service_listing::select('*')
            ->join('services', 'service_listings.category', '=', 'services.category')
            ->select('service_listings.*', 'services.category')
            ->where('services.category',$category)
            ->get();
        // $service_listing = service_listing::all();

        return $service_listing;



    });


});




Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
  //All the admin routes will be defined here...
});

Route::prefix('/volunteer')->name('volunteer.')->namespace('Volunteer')->group(function(){
  //All the volunteer routes will be defined here...
});

Route::group(['prefix' => 'user'],function(){


    //unauthenticated routes for user here

    Route::group( ['middleware' => ['auth:user','scope:user'] ],function(){
           // authenticated user routes here

        });
    });









Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', [App\Http\Controllers\API\PassportAuthController::class, 'userInfo']);

Route::group(['prefix' => 'volunteer'],function(){


    //unauthenticated routes for customers here

    Route::group( ['middleware' => ['auth:volunteer','scope:volunteer'] ],function(){
           // authenticated volunteer routes here

        });
    });

Route::apiResource('Services', App\Http\Controllers\API\ServiceController::class);
Route::apiResource('service-listing',App\Http\Controllers\API\ ServiceListingController::class);


