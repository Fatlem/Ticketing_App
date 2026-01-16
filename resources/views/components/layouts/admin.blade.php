<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <div class="drawer lg:drawer-open w-full min-h-screen">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Modern Navbar -->
            <nav class="navbar bg-white shadow-md border-b border-gray-200 sticky top-0 z-40">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-4" aria-label="open sidebar"
                        class="btn btn-square btn-ghost hover:bg-gray-100 transition-colors">
                        <!-- Sidebar toggle icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </label>
                </div>

                <!-- Navbar Title/Breadcrumb -->
                <div class="flex-1 px-4">
                    <div class="flex items-center space-x-2">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center lg:hidden">
                            <span class="text-white font-bold text-sm">BK</span>
                        </div>
                        <h1 class="text-xl font-bold text-gray-800 hidden lg:block">{{ $title ?? 'Admin Dashboard' }}
                        </h1>
                        <h1 class="text-lg font-bold text-gray-800 lg:hidden">{{ $title ?? 'Dashboard' }}</h1>
                    </div>
                </div>

                <!-- Navbar Right Side -->
                <div class="flex-none">
                    <div class="flex items-center space-x-2 px-2">
                        <!-- User Info -->
                        <div class="hidden md:flex items-center space-x-3 bg-gray-50 rounded-lg px-3 py-2">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                <span
                                    class="text-white font-semibold text-sm">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name ?? 'Admin' }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </div>

                        <!-- Mobile User Avatar -->
                        <div
                            class="md:hidden w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                            <span
                                class="text-white font-semibold text-sm">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            <!-- Simple Footer -->
            <footer class="bg-white border-t border-gray-200 mt-auto">
                <div class="container mx-auto px-6 py-4">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            © {{ date('Y') }} <span class="font-semibold text-gray-800">Fatlem</span>. All
                            rights reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        @include('components.admin.sidebar')
    </div>

    {{-- Section untuk script tambahan --}}
    @stack('scripts')
</body>

</html>