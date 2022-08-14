<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'country',
        'province',
        'city',
        'district',
        'zipcode',
        'other',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function compact()
    {
        return "Provinsi " . $this->province . " Kota " . $this->city . " Kecamatan " . $this->district  . " " . $this->other . " Kode Pos " . $this->zipcode;
    }
}
