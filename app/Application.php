<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    protected $table = "requests";

    public function User()
    {
        return $this->belongsTo('App\User', 'requester_id', 'id');
    }
}
