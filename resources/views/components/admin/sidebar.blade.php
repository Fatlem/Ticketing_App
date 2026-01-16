<div class="drawer-side is-drawer-close:overflow-visible">
    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
    <div
        class="flex min-h-full flex-col items-start bg-gradient-to-b from-gray-900 to-gray-800 w-64 is-drawer-close:w-14 is-drawer-open:w-80 shadow-2xl">

        <!-- Logo Section -->
        <div class="w-full flex items-center justify-center p-6 border-b border-gray-700/50">
            <div class="relative">
                <img src="{{ asset('assets/images/logo_bengkod.png') }}" alt="Logo" class="w-24 h-auto object-contain">
                <!-- Glow effect -->
                <div class="absolute inset-0 bg-blue-500/10 blur-xl rounded-full is-drawer-close:hidden"></div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="menu w-full grow gap-2 p-4">
            <!-- Dashboard Item -->
            <li class="relative group">
                <a href="{{ route('admin.dashboard') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:bg-gray-700/50' }} rounded-xl transition-all duration-300"
                    data-tip="Dashboard">
                    <!-- Home icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75" />
                    </svg>
                    <span class="is-drawer-close:hidden font-medium">Dashboard</span>

                    <!-- Active indicator -->
                    @if(request()->routeIs('admin.dashboard'))
                    <div
                        class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-white rounded-r-full is-drawer-close:hidden">
                    </div>
                    @endif
                </a>
            </li>

            <!-- Kategori item -->
            <li class="relative group">
                <a href="{{ route('admin.categories.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/50' : 'text-gray-300 hover:bg-gray-700/50' }} rounded-xl transition-all duration-300"
                    data-tip="Kategori">
                    <!-- icon Kategori -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                    </svg>
                    <span class="is-drawer-close:hidden font-medium">Manajemen Kategori</span>

                    <!-- Active indicator -->
                    @if(request()->routeIs('admin.categories.*'))
                    <div
                        class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-white rounded-r-full is-drawer-close:hidden">
                    </div>
                    @endif
                </a>
            </li>

            <!-- Event item -->
            <li class="relative group">
                <a href="{{ route('admin.events.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->routeIs('admin.events.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:bg-gray-700/50' }} rounded-xl transition-all duration-300"
                    data-tip="Event">
                    <!-- icon Event -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3a2 2 0 0 0 0-4V7a2 2 0 0 1 2-2" />
                    </svg>
                    <span class="is-drawer-close:hidden font-medium">Manajemen Event</span>

                    <!-- Active indicator -->
                    @if(request()->routeIs('admin.events.*'))
                    <div
                        class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-white rounded-r-full is-drawer-close:hidden">
                    </div>
                    @endif
                </a>
            </li>

            <!-- History item -->
            <li class="relative group">
                <a href="{{ route('admin.histories.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->routeIs('admin.histories.*') ? 'bg-gradient-to-r from-purple-600 to-purple-700 text-white shadow-lg shadow-purple-500/50' : 'text-gray-300 hover:bg-gray-700/50' }} rounded-xl transition-all duration-300"
                    data-tip="History">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span class="is-drawer-close:hidden font-medium">History Pembelian</span>

                    <!-- Active indicator -->
                    @if(request()->routeIs('admin.histories.*'))
                    <div
                        class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-white rounded-r-full is-drawer-close:hidden">
                    </div>
                    @endif
                </a>
            </li>
        </ul>

        <!-- Logout Section -->
        <div class="w-full p-4 border-t border-gray-700/50">
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="btn bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white border-0 w-full is-drawer-close:tooltip is-drawer-close:tooltip-right shadow-lg hover:shadow-xl transition-all duration-300 group"
                    data-tip="Logout">
                    <!-- Logout icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="group-hover:scale-110 transition-transform duration-300">
                        <path fill="currentColor"
                            d="M5 21q-.825 0-1.413-.587T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5z" />
                    </svg>
                    <span class="is-drawer-close:hidden font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>