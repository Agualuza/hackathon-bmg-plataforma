<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Post;


class ReadController extends Controller
{   

    public function index() {
        $posts = Post::all();
        $data = ["posts" => $posts];
        return view("read.index",$data);
    }

    public function post($id) {
        $post = Post::find($id);
        $data = [];

        if($post){
                $data["post"] = $post;
        } else {
            $data["post"] = "Esse conteúdo não existe!";
        }

            return view("read.post",$data);
        }
}
