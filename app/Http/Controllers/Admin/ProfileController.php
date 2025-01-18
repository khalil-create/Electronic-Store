<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\SystemVariable;
use App\Models\User;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use userTrait;
    public function index($id)
    {
        try {
            // $user = User::with(['posts' => function($q){
            //     $q->latest('id')->take(5)->get();
            // }])->with(['comments' => function($q){
            //     $q->latest('id')->take(5)->get();
            // }])->find($id);
            $user = User::find($id);
            return view('profile.index', compact('user'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit(User $user)
    {
        try {
            return view('profile.edit', compact('user'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            // 'status' => 'bail|required|numeric',
            // 'type' => 'bail|required|numeric',
            'email' => 'bail|required|email|unique:users,email'.($id ? ",$id" : ''),
        ]);
        try {
            $user = User::find($id);
            if (!$user)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            $user_filename = $user->image;
            $user_filename_old = $user->image;
            if ($request->hasfile('image')) {
                $user_filename = $this->saveImage($request->file('image'), 'images/users/');
            }
            DB::beginTransaction();
            $user->name = $request->name;
            $user->image = $user_filename;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->update();

            if ($user_filename_old != null && $request->hasfile('image'))
                $this->deleteFile($user_filename_old, 'images/users/');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            if ($user_filename != null)
                $this->deleteFile($user_filename, 'images/users/');
            return redirect()->back()->with('error', 'Modified Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect('/profile/index/'.$user->id)->with('status', 'Modified Successfully');
    }
    public function followers($id)
    {
        try {
            $user = User::with(['followers', 'followedUsers'])->find($id);
            // return $user->followedUsers;
            return view('profile.followers', compact('user'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
