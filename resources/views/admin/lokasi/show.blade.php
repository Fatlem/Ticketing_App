<x-layouts.admin title="Detail Lokasi">
    <div class="container mx-auto px-6 py-8">
        
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.lokasi.index') }}" 
                   class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-gray-200 text-gray-500 hover:text-orange-600 hover:border-orange-200 hover:bg-orange-50 transition-all duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Detail Lokasi</h2>
                    <p class="text-sm text-gray-500">Informasi lengkap mengenai venue</p>
                </div>
            </div>

            <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" 
               class="hidden md:flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-amber-500 border border-transparent rounded-lg hover:bg-amber-600 focus:outline-none focus:shadow-outline-orange shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Data
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden h-80 lg:h-96 relative group">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q={{ urlencode($lokasi->nama_lokasi . ' ' . $lokasi->alamat) }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        class="absolute inset-0 w-full h-full grayscale-[20%] hover:grayscale-0 transition-all duration-500">
                    </iframe>
                    
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-semibold text-gray-600 shadow-sm border border-gray-200">
                        📍 Peta Lokasi
                    </div>
                </div>

                <div class="lg:hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                    <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" class="btn btn-block bg-amber-500 hover:bg-amber-600 text-white border-0">Edit Data</a>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden h-full">
                    <div class="p-8">
                        
                        <div class="border-b border-gray-100 pb-6 mb-6">
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $lokasi->nama_lokasi }}</h1>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Diperbarui: {{ $lokasi->updated_at->format('d F Y, H:i') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            
                            <div class="bg-orange-50 rounded-xl p-5 border border-orange-100 transition-all hover:shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 rounded-full bg-orange-200 flex items-center justify-center mr-3 text-orange-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-600">Kapasitas Maksimal</h4>
                                </div>
                                <p class="text-2xl font-bold text-gray-800 ml-11">{{ number_format($lokasi->kapasitas) }} <span class="text-sm text-gray-500 font-normal">Orang</span></p>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 transition-all hover:shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center mr-3 text-gray-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-600">Kode Sistem</h4>
                                </div>
                                <p class="text-2xl font-bold text-gray-800 ml-11">#{{ str_pad($lokasi->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Alamat Lengkap
                            </h4>
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 text-gray-700 leading-relaxed text-lg">
                                {{ $lokasi->alamat }}
                            </div>
                        </div>

                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($lokasi->nama_lokasi . ' ' . $lokasi->alamat) }}" 
                           target="_blank" 
                           class="flex items-center justify-center w-full px-6 py-4 text-white transition-all duration-300 bg-green-600 rounded-xl hover:bg-green-700 hover:shadow-lg group">
                            <svg class="w-6 h-6 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            <span class="font-semibold text-lg">Buka di Aplikasi Google Maps</span>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.admin>