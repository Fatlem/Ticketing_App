<x-layouts.admin title="History Pembelian">
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            History Pembelian
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Riwayat transaksi pembelian tiket</p>
                    </div>
                </div>

                <!-- Stats Badge -->
                <div
                    class="hidden md:flex items-center space-x-3 bg-white rounded-lg px-4 py-2 shadow-sm border border-gray-100">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 leading-tight">Total Transaksi</p>
                        <p class="text-sm font-semibold text-gray-700">{{ count($histories) }}</p>
                    </div>
                </div>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Table Header with gradient -->
            <div class="bg-gradient-to-r from-purple-50 to-white px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Transaksi</h2>
                        <p class="text-sm text-gray-500 mt-1">Semua riwayat pembelian tiket event</p>
                    </div>
                    <!-- Filter/Search bisa ditambahkan di sini jika perlu -->
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-gray-600 font-semibold">No</th>
                            <th class="text-gray-600 font-semibold">Nama Pembeli</th>
                            <th class="text-gray-600 font-semibold">Event</th>
                            <th class="text-gray-600 font-semibold">Tanggal Pembelian</th>
                            <th class="text-gray-600 font-semibold">Total Harga</th>
                            <th class="text-gray-600 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $index => $history)
                        <tr class="hover:bg-purple-50/50 transition-colors">
                            <th class="text-gray-600">{{ $index + 1 }}</th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                        {{ strtoupper(substr($history->user->name, 0, 1)) }}
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $history->user->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="font-medium text-gray-800">{{ $history->event?->judul ?? '-' }}</span>
                            </td>
                            <td>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>{{ $history->created_at->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="font-bold text-green-600">Rp
                                    {{ number_format($history->total_harga, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    <a href="{{ route('admin.histories.show', $history->id) }}"
                                        class="btn btn-sm bg-gradient-to-r from-purple-500 to-purple-600 text-white border-0 hover:from-purple-600 hover:to-purple-700 shadow-sm hover:shadow-md transition-all duration-300">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-12">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada history pembelian tersedia</p>
                                    <p class="text-sm mt-1">Belum ada transaksi yang tercatat dalam sistem</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination atau Footer bisa ditambahkan di sini jika perlu -->
        </div>
    </div>
</x-layouts.admin>