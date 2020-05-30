<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $table = 'user_habit';

    public function habit()
    {
        return $this->belongsTo('App\Habit');
    }
}
