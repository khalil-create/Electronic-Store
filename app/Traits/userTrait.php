<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\File;

class pathItem
{
    // public const path = request()->path();
    // public const init_itms = ['branch', 'floor', 'room', 'emp', 'user'];
    // public function __construct()
    //     $path = request()->path();
    //     $path_arr = explode('/', $path);
    //     if (isset($path_arr[1])) {
    //         $path = $path_arr[1];
    //     }
    //     $init_itms = ['branch', 'floor', 'room', 'emp', 'user'];
    // }
}
trait userTrait
{
    // use pathItem;
    // public function __construct(){
    //     $path = request()->path();
    //     $path_arr = explode('/', $path);
    //     if (isset($path_arr[1])) {
    //         $path = $path_arr[1];
    //     }
    //     $init_itms = ['branch', 'floor', 'room', 'emp', 'user'];
    // }
    static function printMenuOpen($clas, $super, $indx = 1)
    {
        $path = request()->path();
        $path_arr = explode('/', $path);
        if (isset($path_arr[$indx])) {
            $path = $path_arr[$indx];
        }
        $sub_list = [];
        if ($super == 'init')
            $sub_list = ['system-variables', 'currency', 'reserve-types', 'assettype'];
        elseif ($super == 'input')
            $sub_list = ['branch', 'floor', 'room', 'emp', 'user', 'location'];
        elseif ($super == 'system operations')
            $sub_list = ['reservation', 'account', 'account-transactions', 'maintenance', 'asset'];
        foreach ($sub_list as $item) {
            if ($item == $path) {
                return $clas;
                // break;
            }
        }
    }
    static function printActive($clas, $path_itm, $indx = 1)
    {
        $path = request()->path();
        $path_arr = explode('/', $path);
        if (isset($path_arr[$indx])) {
            $path = $path_arr[$indx];
        }
        if ($path_itm == $path) {
            return $clas;
        }
    }
    function saveImage($file, $folder, $multi = '')
    {
        $extention = $file->getClientOriginalExtension();
        $filename = time() . $multi . '.' . $extention;
        $path = $folder;
        $file->move($path, $filename);

        return $filename;
    }
    function deleteFile($file_old, $file_path)
    {
        if(File::exists(public_path($file_path . $file_old)))
            unlink(public_path($file_path . $file_old));
    }
    static function getSinceTimePast($updated_at)
    {
        $dateAndTime = explode(' ', $updated_at);
        $notifyTime = explode(':', $dateAndTime[1]);
        $notifyHour = $notifyTime[0];
        // $notifyHour = $notifyHour == '00' ? 1:$notifyHour;
        // return $dateAndTime[1];//00:30:20
        $notifyMin = $notifyTime[1];

        $notifyDate = date("Y M d", strtotime($dateAndTime[0]));
        $notifyDate = explode(' ', $notifyDate);
        $notifyDay = $notifyDate[2];
        $notifyMonth = $notifyDate[1];
        $notifyYear = $notifyDate[0];

        $currentDate = date("Y M d", strtotime(Carbon::now()));
        // return $currentDate;
        $currentDate = explode(' ', $currentDate);
        $currentDay = $currentDate[2];
        $currentMonth = $currentDate[1];
        $currentYear = $currentDate[0];

        $currentTime = date("h:i:A", strtotime(Carbon::now()));
        // return $currentTime;
        $currentTime = explode(':', $currentTime);
        $currentHour = $currentTime[0];
        $currentMin = $currentTime[1];
        $currentPeriod = $currentTime[2];
        $currentHour += $currentPeriod == 'PM' ? 12 : 0;
        $notifyHour += $notifyHour == '00' ? 12 : 0;
        // $since = $currentHour;
        if ($notifyMonth == $currentMonth && $notifyYear == $currentYear) {
            if ($currentDay == $notifyDay) {
                if ($currentHour == $notifyHour) {
                    if ($currentMin == $notifyMin)
                        $since = 'الان';
                    else {
                        $dif = $currentMin - $notifyMin;
                        $since = 'منذ ' . $dif . ' دقيقة';
                    }
                } else {
                    if ($currentHour - 1 == $notifyHour || $currentHour - 1 == '0') {
                        $dif = (60 - $notifyMin) + $currentMin;
                        if ($dif >= 60) {
                            $since = 'منذ ساعة و ' . ($dif - 60) . ' دقيقة';
                        } else {
                            $since = 'منذ ' . $dif . ' دقيقة';
                        }
                    } else {
                        $dif = $currentHour - $notifyHour;
                        $since = 'منذ ' . $dif . ' ساعة';
                    }
                }
            } else {
                if ($currentDay - 1 == $notifyDay) {
                    $dif = 24 - $notifyHour;
                    $dif += $currentHour;
                    if ($dif == 24)
                        $since = 'منذ يوم';
                    else
                        $since = 'منذ ' . $dif . ' ساعة';
                } else {
                    if ($notifyDay < $currentDay) {
                        $dif = $currentDay - $notifyDay;
                        $since = 'منذ ' . $dif . ' يوم';
                    } else
                        $since = 'منذ الشهر الماضي';
                }
            }
        } else {
            $since = 'منذ ' . $dateAndTime[0];
        }
        return $since;
    }
    static function getRouteReadNotification($title)
    {
        if ($title == 'مهام')
            $route = 'show.tasks';
        elseif ($title == 'اطباء')
            $route = 'show.doctors';
        elseif ($title == 'عينات')
            $route = 'show.samples';
        elseif ($title == 'عملاء')
            $route = 'show.customers';
        elseif ($title == 'خطط')
            $route = 'show.plans';
        elseif ($title == 'اختبارات')
            $route = 'show.tests';
        elseif ($title == 'اهداف')
            $route = 'show.objectives';
        elseif ($title == 'دراسات')
            $route = 'show.studies';
        elseif ($title == 'خدمات')
            $route = 'show.services';
        elseif ($title == 'طلبيات')
            $route = 'show.orders';
        elseif ($title == 'مواد')
            $route = 'show.courses';

        return $route;
    }
    static function getUserType()
    {
        $type = '.';
        if (Auth::user()->user_type == 'أدمن')
            $type = 'admin.';
        else if (Auth::user()->user_type == 'مدير تسويق')
            $type = 'managerMarketing.';
        else if (Auth::user()->user_type == 'مدير مبيعات')
            $type = 'managerSales.';
        else if (Auth::user()->user_type == 'مشرف')
            $type = 'supervisor.';
        else if (Auth::user()->user_type == 'مندوب علمي' || Auth::user()->user_type == 'مدير فريق')
            $type = 'repScience.';
        else if (Auth::user()->user_type == 'مندوب مبيعات')
            $type = 'repSales.';
        return $type;
    }
    function unreadNotify($id)
    {
        $unreadNotify = Auth::user()
            ->unreadNotifications
            ->where('id', $id)
            ->first();
        if ($unreadNotify)
            $unreadNotify->delete(); // or $unreadNotify->markAsRead();
    }
    function notifyUser($title, $content, $id)
    {
        $data = ['title' => $title, 'content' => $content];
        User::find($id)->notify(new UserNotification($data));
    }
}
