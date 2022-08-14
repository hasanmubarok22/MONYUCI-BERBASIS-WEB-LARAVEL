<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'total_cost',
        'status',
        'pickedup_at',
        'finished_at',
        'received_at',
        'onCart',
    ];

    protected $casts = [
        'pickedup_at' => 'datetime',
        'finished_at' => 'datetime',
        'received_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot(['quantity']);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function syncTotal()
    {
        $total = 0;
        foreach ($this->services as $service) {
            $service->pivot->quantity = rand(1, 5);
            $service->pivot->save();
            $total += $service->pivot->quantity * $service->price;
        }
        $this->total_cost = $total;
        $this->save();
    }
}
