<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Cryptocap\Facades\Cryptocap;
use App\Models\User;

class TestController extends Controller
{
    public function index(){
        $data = [];
        array_push($data, Cryptocap::getSingleAsset('bitcoin'));
        array_push($data, Cryptocap::getSingleAsset('ethereum'));
        array_push($data, Cryptocap::getSingleAsset('tether'));
        array_push($data, Cryptocap::getSingleAsset('tron'));

        return $data;
    }

    public function credit(){
        return User::where('plan_credit', now()->toDateTimeString())->get();
    }

    public function timeNow(){
        return now()->toDateTimeString();
    }
}
