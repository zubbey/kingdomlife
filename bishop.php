<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
<style>
    .causes-page .highlighted-cause {
        padding: 46px 0 96px;
        background-image: url(https://i.imgur.com/87QA1CSl.jpg) !important;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
        background-attachment: fixed;
    }
</style>
<div class="causes-page">

    <div class="highlighted-cause">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <?php
                    $sql = "SELECT * FROM `pageContents` WHERE id = 2 LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    while ($contentRow = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="section-heading">
                                <h4 class="entry-title text-capitalize">'.sanitize($contentRow['heading']).'</h4>
                            </div>
        
                            <div class="entry-content">
                                <p class="comment more">'.nl2br(sanitize($contentRow['body'])).'</p>
                            </div>
                        ';
                    }
                    ?>
                </div>

                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <h5 class="text-white text-uppercase">Bishop Victor C. Uzosike </h5>
                    <img class="mt-3" src="https://i.imgur.com/87QA1CSl.jpg" alt="">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .highlighted-cause -->

</div>
<?php
require("./components/footer.php");
?>
