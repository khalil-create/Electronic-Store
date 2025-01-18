<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use userTrait;
    public $head_data = [
        "head" => "ادارة المستخدمين",
        "head2" => "المستخدمين",
        "card-title" => "قائمة المستخدمين",
        "card-title-pop-form" => "اضافة مستخدم",
        "add" => "اضافة مستخدم"
    ];
    public $thead = [
        "النوع",
        "الاسم",
        "البريد الالكتروني",
        "رقم الهاتف",
        "الحالة"
    ];
    public $urls = [
        "head-link" => "/admin/users/index",
        "btn-add-link" => "/admin/users/add",
        "delete" => "/admin/users/delete/",
        "edit" => "/admin/users/edit/",
        "store-form" => "/admin/users/store",
        "activate" => "/admin/users/activate/",
    ];
    public function index()
    {
        try {
            $users = User::paginate(config('constants.perPage'));

            return view('admin.users.index', compact('users'))->with("thead", $this->thead)
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
            'status' => 'bail|required|numeric',
            'type' => 'bail|required|numeric',
            'username' => 'bail|required|string|max:255',
            'phone_no' => 'bail|required|numeric',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6|confirmed',
            'password_confirmation' => 'bail|required_with:password|same:password|min:6',
        ]);
        $user_filename = null;
        try {
            if ($request->hasfile('image'))
                $user_filename = $this->saveImage($request->file('image'), 'images/users/');

            DB::beginTransaction();
            User::create([
                'name' => $request->name,
                'status' => $request->status,
                'username' => $request->username,
                'phone_no' => $request->phone_no,
                'image' => $user_filename,
                'type' => $request->type,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            if ($user_filename != null)
                $this->deleteFile($user_filename, 'images/users/');
            return redirect()->back()->with('error', 'Added Unsuccessfull ... There is error (Error: ' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        try {
            $user = User::find($id);
            if (!$user)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            $update = "/admin/users/update/" . $id;
            $data2 = ['update' => $update, 'cardTitle' => 'تعديل المستخدم'];
            return response()->json(['status' => '1', 'data' => $user, 'data2' => $data2]);
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'status' => 'bail|required|numeric',
            'username' => 'bail|required|string|max:255',
            'phone_no' => 'bail|required|numeric',
            'type' => 'bail|required|numeric',
            'email' => 'bail|required|email|unique:users,email'.($id ? ",$id" : ''),
        ]);
        try {
            $user = User::find($id);
            if (!$user)
                return redirect()->back()->with(['error' => 'There is no data for this']);

            $user_filename = $user->image;
            $user_filename_old = $user->image;
            if ($request->hasfile('image')) {
                // $this->deleteFile($user->image,'images/users/');
                $user_filename = $this->saveImage($request->file('image'), 'images/users/');
            }
            DB::beginTransaction();
            $user->name = $request->name;
            $user->status = $request->status;
            $user->phone_no = $request->phone_no;
            $user->username = $request->username;
            $user->image = $user_filename;
            $user->type = $request->type;
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
        return redirect()->back()->with('status', 'Modified Successfully');
    }
    public function activate($id)
    {
        try {
            $user = User::find($id);
            if (!$user)
                return response()->json(['status' => '0', 'msg' => 'There is no data for this']);

            DB::beginTransaction();
            if($user->status == 1){
                $user->status = 2;
                $msg = 'The user has been deactivated';
            }
            else{
                $user->status = 1;
                $msg = 'User has been activated';
            }
            $user->update();
            DB::commit();
            return response()->json(['status' => '1', 'msg' => $msg]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect()->back()->with(['error' => 'There is no data for this']);

        if ($user->type == 1) {
            return response()->json(['status' => '0', 'msg' => 'You cannot delete the admin']);
            // }else if($user->whereHas('reservations')->get()){
            //     return response()->json(['status' => 'لا يمكنك حذف هذا المستخدم']);
        } else {
            try {
                DB::beginTransaction();
                $user->delete();

                if ($user->image)
                    $this->deleteFile($user->image, 'images/users/');
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
            }
            return response()->json(['status' => '1', 'msg' => 'Deleted Successfully']);
        }
    }
}
