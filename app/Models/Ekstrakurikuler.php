<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ekstrakurikuler extends Model
{
    use HasUuids;
    //
    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_eskul';
    protected $keyType = 'string';

    protected $guarded = [];
}
