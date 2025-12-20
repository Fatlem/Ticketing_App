<!DOCTYPE html>
<html lang="id" data-theme="winter">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'BengTix - Beli Tiket Auto Asik' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body>
    <x-navbar />
    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @if(session('success') || session('error') || session('info'))
    <div id="flash-toast" class="toast fixed top-4 right-4 z-50" aria-live="polite">
        @if(session('success'))
        <div class="alert alert-success shadow-lg">
            <div><span>{{ session('success') }}</span></div>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error shadow-lg mt-2">
            <div><span>{{ session('error') }}</span></div>
        </div>
        @endif

        @if(session('info'))
        <div class="alert alert-info shadow-lg mt-2">
            <div><span>{{ session('info') }}</span></div>
        </div>
        @endif
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const t = document.getElementById('flash-toast');
        if (!t) return;
        // hide after 4s
        setTimeout(() => {
            t.classList.add('opacity-0', 'transition', 'duration-500');
            setTimeout(() => t.remove(), 600);
        }, 4000);
    });
    </script>
    @endif
</body>

</html>