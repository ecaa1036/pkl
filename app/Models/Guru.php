<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "gurus";
    protected $guarded = [];
    protected $primaryKey = 'id_guru';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function monitoring(){
        return $this->hasMany(Monitoring::class, 'id_guru');
    }
}
