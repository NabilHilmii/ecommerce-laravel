<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'desc',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
