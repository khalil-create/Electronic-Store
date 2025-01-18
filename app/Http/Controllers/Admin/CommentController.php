<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Traits\commentTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    public $head_data = [
        "head" => "Comment Management",
        "head2" => "Comments",
        "card-title" => "List Comments",
        "card-title-pop-form" => "Add Comment",
        "add" => "Add Comment"
    ];
    public $thead = [
        "Content",
        "Post",
        "Author",
        "Posted at"
    ];
    public $urls = [
        "head-link" => "/admin/comments/index",
        "btn-add-link" => "/admin/comments/add",
        "delete" => "/admin/comments/delete/",
        "edit" => "/admin/comments/edit/",
        "store-form" => "/admin/comments/store",
        "activate" => "/admin/comments/activate/",
    ];
    public function index()
    {
        try {
            $comments = Comment::paginate(config('constants.perPage'));

            $users = User::all();
            $exist = ['btn_add' => 0];
            return view('admin.comments.index', compact('comments', 'users', 'exist'))->with("thead", $this->thead)
            ->with("head_data", $this->head_data)->with("urls", $this->urls);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        try {
            $comment = Comment::find($id);
            if (!$comment)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            $update = "/admin/comments/update/" . $id;
            $data2 = ['update' => $update, 'cardTitle' => 'Edit Comment'];
            return response()->json(['status' => '1', 'data' => $comment, 'data2' => $data2]);
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'bail|required',
            'content' => 'bail|required|string'
        ]);
        try {
            $comment = Comment::find($id);
            if (!$comment)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            DB::beginTransaction();
            $comment->user_id = $request->author;
            $comment->content = $request->content;
            $comment->update();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Modified Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Modified Successfully');
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if (!$comment)
            return redirect()->back()->with(['error' => 'There is no data for this']);

        try {
            DB::beginTransaction();
            $comment->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
        return response()->json(['status' => '1', 'msg' => 'Deleted Successfully']);
    }
}
