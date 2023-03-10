<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function show()
    {
        return 'Hello';
    }

    public function showId($id) {
        return "Hello {$id}";
    }
}
