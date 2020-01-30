<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="foot-about">
                        <h2><a class="foot-logo" href="/"><img class="d-block" src="https://i.imgur.com/eGgxGWK.png" height="40" alt="Kingdomlife Gospel"></a></h2>

                        <p>Kingdom Life Gospel Outreach Ministries is a dynamic commission through which God has reached and transformed the destinies of people in Nigeria, Africa and beyond since it was birthed in November 1994.</p>

                        <ul class="d-flex flex-wrap align-items-center">
                            <li><a href="https://facebook.com/klgoministries" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/klgoministries" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://instagram.com/klgoministries" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC39-qgyOK0Fxj21jW-IFX9Q" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div><!-- .foot-about -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <h2>Quick Access</h2>

                    <ul>
                        <li><a href="about">About Kingdomlife</a></li>
                        <li><a href="bulletins">Download Bulletins</a></li>
                        <li><a href="prayer-request">Prayer Request</a></li>
                        <li><a href="testimonies">Testimonies</a></li>
                        <li><a href="outreaches">Outreaches</a></li>
                        <li><a href="give">Give</a></li>
                        <li><a href="store" target="_blank">E Store</a></li>
                        <li><a href="events">Events</a></li>
                    </ul>
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="foot-latest-news">
                        <h2>Latest Outreaches</h2>

                        <ul>

                            <?php

                            $Query = "SELECT * FROM outReaches LIMIT 3";

                            if ($result = $conn->query($Query)) {

                                /* fetch associative array */
                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>";
                                    echo "<h3>".$row['heading']."</h3>";
                                    echo "<a href='#' class=\"posted-date\">Read more</a>";
                                    echo "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div><!-- .foot-latest-news -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="foot-contact">
                        <h2>Talk to Us</h2>

                        <ul>
                            <li><i class="fa fa-phone"></i><span>+234 807 299 2247</span></li>
                            <li><i class="fa fa-envelope"></i><span>kingdomlifegospelchurch@gmail.com</span></li>
                            <li><i class="fa fa-map-marker"></i><span>Jesus Cathedral No 6 Akwaka Avenue, Off Market Junction, Orazi Road, Mile 4, Rumueme, Port Harcourt.</span></li>
                        </ul>
                    </div><!-- .foot-contact -->

<!--                    <div class="subscribe-form">-->
<!--                        <form class="d-flex flex-wrap align-items-center">-->
<!--                            <input type="email" placeholder="Your email">-->
<!--                            <input type="submit" value="send">-->
<!--                        </form>-->
<!--                    </div>-->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->

    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="m-0">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a class="highlight-color" href="http://kingdomlifegospel.org" target="_blank">Kingdomlife Gospel Outreach Ministries</a></p>
                </div><!-- .col-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-bar -->
</footer><!-- .site-footer -->
<script type='text/javascript' src='config.js'></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src="js/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type='text/javascript' src="js/audio.js"></script>
<script type='text/javascript' src='js/custom.js'></script>
<script>
    $(document).ready(function() {
        var showChar = 350;
        var ellipsestext = "...";
        var moretext = "Read More";
        var lesstext = "Show less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    $(document).ready(() =>{
        // play audio when click
        $("#bigPlay").click(function () {
            // alert("you click play");
            $(".player-wrap .button > .playpause .pause").removeClass("d-none");
        });
    });
    (function(){

        $("#cart").on("click", function() {
            $(".shopping-cart").fadeToggle( "fast");
        });

    })();
</script>
</body>
</html>