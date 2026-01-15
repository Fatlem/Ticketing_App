<x-layouts.admin title="Dashboard Admin">
    <div class="container mx-auto p-10">
        <h1 class="text-3xl font-semibold mb-4">Dashboard Admin</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
            <div class="card bg-base-100 card-sm shadow-xs p-2">
                <div class="card-body">
                    <h2 class="card-title text-md">Total Event</h2>
                    <p class="font-bold text-4xl">{{ $totalEvents ?? 0 }}</p>
                </div>
            </div>
            <div class="card bg-base-100 card-sm shadow-xs p-2">
                <div class="card-body">
                    <h2 class="card-title text-md">Kategori</h2>
                    <p class="font-bold text-4xl">{{ $totalCategories ?? 0 }}</p>
                </div>
            </div>
            <div class="card bg-base-100 card-sm shadow-xs p-2">
                <div class="card-body">
                    <h2 class="card-title text-md">Total Transaksi</h2>
                    <p class="font-bold text-4xl">{{ $totalOrders ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin>