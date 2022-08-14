<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function addresses()
    {
        return $this->morphedByMany(Address::class, 'model', 'model_has_label');
    }

    public function payments()
    {
        return $this->morphedByMany(Payment::class, 'model', 'model_has_label');
    }
}
