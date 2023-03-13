<?php

namespace App\View\Components\Tweet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Options extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private readonly int $tweetId,
        private readonly int $userId,
    ){
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tweet.options')
            ->with('tweetId', $this->tweetId)
            ->with('myTweet', Auth::id() === $this->userId);
    }
}
