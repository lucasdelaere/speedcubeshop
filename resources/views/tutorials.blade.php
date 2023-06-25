<x-layouts.frontend>
    <x-slot name="title">
        Tutorials
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="css/tutorials.css">
    </x-slot>

    <main class="text-white">
        <section id="sectionTutorials" class="bg-orange">
            <div class="container">
                <p class="path-style pt-3 text-white">Home &gt; Tutorials</p>
                <header class="text-center pt-3 pb-5">
                    <h2 class="fs28 fw700 text-center">Tutorials</h2>
                    <h3 class="fs20 fw500 mb-4">Learn how to solve the rubik's cube layer by layer!</h3>
                </header>

                <div class="row justify-content-center justify-content-lg-between align-items-center">
                    <article class="col-8 col-lg-3 text-center pb-5">
                        <img class="img-fluid mb-3" src="images/tutorials/solution-guide-img-2x2.png" alt="2x2">
                        <header class="mb-4">
                            <h4>2x2 Tutorial</h4>
                        </header>
                        <a href="images/tutorials/Rubiks_Solution-Guide_2x2.pdf" target="_blank" class="d-block mb-2"><button class="btn btn-black upper">download pdf</button></a>
                        <a href="https://www.youtube.com/playlist?list=PLVE0Oz4ggE92MDDj1SpDwC0vHanugJsEq" target="_blank"><button class="btn btn-black upper">watch: <i class="fa-brands fa-youtube"></i></button></a>
                    </article>
                    <article class="col-8 col-lg-3 text-center pb-5">
                        <img class="img-fluid mb-3" src="images/tutorials/solution-guide-img-3x3.png" alt="3x3">
                        <header class="mb-4">
                            <h4>3x3 Tutorial</h4>
                        </header>
                        <a href="images/tutorials/Rubiks_Solution-Guide_3x3.pdf" target="_blank" class="d-block mb-2"><button class="btn btn-black upper">download pdf</button></a>
                        <a href="https://www.youtube.com/playlist?list=PLVE0Oz4ggE92vcVuX_A-EVhCxIIvejJi4" target="_blank"><button class="btn btn-black upper">watch: <i class="fa-brands fa-youtube"></i></button></a>
                    </article>
                    <article class="col-8 col-lg-3 text-center pb-5">
                        <img class="img-fluid mb-3" src=images/tutorials/solution-guide-img-4x4.png alt="4x4">
                        <header class="mb-4">
                            <h4>4x4 Tutorial</h4>
                        </header>
                        <a href="images/tutorials/Rubiks_Solution-Guide_4x4_Master.pdf" target="_blank" class="d-block mb-2"><button class="btn btn-black upper">download pdf</button></a>
                        <a href="https://www.youtube.com/playlist?list=PLVE0Oz4ggE93IxNtZP0UTYv54gQ1-YqNI" target="_blank"><button class="btn btn-black upper">watch: <i class="fa-brands fa-youtube"></i></button></a>
                    </article>
                </div>
            </div>
        </section>

        <video muted loop autoplay playsinline id="vid">
            <source src="images/tutorials/rubiks-hero-banner.mp4" type="video/mp4">
        </video>

        <section id="sectionCompetitions" class="bg-green pb-5">
            <div class="container">
                <h2 class="fs28 fw700 text-center py-5">Ready to go? Join a competition!</h2>

                <div class="row align-items-center">
                    <div class="col-lg-1"></div>
                    <div class="col-12 col-lg-4 pb-5">
                        <h3 class="fs20 fw500 mb-4">WCA Speed Cubing Competitions</h3>
                        <p class="fs14 fw400">Discover World Cubing Association competitions hosted internationally around the world. Find one near you!</p>
                        <a class="btn btn-black text-decoration-none upper hover-orange" target="_blank" href="https://www.worldcubeassociation.org/competitions">learn more</a>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-12 col-lg-5">
                        <img class="img-fluid" src="images/tutorials/WCA-img.png" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>
