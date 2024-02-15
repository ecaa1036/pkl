<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;
    protected $table = "aktivitas";
    protected $guarded = [];
    protected $primaryKey = 'id_aktivitas';

    public function kehadiran(){
        return $this->belongsTo(Kehadiran::class, 'id_kehadiran');
    }
}
