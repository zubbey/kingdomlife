<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Pastoral</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->
    <div class="causes-page">
        <div class="our-causes pt-0 highlighted-cause">
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM pastoral";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-12 col-md-4">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="'.$row['image'].'" alt="'.$row['heading'].'">
                                    </figure>
        
                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title text-dark m-0">'. mysqli_real_escape_string($conn, stripslashes($row['heading'])) .'</h3>
                                        </header><!-- .entry-header -->
        
                                        <div class="entry-content text-dark">
                                            <p class="comment more">'. mysqli_real_escape_string($conn, stripslashes($row['body'])) .'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                    ?>

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .highlighted-cause -->

    </div>
<?php
require("./components/footer.php");
?>