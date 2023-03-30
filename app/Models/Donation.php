<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'nominal',
        'method_id',
        'user_id',
        'itemable_id',
        'itemable_type',
    ];


    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%' . $query . '%')->orWhere(
                'status',
                'like',
                '%' . $query . '%'
            );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function method()
    {
        return $this->belongsTo(DonationMethod::class, 'method_id', 'id');
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}
