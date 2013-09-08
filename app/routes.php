<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',
    function () {
        return View::make('hello');
    });

Route::group(array('prefix' => 'shop'),
    function () {
        Route::get('create', array('uses' => 'ShopController@Create'));
    }
);

Route::group(array('prefix' => 'coupon'),
    function () {
        Route::get('create', array('uses' => 'CouponController@Create'));
        Route::get('use', array('uses' => 'CouponController@UseCoupon'));
        Route::get('stat/{filter}', array('uses' => 'CouponController@Stat'));
    }
);


Route::get('graph', function(){
    return Response::view('graph');
});