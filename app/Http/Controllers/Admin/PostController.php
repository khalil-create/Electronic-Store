<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class PostController extends Controller
{
    use userTrait;
    public $head_data = [
        "head" => "Post Management",
        "head2" => "Posts",
        "card-title" => "List Posts",
        "card-title-pop-form" => "Add Post",
        "add" => "Add Post"
    ];
    public $thead = [
        "Title",
        "Author",
        "Posted at",
        "Comments",
        "Likes"
    ];
    public $urls = [
        "head-link" => "/admin/posts/index",
        "btn-add-link" => "/admin/posts/add",
        "delete" => "/admin/posts/delete/",
        "edit" => "/admin/posts/edit/",
        "store-form" => "/admin/posts/store",
    ];
    public function index()
    {
        try {
            $posts = Post::orderBy('id', 'DESC')->paginate(config('constants.perPage'));
            $authors = User::all();

            return view('admin.posts.index', compact('posts', 'authors'))->with("thead", $this->thead)
                ->with("head_data", $this->head_data)->with("urls", $this->urls);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function add()
    {
        try {
            return view('posts.add');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        // return response()->json(['status' => '0', 'msg' => 'There is no data for this']);
        $request->validate([
            'title' => 'bail|required|string|max:255',
            'content' => 'bail|required',
        ]);
        if ($request->author)
            $user_id = $request->author;
        else
            $user_id = Auth::user()->id;
        try {
            // $tags = null;
            // if($request->get('tags'))
            //     $tags = json_encode($request->get('tags'));
            DB::beginTransaction();
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $user_id,
                'tags' => $request->tags,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // return redirect('/profile/index/'.$user_id)->with('error', 'Added Unsuccessfull ... There is error (Error(Error: ' . $e->getMessage() . ')');
            // return redirect('/profile/index/'.Auth::user()->id)->with('error', 'Added Unsuccessfull ... There is error (Error(Error: ' . $e->getMessage() . ')');
            return redirect()->back()->with('error', 'Added Unsuccessfull ... There is error (Error(Error: ' . $e->getMessage() . ')');
        }
        if ($request->author)
            return redirect()->back()->with('status', 'Added Successfully');
        else
            // return redirect('/profile/index/' . $user_id)->with('status', 'Added Successfully');
            return redirect('/home')->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        try {
            $post = Post::find($id);
            if (!$post)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            $update = "/admin/posts/update/" . $id;
            $data2 = ['update' => $update, 'cardTitle' => 'Edit Post'];
            return response()->json(['status' => '1', 'data' => $post, 'data2' => $data2]);
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function edit2($id)
    {
        try {
            $post = Post::find($id);
            if (!$post)
                return redirect()->back()->with(['status' => '0', 'msg' => 'There is no data for this']);
            return view('posts.edit', compact('post'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'bail|required|string|max:255',
            'content' => 'bail|required|string',
        ]);
        try {
            $post = Post::find($id);
            if (!$post)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            // $post_filename = $post->image;
            // $post_filename_old = $post->image;
            // if ($request->hasfile('image')) {
            //     $post_filename = $this->saveImage($request->file('image'), 'images/posts/');
            // }
            if ($request->author)
                $user_id = $request->author;
            else
                $user_id = Auth::user()->id;
            DB::beginTransaction();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = $user_id;
            $post->update();

            // if ($post_filename_old != null && $request->hasfile('image'))
            //     $this->deleteFile($post_filename_old, 'images/posts/');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // if ($post_filename != null)
            //     $this->deleteFile($post_filename, 'images/posts/');
            return redirect()->back()->with('error', 'Modified Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        if ($request->author)
            return redirect()->back()->with('status', 'Modified Successfully');
        else
            return redirect('/home')->with('status', 'Modified Successfully');
    }
    public function show(Post $post)
    {
        try {
            return view('posts.show', compact('post'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'bail|required',
        ]);
        try {
            DB::beginTransaction();
            Comment::create([
                'content' => $request->content,
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Commented Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Commented Successfully');
    }
    public function like(Post $post)
    {
        try {
            DB::beginTransaction();
            $like = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
            if ($like) {
                $like->delete();
            } else {
                Like::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                ]);
            }
            DB::commit();
            return response()->json(['status' => '1']);
        } catch (Exception $e) {
            DB::rollback();
            // return redirect()->back()->with('error', 'لم يتم إضافة البيانات ... هناك حطأ(Error: ' . $e->getMessage() . ')');
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
        // return redirect()->back();
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post)
            return redirect()->back()->with(['error' => 'There is no data for this']);

        try {
            DB::beginTransaction();
            $post->delete();

            // if ($post->image)
            //     $this->deleteFile($post->image, 'images/posts/');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
        return response()->json(['status' => '1', 'msg' => 'Deleted Successfully']);
    }
    public function ajax_search(Request $request)
    {
        try {
            if ($request->ajax()) {
                $search_value = $request->search_value;

                if ($search_value != '') {
                    $field = "title";
                    $operator = "like";
                    $value = "%{$search_value}%";
                } else {
                    //true
                    $field = "id";
                    $operator = ">";
                    $value = 0;
                }
                // $posts = DB::table('posts')
                //     ->where(function ($query) use ($search_value) {
                //         $columns = Schema::getColumnListing('posts');

                //         foreach ($columns as $column) {
                //             $query->orWhere($column, 'LIKE', '%' . $search_value . '%');
                //         }
                //     })
                //     ->paginate(config('constants.perPage'));
                $posts = Post::where($field, $operator, $value)->orWhere('content', $operator, $value)->where('tags', $operator, $value)->orderBy('id', 'DESC')->paginate(config('constants.perPage'));
                if (!empty($posts)) {
                    foreach ($posts as $info) {
                        $info->user_name = User::where('id', $info->user_id)->value('name');
                        $info->comments_count = Comment::where('post_id', $info->post_id)->count();
                        $info->likes_count = Like::where('post_id', $info->post_id)->count();
                    }
                }
                return view('posts.ajax_search', ['posts' => $posts]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'لم يتم إضافة البيانات ... هناك حطأ(Error: ' . $e->getMessage() . ')');
        }
    }
}
