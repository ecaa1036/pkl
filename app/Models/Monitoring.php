<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    protected $table = "monitorings";
    protected $guarded = [];
    protected $primaryKey = 'id_monitoring';

    public  function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function industri(){
        return $this->belongsTo(Industri::class, 'id_industri');
    }
}
