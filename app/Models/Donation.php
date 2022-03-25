<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'method_id',
        'video_id',
        'program_id',
        'donation',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function method()
    {
        return $this->belongsTo(DonationMethod::class, 'method_id', 'id');
    }

    public function video()
    {
        return $this->belongsTo(KajianVideo::class, 'video_id', 'id');
    }

    public function programs()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%' . $query . '%')->orWhere(
                'status',
                'like',
                '%' . $query . '%'
            );
    }
}
