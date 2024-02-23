<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;
    protected $table = "keterangans";
    protected $guarded = [];
    protected $primaryKey = 'id_ket';

    protected $fillable = [
        'ket',
        'status',
        'nisn', 
    ];


    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn');
    }
}
