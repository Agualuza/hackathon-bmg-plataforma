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
    public function index(Request $request) {
        $filter = $request->input("filter");
        $array = [];

        if($filter){
            for ($i=1; $i <= 6; $i++) { 
                $id_form = "filter" . $i;
                if($request->input($id_form) == 1){
                    $array[$i] = $i;
                }
            }

            if(count($array) > 0){
                $idsList = implode(",",$array);
                $posts = Post::whereRaw("habit_id in (" . $idsList . ")")->get();
                $data = ["posts" => $posts,"filters" => $array];
                return view("read.index",$data);
            }
        }

        $posts = Post::all();
        $data = ["posts" => $posts, "filters" => null];
        return view("read.index",$data);
    }

    public function post($id) {
        $post = Post::find($id);
        $data = [];

        if($post){
            if(Auth::user()){
                $userPost = new UserPost();
                $userPost->user_id = Auth::user()->id;
                $userPost->post_id = $id;
                $userPost->save();
            }
                $data["post"] = $post;
        } else {
            $p = new stdClass;
            $p->content = "Esse conteúdo não existe!";
            $data["post"] = $p;
        }

            return view("read.post",$data);
        }
}
