<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_id',
        'start',
        'end',
        'is_completed'
    ];

    protected $casts = [
        'start' => 'datetime:Y-m-d-h',
        'end' => 'datetime:Y-m-d-h'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
