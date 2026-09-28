<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';

    protected $guarded = [];

    public function ekstrakurikuler() {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
