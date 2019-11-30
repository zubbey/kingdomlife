<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Connect With Us</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        <div class="row d-flex mt-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">Contact Information</h2>
                <p>
                    Kingdom Life Gospel Outreach Ministries
                    Jesus Cathedral
                </p>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <p><span>LOCATION:</span> Jesus Cathedral No 6 Akwaka Avenue, Off Market Junction,  Orazi Road, Mile 4, Rumueme, Port Harcourt.
                </p>
                <p><span>OUR BRANCHES:</span>
                <div class="d-flex justify-content-between ">
                    <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Bayelsa Branch) @  No 22 Hon. Ofoni Crescent, off old assembly quarters, Azikoro road, Ekeki, Yenegoa.</p>
                    <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Owerri Branch) @ No 1 Tetlow road behind UBA bank road, Owerri, Imo state.</p>
                    <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Akpajo Branch) @ Caywood Brown Foundation, Plot B9 Close B, IPIC Estate, Off Green Village Estate, Akpajo, Port Harcourt).</p>
                </div>
                </p>
            </div>
        </div>
        <div class="row d-flex my-5 contact-info">
            <div class="col-md-3">
                <p><span>Phone:</span> <br>
                    <a href="tel://+2348072992247">+234 807 299 2247</a><br>
                    <a href="tel://+2348072992247">+234 807 299 2248</a><br>
                    <a href="tel://+2348072992247">+234 803 309 6872</a>
                </p>
            </div>
            <div class="col-md-3">
                <p><span>Email:</span><br>
                    <a href="mailto:kingdomlifegospelchurch@gmail.com">kingdomlifegospelchurch@gmail.com </a><br>
                    <a href="mailto:vuzosike@yahoo.com">vuzosike@yahoo.com</a></p>
            </div>
        </div>
        <hr>
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <h4 class="mb-4">Do you have any questions?</h4>
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="send" type="submit" class="btn-5 alldonorbtn">Send message <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>

            </div>

            <div class="col-md-6  pr-md-5">
                <h4 class="mb-4">Come visit us today</h4>
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
<?php
require ("./components/footer.php");
?>