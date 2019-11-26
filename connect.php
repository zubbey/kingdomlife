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
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
            <div class="col-md-3">
                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
            <div class="col-md-3">
                <p><span>Email:</span> <a href="mailto:info@kingdomlifegospel.org">info@kingdomlifegospel.org</a></p>
            </div>
        </div>
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