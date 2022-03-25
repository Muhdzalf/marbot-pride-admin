<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'poster_url'
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%');
    }

    public function videos()
    {
        return $this->hasMany(KajianVideo::class, 'ustadz_id', 'id');
    }
}
