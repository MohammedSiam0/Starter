<?php

use Illuminate\Support\Facades\Route;


// علشان نقدر نصل لهاى الراوت ونصل للملف هذا لازم نربطه في الApp\Providers\RouteServiceProvider

Route::get('/admin', function () {
    return 'welcome: admin';
});

