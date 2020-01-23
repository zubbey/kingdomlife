<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Bulletin</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

<div class="container">
    <div class="row my-lg-5">
        <div class="col-12">
            <div class="media">
                <img src="images/welcome.jpg" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">BULLETIN FOR THE WEEK</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <a href="#" class="btn gradient-bg mr-2"><i class="icon_download"></i> Download</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require("./components/footer.php");
?>