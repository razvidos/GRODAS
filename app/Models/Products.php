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
    /**
     * @var bool|mixed
     */
    protected $is_in_order;

    public function category()
    {
//        return $this->hasOne(Categories::class, 'categories_id');
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    /**
     * @return bool|mixed
     */
    public function isInOrder()
    {
        return $this->is_in_order;
    }

    /**
     * @param bool|mixed $is_in_order
     */
    public function inOrder(bool $is = true): void
    {
        $this->is_in_order = $is;
    }


}
