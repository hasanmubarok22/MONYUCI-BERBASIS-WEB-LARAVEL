<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Service;
use App\Http\Traits\UsesUuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Laundry extends Authenticatable
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
        'description',
        'operational_start',
        'operational_end',
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
        'operational_start' => 'datetime',
        'operational_end' => 'datetime',
    ];

    public function favBy($user)
    {
        return $this->users->contains($user);
    }

    public function favCount()
    {
        return $this->users->count();
    }

    public function orderThisMonth()
    {
        return $this->orders()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
    }

    public function orderThisWeek()
    {
        return $this->orders()->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    }

    public function orderThisDay()
    {
        return $this->orders()->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get();
    }

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

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'customer_favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'laundry_comments')->withPivot(['comment', 'rating'])->withTimestamps();;
    }
}
