@props(['active' => false, 'label' => ''])

<button {{ $attributes->merge([
  'class' => 'btn btn-sm rounded-full px-6 normal-case font-medium transition-all ' .
    ($active
      ? '!bg-blue-800 !text-white hover:!bg-blue-800'
      : 'bg-white border-blue-900 text-blue-900 hover:bg-blue-900 hover:text-white')
]) }}>
    {{ $label }}
</button>