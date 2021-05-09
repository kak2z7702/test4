<?php

namespace App\Http\Controllers;

use App\Http\Requests\My\NameRequest;

class Test1Controller extends Controller
{
    public function get1(NameRequest $request): string
    {
        $name = $request->input('name');
        return 'hello '. $name;
    }
}
