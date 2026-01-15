<x-layouts.admin title="History Pembelian">
    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">History Pembelian</h1>
        </div>
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Event</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($histories as $index => $history)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $history->user->name }}</td>
                        <td>{{ $history->event?->judul ?? '-' }}</td>
                        <td>{{ $history->created_at->format('d M Y') }}</td>
                        <td>{{ number_format($history->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.histories.show', $history->id) }}"
                                class="btn btn-sm btn-info text-white">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada history pembelian tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>