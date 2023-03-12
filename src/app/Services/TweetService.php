<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function getTweets()
    {
        return Tweet::all()->sortByDesc('created_at');
    }

    public function checkOwnTweet(int $requestUserId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }

        return $tweet->user_id === $requestUserId;
    }
}
