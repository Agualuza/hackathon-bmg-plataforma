<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\UserHabit;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $plans = ["B" => "Básico", "F" => "Flex", "T" => "Top"];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function user_habit()
    {
        return $this->hasMany('App\UserHabit');
    }

    public function getPlan() {
        return $this->plans[$this->plan];
    }

    public function getLimit(){
        return $this->credit_limit - $this->blocked_credit;
    }

    public function getPercLimit() {
        return round((1 - ($this->blocked_credit/$this->credit_limit)) * 100);
    }

    public function getSuggestionPosts() {
        $posts = Post::all();
        $selected = 0;
        $user_habits = UserHabit::where('user_id', $this->id)->get();
        $habitsArray = [];
        $postsArray = [];

        foreach ($user_habits as $uh) {
            $habitsArray[$uh->habit_id] = $uh->score;
        }

        arsort($habitsArray);

        foreach ($habitsArray as $key => $habit) {
            foreach ($posts as $post) {
                
                if ($selected < 2) {
                   
                    if ($post->habit_id == $key) {
                        $postsArray[] = $post->id;
                        $selected += 1;
                    }
                }
            }
        }

        return $postsArray;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
