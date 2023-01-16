<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Http\Controllers\FrontEndController;


Route::model('users', 'App\User');

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(array('prefix' => 'admin'), function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return View('admin/404');
    });
    Route::get('500', function () {
        return View::make('admin/500');
    });

    # Lock screen
    Route::get('lockscreen', function () {
        return View::make('admin/lockscreen');
    });

    # All basic routes defined here
    Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
    Route::post('signin', 'AuthController@postSignin');
    Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
    Route::post('forgot-password', array('as' => 'admin-forgot-password', 'uses' => 'AuthController@postForgotPassword'));
    Route::get('login2', function () {
        return View::make('admin/login2');
    });

    # Register2
    Route::get('register2', function () {
        return View::make('admin/register2');
    });
    Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'admin-forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

    # Logout
    Route::get('logout', array('as' => 'admin-logout', 'uses' => 'AuthController@getLogout'));

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', array('as' => 'admin-activate', 'uses' => 'AuthController@getActivate'));
});

Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelAdmin'), function () {
    # Dashboard / Index
    Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));


    Route::resource('districts', 'DistrictsController');
        Route::get('districts/{id}/delete', array('as' => 'admin.districts.delete', 'uses' => 'DistrictsController@getDelete'));
        Route::get('districts/{id}/confirm-delete', array('as' => 'admin.districts.confirm-delete', 'uses' => 'DistrictsController@getModalDelete'));


    Route::resource('regions', 'RegionsController');
        Route::get('regions/{id}/delete', array('as' => 'admin.regions.delete', 'uses' => 'RegionsController@getDelete'));
        Route::get('regions/{id}/confirm-delete', array('as' => 'admin.regions.confirm-delete', 'uses' => 'RegionsController@getModalDelete'));


    Route::resource('mfi_products', 'Mfi_productsController');
        Route::get('mfi_products/{id}/delete', array('as' => 'admin.mfi_products.delete', 'uses' => 'Mfi_productsController@getDelete'));
        Route::get('mfi_products/{id}/confirm-delete', array('as' => 'admin.mfi_products.confirm-delete', 'uses' => 'Mfi_productsController@getModalDelete'));


    Route::resource('mfis', 'MfisController');
        Route::get('mfis/{id}/delete', array('as' => 'admin.mfis.delete', 'uses' => 'MfisController@getDelete'));
        Route::get('mfis/{id}/confirm-delete', array('as' => 'admin.mfis.confirm-delete', 'uses' => 'MfisController@getModalDelete'));


    Route::resource('loan_details', 'Loan_detailsController');
        Route::get('loan_details/{id}/delete', array('as' => 'admin.loan_details.delete', 'uses' => 'Loan_detailsController@getDelete'));
        Route::get('loan_details/{id}/confirm-delete', array('as' => 'admin.loan_details.confirm-delete', 'uses' => 'Loan_detailsController@getModalDelete'));


    Route::resource('service_types', 'Service_typesController');
        Route::get('service_types/{id}/delete', array('as' => 'admin.service_types.delete', 'uses' => 'Service_typesController@getDelete'));
        Route::get('service_types/{id}/confirm-delete', array('as' => 'admin.service_types.confirm-delete', 'uses' => 'Service_typesController@getModalDelete'));


    Route::resource('services', 'ServicesController');
        Route::get('services/{id}/delete', array('as' => 'admin.services.delete', 'uses' => 'ServicesController@getDelete'));
        Route::get('services/{id}/confirm-delete', array('as' => 'admin.services.confirm-delete', 'uses' => 'ServicesController@getModalDelete'));


    Route::resource('business_types', 'Business_typesController');
        Route::get('business_types/{id}/delete', array('as' => 'admin.business_types.delete', 'uses' => 'Business_typesController@getDelete'));
        Route::get('business_types/{id}/confirm-delete', array('as' => 'admin.business_types.confirm-delete', 'uses' => 'Business_typesController@getModalDelete'));


    Route::resource('product_cats', 'Product_catsController');
        Route::get('product_cats/{id}/delete', array('as' => 'admin.product_cats.delete', 'uses' => 'Product_catsController@getDelete'));
        Route::get('product_cats/{id}/confirm-delete', array('as' => 'admin.product_cats.confirm-delete', 'uses' => 'Product_catsController@getModalDelete'));


    Route::resource('products', 'ProductsController');
        Route::get('products/{id}/delete', array('as' => 'admin.products.delete', 'uses' => 'ProductsController@getDelete'));
        Route::get('products/{id}/confirm-delete', array('as' => 'admin.products.confirm-delete', 'uses' => 'ProductsController@getModalDelete'));


    Route::resource('members', 'MembersController');
        Route::get('members/{id}/delete', array('as' => 'admin.members.delete', 'uses' => 'MembersController@getDelete'));
        Route::get('members/{id}/confirm-delete', array('as' => 'admin.members.confirm-delete', 'uses' => 'MembersController@getModalDelete'));


    
    Route::resource('feedback', 'FeedbackController');
        Route::get('feedback/{id}/delete', array('as' => 'admin.feedback.delete', 'uses' => 'FeedbackController@getDelete'));
        Route::get('feedback/{id}/confirm-delete', array('as' => 'admin.feedback.confirm-delete', 'uses' => 'FeedbackController@getModalDelete'));


    Route::resource('transactions', 'TransactionsController');
        Route::get('transactions/{id}/delete', array('as' => 'admin.transactions.delete', 'uses' => 'TransactionsController@getDelete'));
        Route::get('transactions/{id}/confirm-delete', array('as' => 'admin.transactions.confirm-delete', 'uses' => 'TransactionsController@getModalDelete'));


    Route::resource('statuses', 'StatusesController');
        Route::get('statuses/{id}/delete', array('as' => 'admin.statuses.delete', 'uses' => 'StatusesController@getDelete'));
        Route::get('statuses/{id}/confirm-delete', array('as' => 'admin.statuses.confirm-delete', 'uses' => 'StatusesController@getModalDelete'));


    Route::resource('order_items', 'Order_itemsController');
        Route::get('order_items/{id}/delete', array('as' => 'admin.order_items.delete', 'uses' => 'Order_itemsController@getDelete'));
        Route::get('order_items/{id}/confirm-delete', array('as' => 'admin.order_items.confirm-delete', 'uses' => 'Order_itemsController@getModalDelete'));


    Route::resource('orders', 'OrdersController');
        Route::get('orders/{id}/delete', array('as' => 'admin.orders.delete', 'uses' => 'OrdersController@getDelete'));
        Route::get('orders/{id}/confirm-delete', array('as' => 'admin.orders.confirm-delete', 'uses' => 'OrdersController@getModalDelete'));

    Route::resource('expenses', 'ExpensesController');
        Route::get('expenses/{id}/delete', array('as' => 'admin.expenses.delete', 'uses' => 'ExpensesController@getDelete'));
        Route::get('expenses/{id}/confirm-delete', array('as' => 'admin.expenses.confirm-delete', 'uses' => 'ExpensesController@getModalDelete'));




    # User Management
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
        Route::get('create', 'UsersController@create');
        Route::post('create', 'UsersController@store');
        Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@destroy'));
        Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
        Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
        //Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
        Route::post('passwordreset', 'UsersController@passwordreset');
    });
    Route::resource('users', 'UsersController');

    Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

    # Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@index'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@create'));
        Route::post('create', 'GroupsController@store');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@edit'));
        Route::post('{groupId}/edit', 'GroupsController@update');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@destroy'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
    });
    
    /*routes for file*/
    Route::group(array('prefix' => 'file'), function () {
        Route::post('create', 'FileController@store');
        Route::post('createmulti', 'FileController@postFilesCreate');
        Route::delete('delete', 'FileController@delete');
    });

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });
    Route::post('crop_demo','JoshController@crop_demo');

    /* laravel example routes */
    # datatables
    Route::get('datatables', 'DataTablesController@index');
    Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

    # Remaining pages will be called from below controller method
    # in real world scenario, you may be required to define all routes manually

    Route::get('{name?}', 'JoshController@showView');

});

