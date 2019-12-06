<section class="ftco-counter ftco-intro mb-lg-5" id="section-counter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 counter-wrap ftco-animate shadow rounded">
                <a href="outreaches" class="nav-link bg-white p-3 position-absolute">View More Outreaches</a>
                <img class="card-img-top homecard" src="https://i.imgur.com/mV1ZMC9.jpg" alt="Outreaches">
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate shadow rounded">
                <div class="block-18 color-2 align-items-stretch">
                    <div class="text">
                        <h3 class="mb-4 text-white font-weight-bold">Become a Partner</h3>
                        <p class="text-white">Even the all-powerful Pointing has no control about the blind texts about the blind texts.</p>
                        <button onclick="location.assign('give.php?give=donation')" class="btn-5 tithebtn">Join us today</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 counter-wrap ftco-animate shadow rounded">
                <a href="outreaches" class="nav-link  bg-white p-3 position-absolute">All Units</a>
                <img class="card-img-top homecard" src="https://i.imgur.com/aZx8VuB.jpg" alt="Units">
            </div>
        </div>
    </div>
</section>
<div class="block-18 bg-white align-items-stretch">

</div>

<section class="ftco-section-3 img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6 m-auto pl-md-5 ftco-animate">
                <h3 class="mb-3 service-time">Service time</h3>
                <h4 class="font-weight-bold text-muted">SUNDAYS</h4>
                <hr>
                <h4>First service (7:30am - 9:30am)</h4>
                <h4>Second service (9:30am - 11:30am)</h4>
                <hr>
                <h4 class="font-weight-bold text-muted"> TUESDAY</h4>
                <h4>Bible Study (5:30pm - 7:00pm)</h4>
                <hr>
                <h4 class="font-weight-bold text-muted"> FRIDAY </h4>
                <h4>Family Victory Prayers (5:30pm - 6:30pm)</h4>
                <div class="justify-content-center align-content-center d-flex mt-5">
                    <button onclick="location.assign('connect')" class="btn-5 directionbtn">Get Direction <i class="fas fa-compass"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-center my-lg-5 pb-3">
            <div class="col-md-5 heading-section ftco-animate text-center">
                <h2 class="mb-4">Outreaches</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true, "groupCells": 2 }'>
            <?php

            $Query = "SELECT * FROM outReaches";

            if ($result = $conn->query($Query)) {

                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='carousel-cell item p-2'>";
                    echo "<div id='".$row["id"]."' class='card'>";
                    echo "<img onclick=\"location.assign('outreaches?imageid=".$row["id"]."')\" class='card-img-top img-fluid outreaches home-outreaches' src='".$row["image"]."' alt='".$row["heading"]."'>";
                    echo "<div class='card-body'>";
                    echo "<h6 class='card-title font-weight-bold'>".$row["heading"]."</h6>";
                    echo "</div>";
                    echo "<div class='card-footer text-muted'>Posted on <span>".$row["postDate"]."</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                $result->free();
            }
            ?>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center my-lg-5 pb-3">
            <div class="col-md-5 heading-section text-center">
                <h2 class="mb-4">TESTIMONIES</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

        <!-- Flickity HTML init -->
        <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true }'>
            <div id="cell1" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/11.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell2" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/10.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell3" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/09.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell4" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/08.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell5" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/07.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell6" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/06.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
            <div id="cell7" class="carousel-cell">
                <div class="col-md-4 mx-auto text-center">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="images/profile/05.jpg" class="profile-img img-thumbnail rounded-circle z-depth-1 img-fluid">
                        </div>
                        <h4 class="font-weight-bold dark-grey-text mt-4">@Deynah</h4>
                        <p class="font-weight-normal dark-grey-text">
                            <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                            eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--DONATORS -->