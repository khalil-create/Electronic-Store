<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SystemVariable;
use App\Traits\userTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemVariableController extends Controller
{
    use userTrait;
    public $head_data = [
        "head" => "ادارة متغيرات النظام",
        "head2" => "متغيرات النظام",
        "card-title" => "قائمة متغيرات النظام",
        // "card-title-pop-form" => "اضافة متغير",
        // "add" => "اضافة متغير",
    ];
    public $urls = [
        "head-link" => "/admin/system-variables/manage",
        // "btn-add-link" => "/admin/system-variables/add",
        // "delete" => "/admin/system-variables/delete/",
        // "edit" => "/admin/system-variables/edit/",
        // "store-form" => "admin/system-variables/store",
        "update-form" => "admin/system-variables/update/1",
    ];
    public function index()
    {
        $data = SystemVariable::first();
        // $has_items = false;
        $has_items = Item::all()->count() > 0 ? true : false;
        $sysVariable = true;
        return view('admin.system-variables.index', compact('data', 'has_items','sysVariable'))->with("head_data", $this->head_data)
            ->with("urls", $this->urls);
    }
    public function update(Request $request, SystemVariable $sysVar)
    {
        // return $request;
        // return $sysVar;
        $request->validate([
            'site_name' => 'bail|required|string',
            'site_phone' => 'bail|required|numeric',
            'currency' => 'bail|required|numeric',
            'facebook_url' => 'bail|required|string',
            'tweeter_url' => 'bail|required|string',
            // 'image_logo' => 'bail|required|string',
        ]);
        // return $request;
        $logo_filename = $sysVar->image_logo;
        $logo_filename_old = $sysVar->image_logo;
        try {
            if ($request->hasfile('image_logo')) {
                // $this->deleteFile($user->image,'images/users/');
                $logo_filename = $this->saveImage($request->file('image_logo'), 'designImages/');
            }

            DB::beginTransaction();
            $sysVar->site_name = $request->site_name;
            $sysVar->site_phone = $request->site_phone;
            $sysVar->currency = $request->currency;
            $sysVar->facebook_url = $request->facebook_url;
            $sysVar->tweeter_url = $request->tweeter_url;
            $sysVar->address = $request->address;
            $sysVar->image_logo = $logo_filename;
            $sysVar->update();
            // $sysVar->update($request->all());

            if ($logo_filename_old != null && $request->hasfile('image_logo') && $logo_filename_old != 'logo.png')
                $this->deleteFile($logo_filename_old, 'designImages/');
            DB::commit();
            return redirect()->route('system-variables.index')->with('status', 'تم تعديل البيانات بنجاح');
        } catch (Exception $e) {
            DB::rollback();
            if ($logo_filename != null && $logo_filename_old != 'logo.png')
                $this->deleteFile($logo_filename, 'designImages/');
            return redirect()->back()->with('error', 'لم يتم تعديل البيانات ... هناك حطأ(Error:
            ' . $e->getMessage() . ')');
        }
    }
}
