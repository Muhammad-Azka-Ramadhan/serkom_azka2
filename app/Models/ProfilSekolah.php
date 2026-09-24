<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProfilSekolah extends Model
{
    use HasUuids;
    //
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id_profil';
    protected $keyType = 'string';

    protected $guarded = [];
}
