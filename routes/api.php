<?php

use Illuminate\Http\Request;

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
 $GLOBALS['ok'] = 0;
 $GLOBALS['success'] = 100;
 $GLOBALS['unknown error'] = 1;
 $GLOBALS['no data'] = 2;
 $GLOBALS['server not found'] = 4;
 $GLOBALS['general server error'] = 5;
 $GLOBALS['request not understood'] = 6;
 $GLOBALS['no api node found'] = 7;
 $GLOBALS['request time-out'] = 8;
 $GLOBALS['invalid parameters'] = 9;
 $GLOBALS['too many requests'] = 11;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('v1/user_data/{acc_code?}/{promo_code?}/{activation_code?}', function($acc_code = null) {
    //return $query = DB::select(DB::raw('select sum(points)as point from point'));
    ///api/v1/user_data/524413/0255/4413
    $user = App\User::with([
        'point' => function($query){
            $query->select('id', 'points', 'type', 'user_id', 'alias', 'updated_at');
        }

        /*'group' => function($query){
            $query->select('id', 'group_code', 'name');
        }*/

    ])->where('user_code', '=', $acc_code)->get(['id', 'user_code', 'promo_code', 'activation_code', 'activation_date', 'activated', 'user_type']);

    if (count($user)) {    
    
        return Response::json(array(
            "resp_desc" => "success",
            "account_data" => $user[0]
        ));
    }else{
        return Response::json(array(
            "resp_desc" => "fail",
            "details" => "no user found"
        ));
    }
    
});

Route::get('v1/countries', function($id = null) {
    $countries = App\Country::whereNull('deleted_at')->get();
return Response::json($countries);
});

//get all feedback
Route::get('v1/feedback/{id?}', function($id = null) {

    $feedback = App\Feedback::with([
        'requester' => function($query){
                $query->select('id', 'first_name', 'last_name', 'pic');
            },
            'status' => function($query){
                $query->select('id', 'meaning');
            }
        ])
    ->where('request_id', '=', $id)
    ->whereNull('deleted_at')->get();

return Response::json($feedback);
});

/*=================POST APIs===============*/

Route::post('v1/add_user', 'UsersController@add');

Route::post('v1/update_activation', 'UsersController@update_activation');

Route::post('v1/upload_user_image', 'UsersController@upload_image');

Route::post('v1/user_activation', 'UsersController@user_activation');

//add new feedback
Route::post('v1/feedback', 'FeedbackController@add');

//add new members
Route::post('v1/add_member', 'MembersController@api_add');


Route::post('v1/new_expense', array('as'=>'api_new_expense', 'uses'=>'ExpensesController@new_expense'));

//table checksum
//Route::post('v1/checksum', 'CompaniesController@checksum_table');