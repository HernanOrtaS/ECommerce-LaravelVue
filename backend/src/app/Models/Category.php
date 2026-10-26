<?php

namespace App\Models;

use App\Models\Category\CategoryAttributes;
use App\Models\Category\CategoryRelations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    use CategoryAttributes;
    use CategoryRelations;
}
