<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporIzin extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'alamat_proyek',
        'tanggal_masuk',
        'tanggal_izin',
        'nomor_izin',
        'izin_id',
        'user_id',
    ];


    public function izin()
    {
        return $this->belongsTo(Izin::class, 'izin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
}
