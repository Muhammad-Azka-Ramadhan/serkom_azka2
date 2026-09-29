<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    //
    protected $table = 'ekstrakurikuler';

    protected $guarded = [];

    public function guru() {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
}
