<button {{ $attributes->merge(['class' => 'button button-'.$variant]) }} @if($variant === 'disable') disabled @endif>
    {{ $slot }}
</button>