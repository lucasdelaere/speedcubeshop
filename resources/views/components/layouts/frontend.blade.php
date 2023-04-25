<x-frontend.header>
    <x-slot name="title">{{ $title }}</x-slot>
    {{ $links ?? '' }}
</x-frontend.header>

{{ $slot }}

<x-frontend.footer>
    {{ $scripts ?? '' }}
</x-frontend.footer>

