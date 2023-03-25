<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService): RedirectResponse
    {
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images(),
        );
        $tweet = new Tweet;
        $tweet->fill($request->toArray());
        $tweet->save();
        return redirect()->route('tweet.index');
    }
}
