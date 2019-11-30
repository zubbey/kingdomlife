<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
    <div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Online Store</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section contact-section ftco-degree-bg my-3">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All <span class="badge badge-primary badge-pill">21</span></a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" id="audio-tab" data-toggle="tab" href="#audio" role="tab" aria-controls="audio" aria-selected="true">Audio message <span class="badge badge-primary badge-pill">5</span></a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link active" id="ebook-tab" data-toggle="tab" href="#ebook" role="tab" aria-controls="ebook" aria-selected="true">Ebook <span class="badge badge-primary badge-pill">8</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other Items <span class="badge badge-primary badge-pill">0</span></a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
<!--                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">...</div>-->

                <div class="tab-pane fade show active" id="ebook" role="tabpanel" aria-labelledby="ebook-tab">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book2.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book3.jpeg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book2.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book3.jpeg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book1.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img src="images/book.jpg" alt="Product" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                VIDEO TAB-->
                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                </div>

            </div>
        </div>
    </section>
<?php
require ("./components/footer.php");
?>
<script>
    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
        var result = {};
        var params = window.location.search.split(/\?|\&/);
        params.forEach( function(it) {
            if (it) {
                var param = it.split("=");
                result[param[0]] = param[1];
            }
        });
        return result;
    }
    // if (queryParameters().tab == "audio"){
    //     $('#audio-tab')[0].click();
    // }
    // if (queryParameters().tab == "ebook"){
    //     $('#ebook-tab')[0].click();
    // }
    if (queryParameters().tab == "other"){
        $('#other-tab')[0].click();
    }
</script>
