<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
require_once("./components/youtube.php");
?>
<div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Media</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section ftco-degree-bg my-3">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="picture-tab" data-toggle="tab" href="#picture" role="tab" aria-controls="picture" aria-selected="true">Latest Pictures <span class="badge badge-primary badge-pill">5</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video <span class="badge badge-primary badge-pill">8</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="audio-tab" data-toggle="tab" href="#audio" role="tab" aria-controls="audio" aria-selected="false">Audio Messages<span class="badge badge-primary badge-pill">8</span></a>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="picture" role="tabpanel" aria-labelledby="picture-tab">
                <section class="ftco-section ftco-gallery">
                    <div class="container">
                        <div class="d-md-flex">
                            <a href="https://i.imgur.com/46EPoqu.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/46EPoqu.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/dOmxT16.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/dOmxT16.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/59nWr5j.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/59nWr5j.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/UpHBv5j.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/UpHBv5j.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-md-flex">
                            <a href="https://i.imgur.com/xcsCbgx.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/xcsCbgx.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/n3SgnhX.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/n3SgnhX.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/nlGnXqT.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/nlGnXqT.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/t56kVk6.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/t56kVk6.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-md-flex">
                            <a href="https://i.imgur.com/2exSZLc.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/2exSZLc.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/BnzrknA.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/BnzrknA.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/NRnkQh6.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/NRnkQh6.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                            <a href="https://i.imgur.com/zvKKXd5.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(https://i.imgur.com/zvKKXd5.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
<!--                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">-->
                <div class="container">
                    <div class="row clearfix">
                        <?php
                            foreach($videoList->items as $item){
                                //Embed video
                                if(isset($item->id->videoId)){
                                    echo '
                                    <div class="col m-auto">
                                        <div class="card">
                                            <div class="card-body m-auto youtube-video mb-3" style="width: 320px; height: 100%">
                                                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                                                <div class="card-title"><h5>'. $item->snippet->title .'</h5></div>
                                                <p class="card-text">'. $item->snippet->publishedAt .'</p>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="audio" role="tabpanel" aria-labelledby="audio-tab">
                <div class="container mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div id="mep_0" class="mejs-container mejs-container-keyboard-inactive wp-audio-shortcode mejs-audio" tabindex="0" role="application" aria-label="Audio Player" style="width: 681.047px; height: 40px; min-width: 240px;"><div class="mejs-inner"><div class="mejs-mediaelement"><mediaelementwrapper id="audio-30766-1"><audio class="wp-audio-shortcode" id="audio-30766-1_html5" preload="none" style="width: 100%; height: 100%;" src="https://allnaijaentertainment.com/wp-content/uploads/2018/11/Michael_Jackson_Earth_Song-_-AllNaijaEntertainment.com_.mp3?_=1"><source type="audio/mpeg" src="https://allnaijaentertainment.com/wp-content/uploads/2018/11/Michael_Jackson_Earth_Song-_-AllNaijaEntertainment.com_.mp3?_=1"><a href="https://allnaijaentertainment.com/wp-content/uploads/2018/11/Michael_Jackson_Earth_Song-_-AllNaijaEntertainment.com_.mp3">https://allnaijaentertainment.com/wp-content/uploads/2018/11/Michael_Jackson_Earth_Song-_-AllNaijaEntertainment.com_.mp3</a></audio></mediaelementwrapper></div><div class="mejs-layers"><div class="mejs-poster mejs-layer" style="display: none; width: 100%; height: 100%;"></div></div><div class="mejs-controls"><div class="mejs-button mejs-playpause-button mejs-play"><button type="button" aria-controls="mep_0" title="Play" aria-label="Play" tabindex="0"></button></div><div class="mejs-time mejs-currenttime-container" role="timer" aria-live="off"><span class="mejs-currenttime">00:00</span></div><div class="mejs-time-rail"><span class="mejs-time-total mejs-time-slider" role="slider" tabindex="0" aria-label="Time Slider" aria-valuemin="0" aria-valuemax="NaN" aria-valuenow="0" aria-valuetext="00:00"><span class="mejs-time-buffering" style="display: none;"></span><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-hovered no-hover"></span><span class="mejs-time-handle"><span class="mejs-time-handle-content"></span></span><span class="mejs-time-float" style="display: none; left: 0px;"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div><div class="mejs-time mejs-duration-container"><span class="mejs-duration">00:00</span></div><div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="mep_0" title="Mute" aria-label="Mute" tabindex="0"></button></div><a class="mejs-horizontal-volume-slider" href="javascript:void(0);" aria-label="Volume Slider" aria-valuemin="0" aria-valuemax="100" role="slider"><span class="mejs-offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span><div class="mejs-horizontal-volume-total"><div class="mejs-horizontal-volume-current" style="left: 0px; width: 100%;"></div><div class="mejs-horizontal-volume-handle" style="left: 100%;"></div></div></a></div></div></div>
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
    if (queryParameters().tab === "picture"){
        $('#picture-tab')[0].click();
    }
    if (queryParameters().tab === "video"){
        $('#video-tab')[0].click();
    }
    if (queryParameters().tab === "audio"){
        $('#audio-tab')[0].click();
    }

</script>