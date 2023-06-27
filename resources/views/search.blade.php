<x-layouts.frontend>
    <x-slot name="title">
        Product
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    </x-slot>


    <main class="container">
        <p class="path-style py-3">Home &gt; Search</p>
        <header class="mb-5">
            <h1 class="fw400 upper">your search for <span class="fw900">"{{$search}}"</span> revealed the following:</h1>
        </header>


        <livewire:search-products :search="$search"></livewire:search-products>


    </main>

</x-layouts.frontend>
