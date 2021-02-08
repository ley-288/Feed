<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Exceptions\UserNotFound;
use Illuminate\Http\Request;
use App\Http\Resources\Friend as FriendResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\ValidationErrorException;
use Illuminate\Validation\ValidationException;

class FriendRequestController extends Controller
{
    public function store()
    {
        try {
            $data = request()->validate([
                'friend_id' => 'required',
            ]);
        } catch (ValidationException $e) {
           throw new ValidationErrorException(json_encode($e->errors()));
        }

        try {
            User::findOrFail($data['friend_id'])
            ->friends()->syncWithoutDetaching(auth()->user());
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException();
        }

        return new FriendResource(
            Friend::where('user_id', auth()->user()->id)
                ->where('friend_id', $data['friend_id'])
                ->first()
        );
    }
}
