<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $guarded = [];
    protected $primaryKey = 'nisn';

    protected $fillable = [
        'nisn',
        'nama',
        'nohp',
        'alamat',
        'id_user',
        'id_kelas', 
    ];


    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function user(){
    return $this->belongsTo(User::class, 'id_user');
    }

    public function monitoring(){
        return $this->hasMany(Monitoring::class, 'nisn');
    }

    public function kehadiran(){
        return $this->hasMany(Kehadiran::class, 'nisn');
    }
}
