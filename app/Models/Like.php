<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'postingan_id'
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function postingan() {
        return $this->belongsTo('App\Models\Postingan');
    }
}
