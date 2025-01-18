<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;
use Exception;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $users = User::all()->count();
            $items = Item::all()->count();
            $comments = Comment::all()->count();
            // $likes = Like::all()->count();
            return view('admin.dashboard', compact('users', 'items'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}