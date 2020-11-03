<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //belongsTo設定
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
