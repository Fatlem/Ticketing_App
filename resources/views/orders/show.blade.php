<x-layouts.app>
    <section class="max-w-4xl mx-auto py-12 px-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Detail Pemesanan</h1>
            <div class="text-sm text-gray-500">Order #{{ $order->id }} •
                {{ $order->order_date->translatedFormat('d F Y, H:i') }}
            </div>
        </div>

        <div class="card bg-base-100 shadow-md">
            <div class="lg:flex ">
                <div class="lg:w-1/3 p-4">
                    <img src="{{ $order->event?->gambar
        ? (filter_var($order->event->gambar, FILTER_VALIDATE_URL)
            ? $order->event->gambar
            : asset('images/events/' . $order->event->gambar))
        : asset('assets/images/placeholder.jpg')
    }}" alt="{{ $order->event?->judul ?? 'Event' }}" class="w-full object-cover mb-2" />

                    <h2 class="font-semibold text-lg">{{ $order->event?->judul ?? 'Event' }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ $order->event?->lokasi ?? '' }}</p>
                </div>
                <div class="card-body lg:w-2/3">


                    <div class="space-y-3">
                        @foreach($order->detailOrders as $d)
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="font-bold">{{ $d->tiket->tipe }}</div>
                                <div class="text-sm text-gray-500">Qty: {{ $d->jumlah }}</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold">Rp {{ number_format($d->subtotal_harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="divider"></div>

                    <div class="flex justify-between items-center">
                        <span class="font-bold">Total</span>
                        <span class="font-bold text-lg">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>

                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('orders.index') }}" class="btn btn-primary text-white">Kembali ke Riwayat Pembelian</a>
        </div>
    </section>
</x-layouts.app>