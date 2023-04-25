<x-backend.head>

</x-backend.head>

<!-- Page Wrapper -->
<div id="wrapper">


    <x-backend.sidebar></x-backend.sidebar>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <x-backend.topbar></x-backend.topbar>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <x-page-heading title="Backend" buttonText="Generate Report" buttonUrl="/custom"></x-page-heading>

                <!-- Cards -->
                <x-backend.cards></x-backend.cards>
                <!-- Content -->
                {{ $slot }}

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

<x-backend.footer>

</x-backend.footer>
