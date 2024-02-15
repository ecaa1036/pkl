<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $table = "kehadirans";
    protected $guarded = [];
    protected $primaryKey = 'id_kehadiran';

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function aktivitas(){
        return $this->hasMany(Aktivitas::class, 'id_kehadiran');
    }
}
