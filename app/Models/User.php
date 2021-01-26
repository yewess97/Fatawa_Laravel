<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'gender',
        'birth_date',
        'social_status',
        'email',
        'password',
        'phone',
        'users_image',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function favourites() {
        return $this->hasMany('App\Models\Favourite');
    }

    public function specialize() {
        return $this->belongsTo('App\Models\Specialize');
    }

    public function getAgeAttribute() {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }
}
