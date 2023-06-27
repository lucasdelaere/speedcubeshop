<x-layouts.frontend>
    <x-slot name="title">
        Cart
    </x-slot>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    </x-slot>

    <main class="container">
        <p class="path-style py-3">Home &gt; Contact</p>

        <section id="contactSection" class="row mb-5">
            <div class="col-12 col-lg-4">
                <h1>GET IN TOUCH</h1>
                <p>MONDAY &dash; FRIDAY <span class="fw400">&verbar; 9AM &dash; 5PM PST</span></p>
                <div class="d-flex align-items-center mb-4">
                    <img src="images/contact/location_icon.svg" alt="location icon" id="locationIcon">
                    <a href="https://www.google.com/maps/place/SpeedCubeShop/@36.2380845,-115.1088241,17z/data=!3m1!4b1!4m5!3m4!1s0x80ea403682178671:0x76adb8485c06cfac!8m2!3d36.2380845!4d-115.1066354" target="_blank" class="text-decoration-none" id="location">3101 E Craig Rd, North Las Vegas, NV 89030</a>
                </div>
                <article>
                    <div class="d-flex">
                        <img src="" alt="">
                        <h3 class="fw900"><i class="fa-solid fa-circle-question"></i> HELP CENTER</h3>
                    </div>
                    <p class="p-style">Quick answers to our most common questions</p>
                </article>
                <article>
                    <div class="d-flex">
                        <img src="" alt="">
                        <h3 class="fw900"><i class="fa-solid fa-comments "></i> CHAT</h3>
                    </div>
                    <p class="p-style">Chat with us live when we are online.</p>
                </article>
                <article>
                    <div class="d-flex">
                        <img src="" alt="">
                        <h3 class="fw900"><i class="fa-solid fa-phone-volume"></i> CALL</h3>
                    </div>
                    <p class="p-style"><a href="tel:+18448282464">Give us a call</a> during business hours, we are ready to assist.</p>
                </article>
                <article>
                    <div class="d-flex">
                        <img src="" alt="">
                        <h3 class="fw900"><i class="fa-solid fa-envelope"></i> EMAIL</h3>
                    </div>
                    <p class="p-style">Fill out the form or e-mail us at <a href="mailto:service@speedcubeshop.com">service@speedcubeshop.com</a>. We will get back to you within 24 hours.</p>
                </article>
            </div>

            <form class="col-12 col-lg-8" id="emailForm">
                <div class="mb-3">
                    <label for="fullName" class="mb-2">Full Name <span>&ast;</span></label>
                    <input type="text" id="fullName" class="form-control p-3" placeholder="Full name">
                </div>
                <div class="mb-3">
                    <!-- example van invalid input -->
                    <label for="emailAddress" class="mb-2">Email <span>&ast;</span></label>
                    <input type="email" placeholder="your@email.com" class="form-control is-invalid p-3" id="emailAddress">
                    <p class="invalid-feedback">
                        Enter a valid email
                    </p>
                </div>
                <div class="mb-3">
                    <label for="subject" class="mb-2">Subject <span>&ast;</span></label>
                    <select name="" id="subject" class="form-select p-3">
                        <option value="" selected disabled>Select a subject</option>
                        <option value="">Track Order</option>
                        <option value="">Report Issue</option>
                        <option value="">Return Order</option>
                        <option value="">Cancel Order</option>
                        <option value="">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message" class="mb-2">Message <span>&ast;</span></label>
                    <textarea name="" id="message" class="form-control" placeholder="Write your message" rows="5"></textarea>
                </div>
                <div class="mb-5">
                    <button type="button" class="btn btn-light w-100" onclick="document.querySelector('#file').click()">
                        <input type="file" id="file" class="d-none"><i class="bi bi-paperclip"></i> Attach Files
                        <label for="file"></label>
                    </button>
                    <p class="form-text">Attach up to 10 files. Max file size: 10MB.</p>
                </div>
                <button class="btn btn-dark w-100" type="submit">Send</button>

            </form>

        </section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3218.058020960264!2d-115.1066354!3d36.2380845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80ea403682178671%3A0x76adb8485c06cfac!2sSpeedCubeShop!5e0!3m2!1snl!2sbe!4v1673141051590!5m2!1snl!2sbe" width="100%" height="450" class="mb-4" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </main>

</x-layouts.frontend>
