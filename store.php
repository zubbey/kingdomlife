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
                <li class="nav-item">
                    <a class="nav-link active" id="audio-tab" data-toggle="tab" href="#audio" role="tab" aria-controls="audio" aria-selected="true">Audio message <span class="badge badge-primary badge-pill">5</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ebook-tab" data-toggle="tab" href="#ebook" role="tab" aria-controls="ebook" aria-selected="false">Ebook <span class="badge badge-primary badge-pill">8</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video <span class="badge badge-primary badge-pill">10</span></a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
<!--                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">...</div>-->
                <div class="tab-pane fade show active" id="audio" role="tabpanel" aria-labelledby="audio-tab">
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td><img src="images/audio1.jpg" width="40px" /> </td>
                                            <td>Satellite Church Opening Form</td>
                                            <td class="text-right">21 hours ago</td>
                                            <td class="text-right"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-alt-circle-down"></i> </button> </td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/audio2.jpg" width="40px" /> </td>
                                            <td>HomeCell Manual in FRENCH for 19th November, 2019 </td>
                                            <td class="text-right">3 month ago</td>
                                            <td class="text-right"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-alt-circle-down"></i> </td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/audio3.png" width="40px" /> </td>
                                            <td>Leading Lights Welcome Booklet</td>
                                            <td class="text-right">1 year ago</td>
                                            <td class="text-right"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-alt-circle-down"></i></td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/audio2.jpg" width="40px" /> </td>
                                            <td>Leading Lights Welcome Booklet</td>
                                            <td class="text-right">1 year ago</td>
                                            <td class="text-right"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-alt-circle-down"></i></td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/audio1.jpg" width="40px" /> </td>
                                            <td>Leading Lights Welcome Booklet</td>
                                            <td class="text-right">1 year ago</td>
                                            <td class="text-right"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-alt-circle-down"></i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ebook" role="tabpanel" aria-labelledby="ebook-tab">
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
                <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo2.jpeg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo2.jpeg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo.jpg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card product_item">
                                    <div class="body">
                                        <div class="cp_img">
                                            <img src="images/productvideo2.jpeg" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="ec-product-detail.html">Wood Simple Clock</a></h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="old_price text-muted">Two day ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    if (queryParameters().tab == "audio"){
        $('#audio-tab')[0].click();
    }
    if (queryParameters().tab == "ebook"){
        $('#ebook-tab')[0].click();
    }
    if (queryParameters().tab == "video"){
        $('#video-tab')[0].click();
    }
</script>
