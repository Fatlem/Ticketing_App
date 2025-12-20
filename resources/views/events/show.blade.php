<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6">
        <!-- Event Header -->
        <div class="card bg-base-100 shadow-xl mb-8">
            <div class="card-body">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Event Image -->
                    <div class="lg:w-1/2">
                        @php
                        // Safe image URL handling
                        if ($event->gambar && filter_var($event->gambar, FILTER_VALIDATE_URL)) {
                        $imageUrl = $event->gambar;
                        } else {
                        $imageName = (!empty($event->gambar) && file_exists(public_path('storage/' . $event->gambar))) ?
                        $event->gambar : 'konser.jpg';
                        $imageUrl = asset('storage/' . $imageName);
                        }
                        @endphp

                        <img src="{{ $imageUrl }}" alt="{{ $event->judul ?? $event->nama }}"
                            class="w-full h-96 object-cover rounded-lg shadow-md">
                    </div>

                    <!-- Event Details -->
                    <div class="lg:w-1/2">
                        <h1 class="text-4xl font-bold mb-4">{{ $event->judul ?? $event->nama }}</h1>

                        @if ($event->kategori)
                        <div class="badge badge-primary badge-lg mb-4">
                            {{ $event->kategori->nama }}
                        </div>
                        @endif

                        <div class="space-y-4 mb-6">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>
                                    @if ($event->tanggal_waktu)
                                    {{ \Carbon\Carbon::parse($event->tanggal_waktu)->locale('id')->translatedFormat('d F Y, H:i') }}
                                    @elseif ($event->tanggal)
                                    {{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('d F Y, H:i') }}
                                    @else
                                    Tanggal tidak tersedia
                                    @endif
                                </span>
                            </div>

                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $event->lokasi ?? 'Lokasi tidak tersedia' }}</span>
                            </div>
                        </div>

                        <!-- Description -->
                        @if ($event->deskripsi)
                        <div class="prose max-w-none mb-6">
                            <h3 class="text-lg font-semibold mb-2">Deskripsi Event</h3>
                            <p class="text-gray-600">{{ $event->deskripsi }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Options -->
        @if ($event->tikets && $event->tikets->count() > 0)
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Pilih Tiket</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($event->tikets as $tiket)
                    <div class="card bg-base-200 hover:bg-base-300 transition-colors duration-200">
                        <div class="card-body">
                            <h3 class="card-title text-lg">Tiket {{ ucfirst($tiket->tipe) }}</h3>

                            @if ($tiket->deskripsi)
                            <p class="text-sm text-gray-600 mb-4">{{ $tiket->deskripsi }}</p>
                            @endif

                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-primary">
                                    Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                </span>

                                @if ($tiket->stok !== null)
                                <span class="badge {{ $tiket->stok > 0 ? 'badge-success' : 'badge-error' }}">
                                    {{ $tiket->stok > 0 ? $tiket->stok . ' tersedia' : 'Habis' }}
                                </span>
                                @endif
                            </div>

                            <button
                                class="btn btn-primary w-full {{ $tiket->stok !== null && $tiket->stok <= 0 ? 'btn-disabled' : '' }}"
                                {{ $tiket->stok !== null && $tiket->stok <= 0 ? 'disabled' : '' }}>
                                @if ($tiket->stok !== null && $tiket->stok <= 0) Habis Terjual @else Beli Sekarang
                                    @endif </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body text-center">
                <h3 class="text-xl font-semibold mb-2">Tiket Tidak Tersedia</h3>
                <p class="text-gray-600">Belum ada tiket yang tersedia untuk event ini.</p>
            </div>
        </div>
        @endif

        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('home') }}" class="btn btn-outline btn-wide">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</x-app-layout>