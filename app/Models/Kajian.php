<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kajian extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kajian';

    protected $fillable = [
        'title',
        'description',
        'benefit',
        'poster_url',
        'video_url',
        'tag',
        'tema_id',
        'ustadz_id',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%');
    }

    public function donations()
    {
        return $this->morphMany(Donation::class, 'itemable');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id', 'id');
    }

    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class, 'ustadz_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(KajianCategory::class, 'kajian_id', 'íd');
    }
}
