<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<!--pastor one-->
<div class="modal fade bd-example-modal-lg" id="pastorModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
            $sql = "SELECT * FROM `pageContents` WHERE id = 2";
            $result = mysqli_query($conn, $sql);
            while ($contentRow = mysqli_fetch_assoc($result)) {
                $heading = $contentRow['heading'];
                $body = $contentRow['body'];
            }
            ?>
            <div class="modal-header">
                <h6>About Bishop</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <img class="card-img-top" src="https://i.imgur.com/87QA1CS.jpg" alt="Card image cap">
                        </div>
                       <div class="col">
                           <h3 class="modal-title" id="exampleModalScrollableTitle"><strong><?php echo nl2br($heading);?></strong></h3>
                       </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body text-black">
                        <h5><?php echo nl2br($body);?></h5>
                    </div>

            </div>
        </div>
    </div>
</div>

<!--pastor one-->
<div class="modal fade bd-example-modal-lg" id="pastorModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
            $sql = "SELECT * FROM `pageContents` WHERE id = 3";
            $result = mysqli_query($conn, $sql);
            while ($contentRow = mysqli_fetch_assoc($result)) {
                $heading = $contentRow['heading'];
                $body = $contentRow['body'];
            }
            ?>
            <div class="modal-header">
                <h6>About Pastor</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <img class="card-img-top" src="https://i.imgur.com/zvKKXd5.jpg" alt="Card image cap">
                    </div>
                    <div class="col">
                        <h3 class="modal-title" id="exampleModalScrollableTitle"><strong><?php echo nl2br($heading);?></strong></h3>
                    </div>
                </div>

                <!-- Card content -->
                <div class="card-body text-black">
                    <h5><?php echo nl2br($body);?></h5>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Ministers</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section my-lg-5">
    <div class="container">
        <div class="row">
            <div onclick="location.assign('?pastor=victor')" class="col-md-4 col-md-3 pastorcard">
                <div class="card card-cascade wider mt-2 mb-3">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="https://i.imgur.com/87QA1CS.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <h5 class="card-title text-muted">Bishop</h5>
                        <h3 class="blue-text pb-2"><strong>Victor C. Uzosike</strong></h3>
                        <p class="card-text">Bishop Victor C. Uzosike is the presiding Bishop of Kingdom Life Gospel Outreach Ministries International.
                            A vibrant and dynamic charismatic prea....</p>

                    </div>

                </div>
            </div>
            <div onclick="location.assign('?pastor=esther')" class="col-md-4 col-md-3 pastorcard">
                <div class="card card-cascade wider mt-2 mb-3">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="https://i.imgur.com/zvKKXd5.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <h5 class="card-title text-muted">Pastor</h5>
                        <h3 class="blue-text pb-2"><strong>Mrs. Esther Uzosike </strong></h3>
                        <p class="card-text">Pastor Mrs. Esther Uzosike is the wife of His Lordship, Bishop Victor Uzosike and First Lady Kingdom Life Gospel Outreach Ministries; A woman of ....</p>

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
    if (queryParameters().pastor === "victor"){
        $('#pastorModal1').modal('show');
    }
    if (queryParameters().pastor === "esther"){
        $('#pastorModal2').modal('show');
    }
</script>
