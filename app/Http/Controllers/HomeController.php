<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Post;

class HomeController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);
       
        if(Auth::attempt($credentials)){
                return redirect("/");
        }

        return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
    }

    public function index()
    {   
        if(Auth::user()){
            $user = Auth::user();
            $u = User::find($user->id);
            $s = $u->getSuggestionPosts();
            $posts = [];
            
            foreach ($s as $key => $value) {
                $posts[] = Post::find($value);
            }

            $data = ["user" => $user, "posts" => $posts];
            return view('home.index',$data);
        }
        return view('home.site');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
