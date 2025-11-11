<a href="{{ $url }}" {{ $attributes->merge(['class' => 'link link-'.$variant]) }} @if($variant === 'disable') disabled @endif>{{ $slot }}</a>
