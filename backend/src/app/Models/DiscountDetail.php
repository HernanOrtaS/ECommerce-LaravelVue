<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountDetail extends Model
{
    protected $fillable = [
        'aplied_to',
        'aplied_id',
        'discount_id',
    ];

    public function discount() {
        return $this->belongsTo(Discount::class);
    }
}
