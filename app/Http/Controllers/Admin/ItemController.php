<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Item;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemController extends Controller
{
    use userTrait;
    public $head_data = [
        "head" => "ادارة المنتجات",
        "head2" => "المنتجات",
        "card-title" => "قائمة المنتجات",
        "card-title-pop-form" => "اضافة منتج",
        "add" => "اضافة منتج"
    ];
    public $thead = [
        "الاسم",
        "الوصف",
        "السعر",
        "الفئة"
    ];
    public $urls = [
        "head-link" => "/admin/items/index",
        "btn-add-link" => "/admin/items/add",
        "delete" => "/admin/items/delete/",
        "edit" => "/admin/items/edit/",
        "store-form" => "/admin/items/store",
        "activate" => "/admin/items/activate/",
    ];
    public function index()
    {
        try {
            $items = Item::paginate(config('constants.perPage'));
            $categories = Category::all();

            return view('admin.items.index', compact('items', 'categories'))->with("thead", $this->thead)
            ->with("head_data", $this->head_data)->with("urls", $this->urls);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        // if ($request->hasfile('image'))
        //     return 'has image';
        // return $request;
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required',
            'price' => 'bail|required|numeric',
            'model_no' => 'bail|required|numeric',
            'image1' => 'bail|required',
            'image2' => 'bail|required',
            'image3' => 'bail|required',
        ]);
        $item_filename1 = null;
        $item_filename2 = null;
        $item_filename3 = null;
        try {
            if ($request->hasfile('image1'))
                $item_filename1 = $this->saveImage($request->file('image1'), 'images/items/', '-1');
            if ($request->hasfile('image2'))
                $item_filename2 = $this->saveImage($request->file('image2'), 'images/items/', '-2');
            if ($request->hasfile('image3'))
                $item_filename3 = $this->saveImage($request->file('image3'), 'images/items/', '-3');

            DB::beginTransaction();
            $item = Item::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'model_no' => $request->model_no,
                'category_id' => $request->category_id
            ]);
            Image::create(['image' => $item_filename1, 'item_id' => $item->id]);
            Image::create(['image' => $item_filename2, 'item_id' => $item->id]);
            Image::create(['image' => $item_filename3, 'item_id' => $item->id]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            if ($item_filename1 != null)
                $this->deleteFile($item_filename1, 'images/items/');
            if ($item_filename2 != null)
                $this->deleteFile($item_filename2, 'images/items/');
            if ($item_filename3 != null)
                $this->deleteFile($item_filename3, 'images/items/');

            return redirect()->back()->with('error', 'Added Unsuccessfull ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        try {
            $item = Item::find($id);
            if (!$item)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            $update = "/admin/items/update/" . $id;
            $data2 = ['update' => $update, 'cardTitle' => 'تعديل المنتج'];
            return response()->json(['status' => '1', 'data' => $item, 'data2' => $data2]);
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required',
            'price' => 'bail|required|numeric',
            'model_no' => 'bail|required|numeric'
        ]);
        try {
            $item = Item::find($id);
            if (!$item)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            $item_filename1 = null;
            // $item_filename1_old = null;
            $item_filename2 = null;
            // $item_filename2_old = null;
            $item_filename3 = null;
            // $item_filename3_old = null;
            // foreach($item->images() as $img){
            //     $item_filename1_old = $img->image;
            //     $item_filename1_old = $img->image;

            //     $item_filename2_old = $img->image;
            //     $item_filename2_old = $img->image;

            //     $item_filename3_old = $img->image;
            //     $item_filename2_old = $img->image;
            // }

            $new_img = false;
            if ($request->hasfile('image1') && $request->hasfile('image2') && $request->hasfile('image3')){
                $item_filename1 = $this->saveImage($request->file('image1'), 'images/items/', '-1');
                $item_filename2 = $this->saveImage($request->file('image2'), 'images/items/', '-2');
                $item_filename3 = $this->saveImage($request->file('image3'), 'images/items/', '-3');
                $new_img = true;
            }

            DB::beginTransaction();
            $item->name = $request->name;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->model_no = $request->model_no;
            $item->category_id = $request->category_id;

            $item->update();

            if($new_img){
                $files = array($item_filename1, $item_filename2, $item_filename3);
                $i = 0;
                if($item->images->count() > 0){
                    foreach($item->images as $img){
                        $this->deleteFile($img->image, 'images/items/');

                        $img->image = $files[$i];
                        $img->update();
                        $i++;
                    }
                }else{
                    Image::create(['image' => $item_filename1, 'item_id' => $item->id]);
                    Image::create(['image' => $item_filename2, 'item_id' => $item->id]);
                    Image::create(['image' => $item_filename3, 'item_id' => $item->id]);
                }
            }
            // if ($item_filename_old != null && $request->hasfile('image'))
            //     $this->deleteFile($item_filename_old, 'images/items/');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // if ($item_filename != null)
            //     $this->deleteFile($item_filename, 'images/items/');
            return redirect()->back()->with('error', 'Modified Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Modified Successfully');
    }
    public function show($id)
    {
        try {
            $item = Item::with(['images', 'category'])->find($id);
            $categories = Category::get();
            // return $item;
            return view('items.show', compact('item', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function comment(Request $request, Item $item)
    {
        $request->validate([
            'content' => 'bail|required',
        ]);
        try {
            DB::beginTransaction();
            Comment::create([
                'content' => $request->content,
                'item_id' => $item->id,
                'user_id' => Auth::user()->id,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Commented Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Commented Successfully');
    }
    public function delete($id)
    {
        $item = Item::find($id);
        if (!$item)
            return redirect()->back()->with(['error' => 'There is no data for this']);

        try {
            DB::beginTransaction();
            $item->delete();

            // if ($item->image)
            //     $this->deleteFile($item->image, 'images/items/');
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
                    $field = "name";
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
                $items = Item::where($field, $operator, $value)->orWhere('description', $operator, $value)->orderBy('id', 'DESC')->paginate(config('constants.perPage'));
                // if (!empty($items)) {
                //     foreach ($items as $info) {
                //         $info->user_name = User::where('id', $info->user_id)->value('name');
                //         $info->comments_count = Comment::where('post_id', $info->post_id)->count();
                //         $info->likes_count = Like::where('post_id', $info->post_id)->count();
                //     }
                // }
                return view('items.ajax_search', ['items' => $items]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'لم يتم إضافة البيانات ... هناك حطأ(Error: ' . $e->getMessage() . ')');
        }
    }
}
