@props([
'title',
'date',
'location',
'price',
'image',
'href' => null,
])

@php
// Format Indonesian price
$formattedPrice = $price
? 'Rp ' . number_format($price, 0, ',', '.')
: 'Harga tidak tersedia';

// Format Indonesian date
$formattedDate = $date
? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
: 'Tanggal tidak tersedia';

// Safe image URL: use external URL if provided, otherwise use storage URL
if ($image && filter_var($image, FILTER_VALIDATE_URL)) {
$imageUrl = $image;
} else {
// Use provided image if it exists and file is found, otherwise use default
$imageName = (!empty($image) && file_exists(public_path('storage/' . $image))) ? $image : 'konser.jpg';
$imageUrl = asset('storage/' . $imageName);
}
@endphp

<a href="{{ $href ?? '#' }}" class="block">
    <div class="card bg-base-100 h-96 shadow-sm hover:shadow-md transition-shadow duration-300">
        <figure>
            <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-48 object-cover" loading="lazy" />
        </figure>

        <div class="card-body">
            <h2 class="card-title">
                {{ $title }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ $formattedDate }}
            </p>

            <p class="text-sm">
                📍 {{ $location }}
            </p>

            <p class="font-bold text-lg mt-2">
                {{ $formattedPrice }}
            </p>

        </div>
    </div>
</a>