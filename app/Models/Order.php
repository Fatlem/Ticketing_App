<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'total_harga' => 'decimal:2',
        'order_date' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'event_id',
        'order_date',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tikets()
    {
        return $this->belongsToMany(Tiket::class, 'detail_orders')
            ->withPivot('jumlah', 'subtotal_harga');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class);
    }
}