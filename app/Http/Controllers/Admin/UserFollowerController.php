<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Http\Request;

class UserFollowerController extends Controller
{
    public function store(Request $request, User $user)
    {
        $followerId = auth()->id();
        // $userFollower = UserFollower::create([
        //     'user_id' => $user->id,
        //     'follower_id' => $followerId,
        // ]);

        $userFollower = UserFollower::updateOrCreate([
            'user_id' => $user->id,
            'follower_id' => $followerId,
        ]);


        /*
            upsert: add or update multiple rows
            first argument: data
            second argument: column(s) that uniquely
            third argument: is an array of the columns that should be updated if a matching record already exists
        */
        // UserFollower::upsert($user);

        return redirect()->back();
        // return redirect()->route('users.show', $user->id)
        //     ->with('success', 'You are now following ' . $user->name);
    }

    public function destroy(Request $request, User $user)
    {
        $followerId = auth()->id();
        UserFollower::where('user_id', $user->id)
            ->where('follower_id', $followerId)
            ->delete();

        return redirect()->back();
        // return redirect()->route('users.show', $user->id)
        //     ->with('success', 'You have unfollowed ' . $user->name);
    }
}
