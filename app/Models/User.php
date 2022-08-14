<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'phone_number',
        'identity_card',
        'birthday',
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
        'birthday' => 'date',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->address()->create([
                'name' => $user->name,
                'country' => 'Indonesia',
                'province' => '',
                'city' => '',
                'district' => '',
                'zipcode' => '',
                'other' => '',
            ]);
        });
    }

    // protected static function boot()
    // {
    //     self::created(function ($model) {
    //         dd($model);
    //     });
    // }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'model');
    }

    public function bankaccounts()
    {
        return $this->morphMany(Bankaccount::class, 'model');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function laundries()
    {
        return $this->belongsToMany(Laundry::class, 'customer_favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->belongsToMany(Laundry::class, 'laundry_comments')->withPivot(['comment', 'rating'])->withTimestamps();
    }
}
