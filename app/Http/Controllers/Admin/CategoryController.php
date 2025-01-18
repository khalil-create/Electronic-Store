<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use userTrait;
    public $head_data = [
        "head" => "ادارة الفئات",
        "head2" => "الفئات",
        "card-title" => "قائمة الفئات",
        "card-title-pop-form" => "اضافة فئة",
        "add" => "اضافة فئة"
    ];
    public $thead = [
        "الاسم",
        "الوصف",
    ];
    public $urls = [
        "head-link" => "/admin/categories/index",
        "btn-add-link" => "/admin/categories/add",
        "delete" => "/admin/categories/delete/",
        "edit" => "/admin/categories/edit/",
        "store-form" => "/admin/categories/store",
        "activate" => "/admin/categories/activate/",
    ];
    public function index()
    {
        try {
            $categories = Category::paginate(config('constants.perPage'));

            return view('admin.categories.index', compact('categories'))->with("thead", $this->thead)
            ->with("head_data", $this->head_data)->with("urls", $this->urls);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function getCategoryItems($catid)
    {
        try {
            $category = Category::find($catid);
            $items = $category->items()->paginate(config('constants.perPage'));

            $categories = Category::get();
            return view('home', compact('items', 'categories', 'category'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required',
        ]);

        try {
            DB::beginTransaction();
            Category::create([
                'name' => $request->name,
                'description' => $request->description
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Added Unsuccessfull ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        try {
            $category = Category::find($id);
            if (!$category)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            $update = "/admin/categories/update/" . $id;
            $data2 = ['update' => $update, 'cardTitle' => 'تعديل الفئة'];
            return response()->json(['status' => '1', 'data' => $category, 'data2' => $data2]);
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required',
        ]);
        try {
            $category = Category::find($id);
            if (!$category)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            DB::beginTransaction();
            $category->name = $request->name;
            $category->description = $request->description;

            $category->update();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Modified Unsuccessfully ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Modified Successfully');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category)
            return redirect()->back()->with(['error' => 'There is no data for this']);

        try {
            DB::beginTransaction();
            $category->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
        return response()->json(['status' => '1', 'msg' => 'Deleted Successfully']);
    }
}
