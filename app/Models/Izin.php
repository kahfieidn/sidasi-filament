<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Izin extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_izin',
        'masa_kerja',
        'biaya',
        'jenis_izin_id',
        'sektor_id',
        'user_id',
    ];

    public function jenis_izin()
    {
        return $this->belongsTo(JenisIzin::class, 'jenis_izin_id');
    }

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lapor_izin(){
        return $this->hasMany(LaporIzin::class, 'izin_id');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

}
