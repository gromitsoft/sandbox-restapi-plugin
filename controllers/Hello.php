<?php

namespace Sandbox\Restapi\Controllers;

use Backend\Classes\Controller;
use October\Rain\Exception\ValidationException;

class Hello extends Controller
{
    public function index()
    {
        throw new ValidationException([
            'something' => 'wrong',
            'mode'      => 'error',
        ]);
    }
}