<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KajianCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kajian_id',
        'category_id',
    ];

    public function video()
    {
        return $this->belongsTo(Kajian::class, 'kajian_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
