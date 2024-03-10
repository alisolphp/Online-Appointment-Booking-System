<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Request;
use Pecee\Http\Url;
use Pecee\Http\Response;

$appUrlWithoutDomain = explode(appDomain(), appUrl())[1];

Router::setDefaultNamespace('\App\Controllers');

Router::group( [ 'prefix' => $appUrlWithoutDomain ], function () {
    require_once __DIR__ . '/web.php';
});

Router::start();