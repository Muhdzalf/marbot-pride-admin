<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KajianVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'benefit',
        'poster_url',
        'video_url',
        'tag',
        'tema_id',
        'admin_id',
        'ustadz_id',
        'category_id',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'video_id', 'id');
    }

    public function tema()
    {
        return $this->belongsTo(KajianTheme::class, 'tema_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class, 'ustadz_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
