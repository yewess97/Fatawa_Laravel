<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answer() {
        return $this->hasOne('App\Models\Answer');
    }

    public function specialize() {
        return $this->belongsTo('App\Models\Specialize');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function favourites() {
        return $this->hasMany('App\Models\Favourite');
    }
}
