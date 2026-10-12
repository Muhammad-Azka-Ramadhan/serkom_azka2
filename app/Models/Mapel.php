<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $table = 'mapel';

    protected $guarded = [];

    public function guru() {
        return $this->hasMany(Guru::class, 'id_mapel', 'id');
    }
}
