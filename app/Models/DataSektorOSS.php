<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSektorOSS extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data_sektor_oss_id',
        'data_sektor_oss_type',
        'jumlah_data_sektor',
        'sektor_id',
        'user_id',
    ];

    public function data_sektor_ossable()
    {
        return $this->morphTo();
    }

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
}
