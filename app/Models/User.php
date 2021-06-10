<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tempat_lahir', 
        'tanggal_lahir', 
        'alamat', 
        'bio',
        'pekerjaan',
        'no_hp', 
        'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function postingan()  {
        return $this->hasMany('App\Models\Postingan');
    }
    
    public function like() {
        return $this->belongsToMany('App\Models\Postingan', 'likes')->as('like')->withTimestamps();;
    }

    public function komentar() {
        return $this->belongsToMany('App\Models\Postingan','komentars')
            ->using('App\Models\Komentar')
            ->as('komentar')
            ->withPivot('isi')
            ->withTimestamps();
    }
}
