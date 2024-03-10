<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Request;

Router::get('/', 'HomeController@index', ['as' => 'home']);

Router::group( [ 'prefix' => '/auth' ], function () {
    Router::get('/signin', 'AuthController@signin', ['as' => 'auth.signin']);
    Router::post('/signin', 'AuthController@handleSignin');
});

Router::group( [ 'prefix' => '/reservations' ], function () {
    Router::get('/', 'ReservationController@index', ['as' => 'reservations']);
    Router::get('/toggle', 'ReservationController@toggle', ['as' => 'reservation.toggle']);
});

Router::error(function(Request $request, \Exception $exception) {
    switch($exception->getCode()) {
        // Page not found
        case 404:
            die('گشتم نبود، نگرد نیست');
        // Forbidden
        case 403:
            die('شرمنده، شما دسترسی ندارید');
        // Unauthorized
        case 401:
            response()->redirect(url('auth.signin'));
    }
});