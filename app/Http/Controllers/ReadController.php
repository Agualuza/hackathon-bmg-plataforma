<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Post;
use App\UserPost;
use stdClass;

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
                $userPost = new UserPost();
                $userPost->user_id = Auth::user()->id;
                $userPost->post_id = $id;
                $userPost->save();
                $data["post"] = $post;
        } else {
            $p = new stdClass;
            $p->content = "Esse conteúdo não existe!";
            $data["post"] = $p;
        }

            return view("read.post",$data);
        }
}
