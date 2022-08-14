<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'name',
        'price',
        'type',
        'unit',
        'promo',
        'picture',
    ];

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot(['quantity']);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot(['quantity']);
    }
}
