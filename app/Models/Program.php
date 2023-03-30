<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'target_donation',
        'trailer_url',
        'poster_url',
        'status',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')->orWhere(
                'description',
                'like',
                '%' . $query . '%'
            );
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'program_id', 'id');
    }
}
