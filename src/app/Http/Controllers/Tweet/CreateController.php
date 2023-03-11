<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request): RedirectResponse
    {
        $tweet = new Tweet;
        $tweet->fill($request->toArray());
        $tweet->save();
        return redirect()->route('tweet.index');
    }
}
