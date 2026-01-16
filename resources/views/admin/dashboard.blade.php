<x-layouts.admin title="Dashboard Admin">
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Dashboard
                        </h1>
                        <p class="text-sm text-gray-500 mt-1 flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                            Ringkasan data platform Anda
                        </p>
                    </div>
                </div>

                <!-- Right Side - Date/Time Info -->
                <div
                    class="hidden md:flex items-center space-x-3 bg-white rounded-lg px-4 py-2 shadow-sm border border-gray-100">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 leading-tight">Hari ini</p>
                        <p class="text-sm font-semibold text-gray-700">{{ date('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Total Event -->
            <div
                class="relative bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-md border border-blue-100 p-6 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <!-- Background Pattern -->
                <div
                    class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-100 rounded-full opacity-20 group-hover:scale-110 transition-transform duration-300">
                </div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-blue-50 rounded-full opacity-30"></div>

                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-2">Total Event</p>
                        <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalEvents ?? 0 }}</h3>
                        <span class="text-xs text-green-600 font-medium">
                            <span class="inline-block mr-1">↗</span> Active
                        </span>
                    </div>
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 2: Kategori -->
            <div
                class="relative bg-gradient-to-br from-green-50 to-white rounded-xl shadow-md border border-green-100 p-6 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <!-- Background Pattern -->
                <div
                    class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-100 rounded-full opacity-20 group-hover:scale-110 transition-transform duration-300">
                </div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-green-50 rounded-full opacity-30"></div>

                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-2">Kategori</p>
                        <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalCategories ?? 0 }}</h3>
                        <span class="text-xs text-gray-500 font-medium">
                            <span class="inline-block mr-1">●</span> Categories
                        </span>
                    </div>
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 3: Total Transaksi -->
            <div
                class="relative bg-gradient-to-br from-purple-50 to-white rounded-xl shadow-md border border-purple-100 p-6 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <!-- Background Pattern -->
                <div
                    class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-100 rounded-full opacity-20 group-hover:scale-110 transition-transform duration-300">
                </div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-purple-50 rounded-full opacity-30"></div>

                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-2">Total Transaksi</p>
                        <h3 class="text-4xl font-bold text-gray-900 mb-1">{{ $totalOrders ?? 0 }}</h3>
                        <span class="text-xs text-blue-600 font-medium">
                            <span class="inline-block mr-1">↗</span> Completed
                        </span>
                    </div>
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>