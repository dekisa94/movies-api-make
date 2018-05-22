<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public static function search($term) {
        return self::where('title', 'like', '%' . $term . '%')->get();
    }
}
