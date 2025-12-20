@props([
'label',
'active' => false,
])

@php
$classes = 'px-3 py-1 rounded-full text-sm border transition';
$classes .= $active
? ' bg-blue-900 text-white border-blue-900'
: ' bg-white text-blue-900 border-blue-900 hover:bg-blue-50';
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>{{ $label }}</span>