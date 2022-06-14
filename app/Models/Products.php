<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'categories_id',
    ];

    public function category()
    {
//        return $this->hasOne(Categories::class, 'categories_id');
        return $this->belongsTo(Categories::class, 'categories_id');
    }
}
