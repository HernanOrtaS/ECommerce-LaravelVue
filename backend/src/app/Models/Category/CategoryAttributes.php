<?php

namespace App\Models\Category;
use App\Classes\Models\ToLowerCaseAttribute;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryAttributes
{
    protected function name() : Attribute {
        return ToLowerCaseAttribute::lowerCase();
    }

    protected function description() : Attribute {
        return ToLowerCaseAttribute::lowerCase();
    }

    protected function createdAt() : Attribute {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y - H:i'),
        );
    }

    protected function updatedAt() : Attribute {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y - H:i'),
        );
    }
}
