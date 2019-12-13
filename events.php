<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Latest Events</h1>
            </div>
        </div>
    </div>
</div>

<section class="event-section">
<div class="container">
    <div class="row py-5">
        <div class="col-md-12">
            <div class="row p-5 bg-white rounded mt-3">
                <div class="col-md-2">
                    <h1 class="display-4 event-date">31st<br><strong>Dec</strong></h1>
                </div>
                <a href="#" class="col-md-4 no-padding color-gray-darker c6 td-hover-none" data-target="#modalIMG" data-toggle="modal">
                    <img class="img-fluid preview-thumbnail" src="https://i.imgur.com/mjki2fC.jpg">
                </a>
                <div class="col-md-6">
                    <div class="card-block">
                        <h2 class="card-title mt-0"><strong>Prayer Storm 2019</strong></h2>
                        <p class="text-secondary mb-0">
                            <strong>Take 2020 before it comes through prayer and fasting. Join us everyday in December by 6 a.m. – 7 a.m., as we take dominion and prophesy God’s blessings into the new year. God bless you!</strong>
                        </p>
                        <p class="text-secondary">
                            Time:
                            <strong>6:00 am - 7:00 am</strong>
                        </p>
                        <p class="text-secondary">
                            Venue:
                            <strong>Jesus Cathedral</strong><br>
                            Off Market junction Oroazi Road, Mile 4 Rumueme, Port Harcourt.

                        </p>
                        <hr>
                        <div>
                            <p class="text-secondary" id="head">Countdown to Prayer Storm:</p>
                            <ul class="p-0 m-o">
                                <li class="count-day pr-4"><span id="days"></span>days</li>
                                <li class="count-day pr-4"><span id="hours"></span>Hours</li>
                                <li class="count-day pr-4"><span id="minutes"></span>Minutes</li>
                                <li class="count-day pr-4"><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row py-5">
        <div class="col-md-12">
            <div class="row p-5 bg-white rounded mt-3">
                <div class="col-md-2">
                    <h1 class="display-4 event-date">15th<br><strong>Dec</strong></h1>
                </div>
                <a href="#" class="col-md-4 no-padding color-gray-darker c6 td-hover-none" data-target="#modalIMG" data-toggle="modal">
                    <img class="img-fluid preview-thumbnail" src="https://i.imgur.com/mjki2fC.jpg">
                </a>
                <div class="col-md-6">
                    <div class="card-block">
                        <h2 class="card-title mt-0"><strong>Thanksgiving Service 2019</strong></h2>
                        <p class="text-secondary mb-0">
                            <strong>Thanksgiving is the best way to move from one phase to the other. As we move from 2019 into 2020, come and thank God not just for His mercies, blessings and faithfulness for the year 2019, but for all He has set in place for you for 2020.</strong>
                        </p>

                        <p class="text-secondary">
                            Time:
                            <strong>6:00 am - 7:00 am</strong>
                        </p>
                        <p class="text-secondary">
                            Venue:
                            <strong>Jesus Cathedral</strong><br>
                            Off Market junction Oroazi Road, Mile 4 Rumueme, Port Harcourt.
                        </p>
                        <hr>
                        <div>
                            <p class="text-secondary" id="head">Countdown to Thanksgiving Service:</p>
                            <ul class="p-0 m-o">
                                <li class="count-day pr-4"><span id="days"></span>days</li>
                                <li class="count-day pr-4"><span id="hours"></span>Hours</li>
                                <li class="count-day pr-4"><span id="minutes"></span>Minutes</li>
                                <li class="count-day pr-4"><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-md-12">
            <div class="row p-5 bg-white rounded mt-3">
                <div class="col-md-2">
                    <h1 class="display-4 event-date">1st<br><strong>Jan</strong></h1>
                </div>
                <a href="#" class="col-md-4 no-padding color-gray-darker c6 td-hover-none" data-target="#modalIMG" data-toggle="modal">
                    <img class="img-fluid preview-thumbnail" src="https://i.imgur.com/mjki2fC.jpg">
                </a>
                <div class="col-md-6">
                    <div class="card-block">
                        <h2 class="card-title mt-0"><strong>Feast of Overflow 2020</strong></h2>
                        <p class="text-secondary mb-0">
                            <strong>2020 is a year God has set out to give dominion to His children in every sphere of life. Come join us on the 1st of January as we thank God for the new year and feast into the abundance God has prepared for us in the year 2020!</strong>
                        </p>

                        <p class="text-secondary">
                            Time:
                            <strong>6:00 am - 7:00 am</strong>
                        </p>
                        <p class="text-secondary">
                            Venue:
                            <strong>Jesus Cathedral</strong><br>
                            Off Market junction Oroazi Road, Mile 4 Rumueme, Port Harcourt.
                        </p>
                        <hr>
                        <div>
                            <p class="text-secondary" id="head">Countdown to Feast of Overflow:</p>
                            <ul class="p-0 m-o">
                                <li class="count-day pr-4"><span id="days"></span>days</li>
                                <li class="count-day pr-4"><span id="hours"></span>Hours</li>
                                <li class="count-day pr-4"><span id="minutes"></span>Minutes</li>
                                <li class="count-day pr-4"><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <img src="https://i.imgur.com/mjki2fC.jpg" alt="Prayer Storm 2019" style="width:100%">
            </div>
            <div class="modal-footer justify-content-between">
                <div><a data-href='https://i.imgur.com/mjki2fC.jpg' download="Prayer-storm-flyer" onclick='forceDownload(this)' class="btn btn-primary btn-rounded btn-md ml-4 text-white text-center"><i class="fa fa-arrow-alt-circle-down"></i> Download</a></div>
                <button class="btn btn-outline-danger btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php
require ("./components/footer.php");
?>
<script>

    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date('Dec 31, 2019 00:00:00').getTime(),
        x = setInterval(function() {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            if (distance < 0) {
             clearInterval(x);
            }

        }, second);


    $( 'a a' ).remove();

    document.documentElement.setAttribute("lang", "en");
    document.documentElement.removeAttribute("class");

    axe.run( function(err, results) {
        console.log( results.violations );
    } );

    function forceDownload(link){
        var url = link.getAttribute("data-href");
        var fileName = link.getAttribute("download");
        link.innerText = "Downloadin...";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function(){
            var urlCreator = window.URL || window.webkitURL;
            var imageUrl = urlCreator.createObjectURL(this.response);
            var tag = document.createElement('a');
            tag.href = imageUrl;
            tag.download = fileName;
            document.body.appendChild(tag);
            tag.click();
            document.body.removeChild(tag);
            link.innerText="Download Image";
        };
        xhr.send();
    }

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
    if (queryParameters().give === "offering"){
        $('#offeringModal').modal('show');
    }
</script>

