<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'value',
        'date_limit',
    ];

    public function discountDetail() {
        return $this->hasMany(Discount_Detail::class);
    }
}
