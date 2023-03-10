<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Factory $factory)
    {
//        return view('tweet.index', ['name' => 'laravel']);
//        return View::make('tweet.index', ['name' => 'laravel']);
//        return $factory->make('tweet.index', ['name' => 'laravel']);
        return view('tweet.index')->with('name', 'laravel');
    }
}
