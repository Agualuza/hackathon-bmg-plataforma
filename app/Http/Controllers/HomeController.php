<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client; 
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

    public function sendWppRequest() {
        $sid    = "AC6fab34eec2226cd5d36f5b4f4a2be49f"; 
        $token  = "c8a6298f1d7855f38e415feef9671ac5"; 
        $twilio = new Client($sid, $token);

        $user = User::find(Auth::user()->id);
        $habits = [null,null,null,null,null,null];

        
        foreach($user->user_habit as $uh) {
            $habits[$uh->id] = $uh->score;
        }

        $arrayIdPost = $user->getSuggestionPosts();

        $msg = "Oi, tudo bem? Eu sou a Duda do Banco BMG.\n"
        . "Eu estou aqui para te atualizar sobre seu perfil.\nMeu objetivo é que você organize ao máximo sua vida financeira,"
        . " estou aqui para te ajudar pode contar comigo. 😀💰" 
        . "\nSeu perfil: *Equilibrado* \n"
        . "*Desequilíbrio:* " . $habits[1] . "\n"
        . "*Imediatismo:* " . $habits[2] . "\n"
        . "*Apatia:* " . $habits[3] . "\n"
        . "*Renda insuficiente:* " . $habits[4] . "\n"
        . "*Execesso de autoconfiança:* " . $habits[5] . "\n"
        . "*Pressão social:* " . $habits[6] . "\n"
        . "Esses valores são calculados com base na sua conta meu_BMG"
        . " eles variam de 1 a 10, com base nos seus hábitos te recomendamos esse nosso artigo https://duda-academy.herokuapp.com/leitura/"
        . $arrayIdPost[0];
        
        
        $message = $twilio->messages 
                        ->create("whatsapp:+552100000000", // to 
                                array( 
                                    "from" => "whatsapp:+14155238886",       
                                    "body" => $msg
                                ) 
                        ); 
        
    }

}
