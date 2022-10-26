<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_siswa",
        "nama_project",
        "tanggal",
        "deskripsi",
        "foto"

    ];
    
    protected $table = 'project';
    public function Siswa(){
         return $this->belongsTo(Siswa::class ,'id');
    }

}