#FrontEndController
Route::get('login', array('as' => 'login','uses' => 'FrontEndController@getLogin'));
Route::post('login','FrontEndController@postLogin');
Route::get('/', [FrontEndController::class, 'getRegister'])->name('register');
Route::post('/',[FrontEndController::class, 'postRegister']);
Route::get('activate/{userId}/{activationCode}',array('as' =>'activate','uses'=>'FrontEndController@getActivate'));
Route::get('forgot-password',array('as' => 'forgot-password','uses' => 'FrontEndController@getForgotPassword'));
Route::post('forgot-password','FrontEndController@postForgotPassword');
# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
# My account display and update details
Route::group(array('middleware' => 'SentinelAdmin'), function () {
    Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
    Route::put('my-account', 'FrontEndController@update');
});

Route::get('getdistricts', array('as'=> 'getdistricts', 'uses'=> 'FrontEndController@getDistricts'));

Route::get('products', array('as'=>'getproducts', 'uses'=>'ProductsController@public_index'));

Route::get('services', array('as'=>'getservices', 'uses'=>'ServicesController@public_services'));

Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));
# contact form
Route::post('contact',array('as' => 'contact','uses' => 'FrontEndController@postContact'));

Route::get('user_home', ['as' => 'user_home', function(){
    return View::make('user_home');
}]);

Route::get('loans_home', ['as' => 'loans_home', function(){
    return View::make('loans_home');
}]);


Route::get('crdb_loan_form', array('as'=> 'crdb_loan_form', 'uses'=> 'FrontEndController@loan_form'));

Route::get('akiba_loan_form', array('as'=> 'akiba_loan_form', 'uses'=> 'FrontEndController@loan_form'));

Route::get('mfi_loan_form', array('as'=> 'mfi_loan_form', 'uses'=> 'FrontEndController@mfi_loan_form'));

Route::get('member_report/{id}', array('as'=> 'member_report', 'uses'=> 'MembersController@member_report'));


#frontend views
/*Route::get('/', array('as' => 'home', function () {
    return View::make('index');
}));*/

Route::get('{name?}', 'JoshController@showFrontEndView');
# End of frontend views
/*

    spacer

*/


