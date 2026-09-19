<?php

use Illuminate\Support\Facades\Route;



Route::get('/feed', function () {
    $feedItems = json_decode(json_encode([
        [
            'postedDateTime' => '3h',
            'content' => <<<str
            <p>I made this! <a href="#">#myartwork</a> <a href="">#pixl</a></p>
                <img src="/public/images/simon-chilling.png" alt="">
            str,
            'likeCount' => 23,
            'replyCount' => 45,
            'repostCount' => 151,
            'profile' => [
                'avatar' => '/images/michael.png',
                'displayName' => 'Michael',
                'handle' => '@mmich_jj',
            ],
            'replies' => [
                [
                    'content' => "<p>Lmao i'm buying this i don't even care</p>",
                    'postedDateTime' => '1h',
                    'likeCount' => 52,
                    'replyCount' => 12,
                    'repostCount' => 200,
                    'profile' => [
                        'avatar' => '/images/simon-chilling.png',
                        'displayName' => 'Simon',
                        'handle' => '@simonwswiss',
                    ]
                ]
            ],
        ],
    ]));
    return view('feed',compact('feedItems'));
});

Route::get('/profile', function () {
    $feedItems = json_decode(json_encode([
        [
            'postedDateTime' => '3h',
            'content' => <<<str
            <p>I made this! <a href="#">#myartwork</a> <a href="">#pixl</a></p>
                <img src="/public/images/simon-chilling.png" alt="">
            str,
            'likeCount' => 23,
            'replyCount' => 45,
            'repostCount' => 151,
            'profile' => [
                'avatar' => '/images/michael.png',
                'displayName' => 'Michael',
                'handle' => '@mmich_jj',
            ],
            'replies' => [
                [
                    'content' => "<p>Lmao i'm buying this i don't even care</p>",
                    'postedDateTime' => '1h',
                    'likeCount' => 52,
                    'replyCount' => 12,
                    'repostCount' => 200,
                    'profile' => [
                        'avatar' => '/images/simon-chilling.png',
                        'displayName' => 'Simon',
                        'handle' => '@simonwswiss',
                    ]
                ]
            ],
        ]
    ]));
    return view('profile',compact('feedItems'));
});
