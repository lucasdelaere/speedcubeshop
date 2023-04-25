<x-frontend.head>
    <x-slot name="title">{{ $title }}</x-slot>
    {{ $slot }}
</x-frontend.head>

<body class="popr fw700">

<!-- begin header -->
<header id="myHeader" class="container-fluid bg-black"> <!-- bg-black op alle niet-home pagina's! -->
    <x-frontend.navbar></x-frontend.navbar>

    <x-frontend.offcanvas></x-frontend.offcanvas>
</header>
<!-- end header -->
