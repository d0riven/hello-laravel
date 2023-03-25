<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Tweet;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TweetService
{
    public function getTweets()
    {
        return Tweet::with('images')->orderByDesc('created_at')->get();
    }

    public function checkOwnTweet(int $requestUserId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }

        return $tweet->user_id === $requestUserId;
    }

    /**
     * @param File[] $images
     */
    public function saveTweet(int $userId, string $content, array $images)
    {
        DB::transaction(function () use ($userId, $content, $images) {
            $tweet = new Tweet;
            $tweet->fill([
                'user_id' => $userId,
                'content' => $content,
            ]);
            $tweet->save();
            foreach ($images as $image) {
                Storage::putFile('public/images', $image);
                $imageModel = new Image();
                $imageModel->fill([
                    'name' => $image->hashName(),
                ]);
                $imageModel->save();
                $tweet->images()->attach($imageModel->id);
            }
        });
    }

    public function deleteTweet(int $tweetId)
    {
        DB::transaction(function () use ($tweetId) {
            $tweet = Tweet::where('id', $tweetId)->firstOrFail();
            $tweet->images()->each(function ($image) use ($tweet) {
                $filePath = 'public/images/' . $image->name;
                if(Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
                $tweet->images()->detach($image->id);
                $image->delete();
            });

            $tweet->delete();
//            Tweet::destroy($tweetId);
        });
    }
}
