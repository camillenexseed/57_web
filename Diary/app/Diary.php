<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    public function likes()
    {
        //Diary と Userは紐づくよ
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
}
