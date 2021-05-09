<?php

use Sandbox\Restapi\Http\Controllers\HelloController;
use Sandbox\Restapi\Http\Middleware\ExceptionsMiddleware;

Route::group([
    'prefix'     => 'api',
    'middleware' => [
        ExceptionsMiddleware::class
    ]
], function () {

    Route::get('hello/{name}', [HelloController::class, 'greet']);

    Route::get('/exception', function () {
        throw new ValidationException([
            'something' => 'wrong',
            'mode'      => 'error',
        ]);
    });

});
