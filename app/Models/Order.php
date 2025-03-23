<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'from', 'to', 'package_size', 'status', 'tracking_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->tracking_id = 'BERU-' . Str::random(10);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
