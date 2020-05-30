<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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

    public function user_post()
    {
        return $this->belongsTo('App\UserPost');
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

    public function saveUserHabit($r,$hid) {
        $userHabits = $this->user_habit;

        foreach ($userHabits as $uh) {
            if($uh->habit_id == $hid){
                $uh->score = round($r);
                $uh->save();
            }
        }
    }

    public function setHabits(){
        $this->setImbalance();
        $this->setImmediacy();
    }

    public function setImbalance() {
        $today = date('Y-m-d');
        $lastMonth = date('Y-m-d',strtotime("last month"));
        $transactions = DB::table('transaction')
        ->select(DB::raw('id,transaction_type,transaction_sign,amount,note,cashback_transaction_id, note, DATE(created_at) as d'))
        ->whereRaw('transaction_status = ? AND user_id = ? AND transaction_type != ? AND created_at BETWEEN ? AND ?',['D',$this->id,'B',$lastMonth,$today])
        ->get();

        $monthBalance = 0;

        foreach ($transactions as $t) {
            if($t->transaction_sign == 'P'){
                $monthBalance += $t->amount;
            } else {
                $monthBalance -= $t->amount;
            }
        }

        $rate = round($monthBalance/1000);
        
        if ($rate == 0){
            $rate = -1;
        }

        $rt = 1/$rate;
        $r = $rt > 0 ? round($rt * 5) : 1 - round($rt * 5);
        $r = min($r,10);
        $r = max($r,1);

        $this->saveUserHabit($r,1);
    }

    public function setImmediacy() {
        $today = date('Y-m-d');
        $lastMonth = date('Y-m-d',strtotime("last month"));
        $transactions = DB::table('transaction')
        ->select(DB::raw('id,transaction_type,transaction_sign,amount,note,cashback_transaction_id, note, DATE(created_at) as d'))
        ->whereRaw('transaction_status = ? AND user_id = ? AND transaction_type != ? AND created_at BETWEEN ? AND ?',['D',$this->id,'B',$lastMonth,$today])
        ->get();

        $monthTotalBalance = 0;

        foreach ($transactions as $t) {
            if($t->transaction_sign == 'P'){
                $monthTotalBalance += $t->amount;
            } 
        }
        $rate = ($this->balance/$monthTotalBalance);
        $r = round(1 - $rate);
        $r = min($r,10);
        $r = max($r,1);

        $this->saveUserHabit($r,2);

    }

    public function saveApathy() {
        $today = date('Y-m-d',strtotime("+1 day"));;
        $lastMonth = date('Y-m-d',strtotime("last month"));
        $count = DB::table('user_post')
        ->select(DB::raw('count(1) as c'))
        ->whereRaw('user_id = ? AND created_at BETWEEN "?" AND "?"',[$this->id,$lastMonth,$today])
        ->first();

        $r = 10 - $count->c;
        $r = round($r);
        $r = min($r,10);
        $r = max($r,1);

        $this->saveUserHabit($r,3);
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
