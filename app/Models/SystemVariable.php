<?php
namespace App\Models;

use App\Traits\MasterTrait;
use Illuminate\Database\Eloquent\Model;

class SystemVariable extends Model
{
    // use MasterTrait;
    public const SINGLE = 'متغير النظام';
    public const PLURAL = 'متغيرات النظام';
    protected $fillable = ['site_name', 'site_phone', 'currency', 'facebook_url', 'tweeter_url', 'address', 'image_logo'];
    protected $hidden = ['created_at', 'updated_at'];

    // public static function getSystemVariableVal($var)
    // {
    //     $model = new static;
    //     return $model->first()->$var;
    // }
    // public function createdBy()
    // {
    //     return $this->belongsTo('App\Models\User', 'created_by', 'id');
    // }

    // public function updatedBy()
    // {
    //     return $this->belongsTo('App\Models\User', 'update_by', 'id');
    // }
}
