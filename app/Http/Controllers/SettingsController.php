<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class SettingsController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data = ["user" => $user];
        return view("settings.index",$data);
    }

    public function save(Request $request) {
        $user = User::find($request->input('uid'));

        if($user){
            $user->send_wpp = $request->input('send_wpp');
            $user->save();
        }
    }
}
