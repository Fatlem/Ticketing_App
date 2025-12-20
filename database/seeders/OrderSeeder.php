<?php

namespace Database\Seeders;

use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id' => 2,
                'event_id' => 1,
                'order_date' => '2024-07-01 14:30:00',
                'total_harga' => 1500000,
            ],
            [
                'user_id' => 2,
                'event_id' => 2,
                'order_date' => '2024-07-02 10:15:00',
                'total_harga' => 200000,
            ],
        ];
        $order_details = [
            [
                'order_id' => 1,
                'tiket_id' => 1,
                'jumlah' => 1,
                'subtotal_harga' => 1500000,
            ],
            [
                'order_id' => 2,
                'tiket_id' => 3,
                'jumlah' => 1,
                'subtotal_harga' => 200000,
            ],
        ];
        foreach ($orders as $order) {
            Order::create($order);
        }
        // Assuming you have an OrderDetail model
        foreach ($order_details as $detail) {
            DetailOrder::create($detail);
        }
    }
}