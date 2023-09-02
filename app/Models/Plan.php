<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function userSelectedPlan($id){
        $plans = UserPlan::where('user_id', $id)->get();
        $data = [];

        foreach($plans as $item){
            $data += [$item->plan_id => self::planList()[$item->plan_id]];
        }

        return $data;
    }

    public static function planList(){
        $plan = static::all();
        $data = [];

        foreach($plan as $item){
            $data += [$item->id => $item->name];
        }

        return $data;
    }

    public static function insuranceList(){
        $insurances = Insurance::all();
        $data = [];

        foreach($insurances as $item){
            $data += [$item->id => $item->name];
        }

        return $data;
    }
}
