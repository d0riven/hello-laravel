<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
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
        // 色々なviewの展開の仕方がある
//        return view('tweet.index', ['name' => 'laravel']);
//        return View::make('tweet.index', ['name' => 'laravel']);
//        return $factory->make('tweet.index', ['name' => 'laravel']);
        $tweets = Tweet::all();
        return view('tweet.index')->with('tweets', $tweets);
    }
}
