<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $plans = ["B" => "Básico", "F" => "Flex", "T" => "Top"];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
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
