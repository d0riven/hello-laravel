<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    public function __construct(private readonly TweetService $service)
    {
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!$this->service->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }
        $this->service->deleteTweet($tweetId);
        return redirect()->route('tweet.index')
            ->with('feedback.success', 'つぶやきを削除しました');
    }
}
