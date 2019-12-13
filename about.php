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
                <div class="col-md-4 ftco-animate">
                    <?php
                        $sql = "SELECT `file` FROM `pictures` WHERE id = 1";
                        $result = mysqli_query($conn, $sql);
                        while ($pic = mysqli_fetch_array($result)){
                            echo "<div class='img img-about align-self-stretch' style='background-image: url(".$pic['file']."); width: 100%;'></div>";
                        }
                    ?>
                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Outreaches</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled mb-0">
                                        <?php
                                        $sql = "SELECT * FROM outReaches";

                                        if ($result = $conn->query($sql)) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li><a href='outreaches.php#".$row["id"]."' class='list-group-item'>" . $row['heading'] . "</a></li>";
                                            }
                                        }
                                        $result->close();
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 pl-md-5 ftco-animate">
                    <?php
                    $sql = "SELECT * FROM `pageContents` WHERE id = 1";
                    $result = mysqli_query($conn, $sql);
                    while ($contentRow = mysqli_fetch_assoc($result)) {
                        echo "<h2><strong>".$contentRow['heading']."</strong></h2>";
                        echo "<p>".nl2br($contentRow['body'])."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-intro my-lg-5" id="section-counter">
    </section>

    <!--DONATORS -->
<!--<section id="body" class="ftco-section">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center mb-5 pb-3">-->
<!--            <div class="col-md-7 heading-section ftco-animate text-center">-->
<!--                <h2 class="mb-4">All Donations</h2>-->
<!--                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--<!--        FIRST ROW-->-->
<!--<div class="container">-->
<!--    <div class="row content">-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/12.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#"> Chukwuma Omerain</a></h3>-->
<!--                        <span class="position">Donated on 20th Nov, 2019</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/11.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">patrick Edidi</a></h3>-->
<!--                        <span class="position">Donated on 10 Jan, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">Peter Egike</a></h3>-->
<!--                        <span class="position">Donated on 1'st Fab, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--<!--        SECOND ROW-->-->
<!--    <div class="row content">-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/05.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#"> Chukwuma Omerain</a></h3>-->
<!--                        <span class="position">Donated on 20th Nov, 2019</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/06.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">patrick Edidi</a></h3>-->
<!--                        <span class="position">Donated on 10 Jan, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/07.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">Peter Egike</a></h3>-->
<!--                        <span class="position">Donated on 1'st Fab, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--<!--        Third Row-->-->
<!--    <div class="row content">-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/12.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#"> Chukwuma Omerain</a></h3>-->
<!--                        <span class="position">Donated on 20th Nov, 2019</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br> <span>&#8358;450,000</span> for <a href="#">Children Needs Food</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">patrick Edidi</a></h3>-->
<!--                        <span class="position">Donated on 10 Jan, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;5,000,000</span> for <a href="#">Back to School</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">-->
<!--            <div class="staff">-->
<!--                <div class="d-flex mb-4">-->
<!--                    <div class="img" style="background-image: url(images/profile/10.jpg);"></div>-->
<!--                    <div class="info ml-4">-->
<!--                        <h3><a href="#">Peter Egike</a></h3>-->
<!--                        <span class="position">Donated on 1'st Fab, 2020</span>-->
<!--                        <div class="text">-->
<!--                            <p>Donated <br>  <span>&#8358;1,200,000</span> for <a href="#">Help Mama campaign</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!--        <div class="row mt-5">-->
<!--            <div class="col text-center">-->
<!--                <div class="block-27">-->
<!--                    <article id="pagin">-->
<!--                        <nav>-->
<!--                            <ul>-->
<!--                                <li class="active"><a href="#">1</a></li>-->
<!--                                <li><a class="" href="#">2</a></li>-->
<!--                                <li><a class="" href="#">3</a></li>-->
<!--                            </ul>-->
<!--                        </nav>-->
<!--                    </article>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
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
