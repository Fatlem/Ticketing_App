<x-layouts.admin title="Tambah Lokasi">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">Tambah Lokasi Baru</h2>
    
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('admin.lokasi.store') }}" method="POST">
                @csrf
                
                <label class="block text-sm">
                    <span class="text-gray-700">Nama Lokasi</span>
                    <input class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" 
                           name="nama_lokasi" required placeholder="Contoh: Stadion Gelora" value="{{ old('nama_lokasi') }}">
                    @error('nama_lokasi') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                </label>
    
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">Kapasitas (Orang)</span>
                    <input type="number" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" 
                           name="kapasitas" placeholder="Contoh: 5000" value="{{ old('kapasitas') }}">
                </label>
    
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">Alamat Lengkap</span>
                    <textarea class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-textarea" 
                              rows="3" name="alamat" required placeholder="Alamat lokasi event...">{{ old('alamat') }}</textarea>
                    @error('alamat') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                </label>
    
                <div class="mt-6 flex gap-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        Simpan Lokasi
                    </button>
                    <a href="{{ route('admin.lokasi.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg hover:bg-gray-400 focus:outline-none">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>