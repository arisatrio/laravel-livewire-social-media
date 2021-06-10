<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $fillable = [
        'isi',
        'media',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function like() {
        return $this->belongsToMany('App\Models\User', 'likes')->as('like')->withTimestamps();;
    }

    public function komentar() {
        return $this->belongsToMany('App\Models\User','komentars')
            ->using('App\Models\Komentar')
            ->as('komentar')
            ->withPivot('id', 'isi')
            ->withTimestamps();
    }

}
