<x-frontend.header>
    <x-slot name="title">{{ $title ?? '' }}</x-slot>
    {{ $links ?? '' }}
</x-frontend.header>

<!-- begin content -->
{{ $slot }}
<!-- end content -->

<x-frontend.footer>
    {{ $scripts ?? '' }}
</x-frontend.footer>

