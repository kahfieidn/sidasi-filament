<?php

namespace App\Models;

use App\Models\Izin;
use App\Models\LaporIzin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sektor extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_sektor',
        'nama_instansi',
    ];


    public function izin(){
        return $this->hasMany(Izin::class, 'sektor_id');
    }

}
