<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sub_category_id',
        'user_id'
    ];

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
