<x-layouts.admin title="Manajemen Event">
    @if (session('success'))
    <div class="toast toast-bottom toast-center z-50">
        <div class="alert alert-success shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>

    <script>
    setTimeout(() => {
        document.querySelector('.toast')?.remove()
    }, 3000)
    </script>
    @endif

    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Manajemen Event
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola semua event Anda</p>
                    </div>
                </div>

                <!-- Add Button -->
                <a href="{{ route('admin.events.create') }}"
                    class="btn bg-gradient-to-r from-blue-500 to-blue-600 text-white border-0 hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-xl transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Event
                </a>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-full mt-6 opacity-20"></div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Table Header with gradient -->
            <div class="bg-gradient-to-r from-blue-50 to-white px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Event</h2>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($events) }} event</p>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-gray-600 font-semibold">No</th>
                            <th class="text-gray-600 font-semibold w-1/3">Judul</th>
                            <th class="text-gray-600 font-semibold">Kategori</th>
                            <th class="text-gray-600 font-semibold">Tanggal</th>
                            <th class="text-gray-600 font-semibold">Lokasi</th>
                            <th class="text-gray-600 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $index => $event)
                        <tr class="hover:bg-blue-50/50 transition-colors">
                            <th class="text-gray-600">{{ $index + 1 }}</th>
                            <td class="font-medium text-gray-800">{{ $event->judul }}</td>
                            <td>
                                <span class="badge badge-sm bg-green-100 text-green-700 border-green-200">
                                    {{ $event->kategori->nama }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-sm">{{ \Carbon\Carbon::parse($event->tanggal_waktu)->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ Str::limit($event->lokasi, 20) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.events.show', $event->id) }}"
                                        class="btn btn-sm bg-cyan-500 hover:bg-cyan-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                        class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>
                                    <button
                                        class="btn btn-sm bg-red-500 hover:bg-red-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300"
                                        onclick="openDeleteModal(this)" data-id="{{ $event->id }}">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-12">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada event tersedia</p>
                                    <p class="text-sm mt-1">Klik tombol "Tambah Event" untuk membuat event baru</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST">
                @csrf
                @method('DELETE')

                <input type="hidden" name="event_id" id="delete_event_id">

                <!-- Modal Header -->
                <div class="flex items-center space-x-3 mb-6">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Hapus Event</h3>
                </div>

                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus event ini? Tindakan ini tidak dapat
                    dibatalkan.</p>

                <div class="modal-action">
                    <button
                        class="btn bg-gradient-to-r from-red-500 to-red-600 text-white border-0 hover:from-red-600 hover:to-red-700"
                        type="submit">
                        Ya, Hapus
                    </button>
                    <button class="btn btn-ghost" onclick="delete_modal.close()" type="button">Batal</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
    function openDeleteModal(button) {
        const id = button.dataset.id;
        const form = document.querySelector('#delete_modal form');
        document.getElementById("delete_event_id").value = id;

        // Set action dengan parameter ID
        form.action = `/admin/events/${id}`

        delete_modal.showModal();
    }
    </script>

</x-layouts.admin>