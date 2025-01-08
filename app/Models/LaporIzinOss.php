<?php

namespace App\Models;

use App\Models\DataSektorOSS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporIzinOss extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'berkas',
        'jenis_oss',
        'bulan',
        'tahun',
        'jumlah_data',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function data_sektor_osses()
    {
        return $this->morphMany(DataSektorOSS::class, 'data_sektor_ossable');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
}
