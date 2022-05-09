<?php

namespace App\Exceptions;

use Exception;

class MicrowaveNotFoundException extends Exception
{
    function report() {}

    function render() {
        return view('errors.microwave-not-found');
    }
}
