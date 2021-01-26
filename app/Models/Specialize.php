<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialize extends Model
{
    use HasFactory;

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
