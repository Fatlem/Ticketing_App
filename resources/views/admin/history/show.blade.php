<x-layouts.admin title="Detail Pemesanan">
    <section class="max-w-5xl mx-auto py-8 px-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>

                    <!-- Title -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Detail Pemesanan
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Informasi lengkap transaksi</p>
                    </div>
                </div>

                <!-- Order Info Badge -->
                <div class="bg-white rounded-lg px-4 py-2 shadow-sm border border-gray-100">
                    <div class="flex items-center space-x-2 text-sm">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        <span class="font-semibold text-gray-700">Order #{{ $order->id }}</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-500">
                            {{ $order->order_date ? \Carbon\Carbon::parse($order->order_date)->format('d M Y H:i') : '-' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-full mt-6 opacity-20"></div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="lg:flex">
                <!-- Event Image & Info Section -->
                <div class="lg:w-2/5 bg-gradient-to-br from-gray-50 to-white p-6 border-r border-gray-100">
                    <!-- Image Container -->
                    <div class="relative rounded-xl overflow-hidden shadow-md mb-4 group">
                        <img src="{{ $order->event?->gambar
                            ? (filter_var($order->event->gambar, FILTER_VALIDATE_URL)
                                ? $order->event->gambar
                                : asset('images/events/' . $order->event->gambar))
                            : asset('assets/images/placeholder.jpg')
                        }}" alt="{{ $order->event?->judul ?? 'Event' }}"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />

                        <!-- Overlay Badge -->
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg shadow-md">
                            <span class="text-xs font-semibold text-blue-600">Event Ticket</span>
                        </div>
                    </div>

                    <!-- Event Info -->
                    <div class="space-y-3">
                        <div>
                            <h2 class="font-bold text-xl text-gray-800 mb-2">{{ $order->event?->judul ?? 'Event' }}</h2>
                            <div class="flex items-start space-x-2 text-gray-600">
                                <svg class="w-4 h-4 mt-1 flex-shrink-0 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm">{{ $order->event?->lokasi ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- Additional Info Cards -->
                        <div class="grid grid-cols-2 gap-3 mt-4">
                            <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Total Tiket</p>
                                <p class="text-lg font-bold text-gray-800">{{ $order->detailOrders->sum('jumlah') }}</p>
                            </div>
                            <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Tipe Tiket</p>
                                <p class="text-lg font-bold text-gray-800">{{ $order->detailOrders->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Details Section -->
                <div class="lg:w-3/5 p-6">
                    <!-- Section Header -->
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Rincian Pesanan</h3>
                        <p class="text-sm text-gray-500">Detail tiket yang dipesan</p>
                    </div>

                    <!-- Ticket List -->
                    <div class="space-y-3 mb-6">
                        @foreach($order->detailOrders as $d)
                        <div
                            class="bg-gradient-to-r from-blue-50 to-white rounded-xl p-4 border border-blue-100 hover:shadow-md transition-all duration-300">
                            <div class="flex justify-between items-center">
                                <div class="flex items-start space-x-3">
                                    <!-- Ticket Icon -->
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                            </path>
                                        </svg>
                                    </div>

                                    <!-- Ticket Info -->
                                    <div>
                                        <div class="font-bold text-gray-800">{{ $d->tiket->tipe }}</div>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-sm text-gray-500">Quantity:</span>
                                            <span
                                                class="text-sm font-semibold text-blue-600 bg-blue-100 px-2 py-0.5 rounded">{{ $d->jumlah }}x</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="text-right">
                                    <div class="font-bold text-lg text-gray-800">Rp
                                        {{ number_format($d->subtotal_harga, 0, ',', '.') }}</div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        @ Rp {{ number_format($d->subtotal_harga / $d->jumlah, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Divider -->
                    <div class="border-t-2 border-dashed border-gray-200 my-6"></div>

                    <!-- Total Section -->
                    <div class="bg-gradient-to-r from-green-50 to-white rounded-xl p-5 border-2 border-green-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-sm text-gray-600">Total Pembayaran</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-xs text-green-600 font-medium">Terbayar</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-bold text-2xl text-green-600">Rp
                                    {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('admin.histories.index') }}"
                            class="btn bg-gradient-to-r from-blue-500 to-blue-600 text-white border-0 hover:from-blue-600 hover:to-blue-700 shadow-md hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin>