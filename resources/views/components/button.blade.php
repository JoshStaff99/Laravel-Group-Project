@props([
    'type' => 'submit',
    'variant' => 'primary', // e.g., primary, secondary, danger
    'size' => null, // e.g., sm, lg
    'disabled' => false,
])

<button 
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'btn btn-' . $variant . ($size ? ' btn-' . $size : '') . ($disabled ? ' disabled' : '')
    ]) }}
    {{ $disabled ? 'disabled' : '' }}
>
    {{ $slot }}
</button>