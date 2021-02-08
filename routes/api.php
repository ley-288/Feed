<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->group(function (){


    //Route::get('/posts', 'PostController@index');
    //Route::post('/posts', 'PostController@store');

    Route::get('auth-user', 'AuthUserController@show');

    Route::apiResources([
        '/posts' => 'PostController',
        '/posts/{post}/like' => 'PostLikeController',
        '/posts/{post}/comment' => 'PostCommentController',
        '/users/{user}/posts' => 'UserPostController',
        '/users' => 'UserController',
        '/friend-request' => 'FriendRequestController',
        '/friend-request-response' => 'FriendRequestResponseController',
        '/user-images' => 'UserImageController',
    ]);
});
