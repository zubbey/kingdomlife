<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
    <div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section my-lg-5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <?php
                    $sql = "SELECT pictures FROM `media` WHERE id = 1";
                    $result = mysqli_query($conn, $sql);
                    while ($pic = mysqli_fetch_array($result)){
                        echo "<div class='img img-about align-self-stretch' style='background-image: url(".$pic['pictures']."); width: 100%;'></div>";
                    }
                ?>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <?php
                    $sql = "SELECT * FROM `pageContents` WHERE id = 1";
                    $result = mysqli_query($conn, $sql);
                    while ($contentRow = mysqli_fetch_assoc($result)) {
                        echo "<h3><strong>".$contentRow['heading']."</strong></h3>";
                        echo "<p>".$contentRow['body']."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-intro my-lg-5" id="section-counter">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-1 align-items-stretch">
                        <div class="text text-white-50">
                            <span class="text-white-50 font-weight-bold">Served Over</span>
                            <strong class="text-white-50 number" data-number="1432805">0</strong>
                            <span class="text-white-50">Children in 190 countries in the world</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-2 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4 text-white-50 font-weight-bold">Donate Money</h3>
                            <p class="text-white-50">Even the all-powerful Pointing has no control about the blind texts.</p>
                            <button class="btn-5 donatebtn">Donate Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-3 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4 text-black-50 font-weight-bold">Give Tithes</h3>
                            <p class="text-black-50">Even the all-powerful Pointing has no control about the blind texts.</p>
                            <button class="btn-5 tithebtn">Give Tithe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--DONATORS -->
<section id="body" class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">All Donations</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
    </div>

<!--        FIRST ROW-->
<div class="container">
    <div class="row content">
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/12.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html"> Chukwuma Omerain</a></h3>
                        <span class="position">Donated on 20th Nov, 2019</span>
                        <div class="text">
                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/11.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">patrick Edidi</a></h3>
                        <span class="position">Donated on 10 Jan, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">Peter Egike</a></h3>
                        <span class="position">Donated on 1'st Fab, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--        SECOND ROW-->
    <div class="row content">
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/05.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html"> Chukwuma Omerain</a></h3>
                        <span class="position">Donated on 20th Nov, 2019</span>
                        <div class="text">
                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/06.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">patrick Edidi</a></h3>
                        <span class="position">Donated on 10 Jan, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/07.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">Peter Egike</a></h3>
                        <span class="position">Donated on 1'st Fab, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--        Third Row-->
    <div class="row content">
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/12.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html"> Chukwuma Omerain</a></h3>
                        <span class="position">Donated on 20th Nov, 2019</span>
                        <div class="text">
                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">patrick Edidi</a></h3>
                        <span class="position">Donated on 10 Jan, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
                <div class="d-flex mb-4">
                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>
                    <div class="info ml-4">
                        <h3><a href="teacher-single.html">Peter Egike</a></h3>
                        <span class="position">Donated on 1'st Fab, 2020</span>
                        <div class="text">
                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <article id="pagin">
                        <nav>
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a class="" href="#">2</a></li>
                                <li><a class="" href="#">3</a></li>
                            </ul>
                        </nav>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require ("./components/footer.php");
?>
<script>

    var nombrePage = $(".content").length;

    showPage = function(pagination) {
        if (pagination < 0 || pagination >= nombrePage) return;

        $(".content").hide().eq(pagination).show();
        $("#pagin li").removeClass("active").eq(pagination).addClass("active");
    }

    // Go to Left
    $(".prev").click(function() {
        showPage($("#pagin ul .active").index() - 1);
    });

    // Go to Right
    $(".next").click(function() {
        showPage($("#pagin ul .active").index() + 1);
    });

    $("#pagin ul a").click(function(e) {
        e.preventDefault();
        showPage($(this).parent().index());
    });

    showPage(0)
</script>
