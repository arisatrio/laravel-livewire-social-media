<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Komentar extends Pivot
{
    public $incrementing = true;
    protected $table = 'komentars';
}
