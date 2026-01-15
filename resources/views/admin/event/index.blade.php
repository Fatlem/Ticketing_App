<x-layouts.admin title="Manajemen Event">
    @if (session('success'))
    <div class="toast toast-bottom toast-center">
        <div class="alert alert-success">
            <span>{{ session('success') }}</span>
        </div>
    </div>

    <script>
    setTimeout(() => {
        document.querySelector('.toast')?.remove()
    }, 3000)
    </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">Manajemen Event</h1>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary ml-auto">Tambah Event</a>
        </div>
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-1/3">Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $index => $event)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $event->judul }}</td>
                        <td>{{ $event->kategori->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->tanggal_waktu)->format('d M Y') }}</td>
                        <td>{{ $event->lokasi }}</td>
                        <td>
                            <a href="{{ route('admin.events.show', $event->id) }}"
                                class="btn btn-sm btn-info mr-2">Detail</a>
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                                class="btn btn-sm btn-primary mr-2">Edit</a>
                            <button class="btn btn-sm bg-red-500 text-white" onclick="openDeleteModal(this)"
                                data-id="{{ $event->id }}">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada event tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <input type="hidden" name="event_id" id="delete_event_id">

            <h3 class="text-lg font-bold mb-4">Hapus Event</h3>
            <p>Apakah Anda yakin ingin menghapus event ini?</p>
            <div class="modal-action">
                <button class="btn btn-primary" type="submit">Hapus</button>
                <button class="btn" onclick="delete_modal.close()" type="reset">Batal</button>
            </div>
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