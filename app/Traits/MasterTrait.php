<?php

namespace App\Traits;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

trait MasterTrait
{
    public static function createMaster($data){
        // Create a new instance of the model
        $model = new static;
        // Set the attributes of the model using the provided data
        $model->fill($data);
        // Save the model to the database
        $model->save();
        return $model;
    }
    public static function getSequenceNo(){
        $model = new static;
        $n = $model->max("number");
        return $n ? ++$n : 1;
    }
    public static function accountModel($id, $number){
        $model = new static;
        $acc_name = 'ال'.$model::SINGLE.': '.$number;
        $acc_id = Account::findOrfail($id)->createAcc($acc_name);
        return $acc_id ? $acc_id : false;
    }
    protected static function boot()
    {
        parent::boot();
        $model = new static;
        $model::creating(function($model) {
            if(isset(Auth::user()->id)){
                $model->created_by = Auth::user()->id;
            }
        });
    }
}
