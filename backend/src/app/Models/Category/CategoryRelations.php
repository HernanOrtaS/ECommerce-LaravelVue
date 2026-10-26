<?php

namespace App\Models\Category;

use App\Models\User;

trait CategoryRelations
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
