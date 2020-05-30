<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class SettingsController extends Controller
{
    public function index() {
        return view("settings.index");
    }
}
