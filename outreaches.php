<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Outreaches</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="container">
        <div id="myItems" class="row my-5">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                <?php

                $OutReach_sql = "SELECT * FROM outreaches order by id DESC";
                if ($outResult = mysqli_query($conn, $OutReach_sql)){
                    while ($out_row = mysqli_fetch_assoc($outResult)){
                        echo "<div id='".$out_row["id"]."' class='card mb-4'>";
                        echo "<img onclick=\"location.assign('?imageid=".$out_row["id"]."')\" class='card-img-top outreaches' src='./images/uploads/outreach/".$out_row["image"]."' alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo "<h2 class='card-title font-weight-bold'>".mysqli_real_escape_string($conn, $out_row['heading'])."</h2>";
                        echo "<p class='card-text comment more'>".nl2br($out_row['body'])."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input id="myFilter" onkeyup="myFunction()" placeholder="Search for Outreaches.." title="Type in a name" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $Query = "SELECT * FROM `outreaches`";
                                    if ($result = mysqli_query($conn, $Query)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<li><a href='#".$row["id"]."' class='list-group-item'>" . sanitize($row['heading']) . "</a></li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Upcoming Events</h5>
                    <div class="card-body">
                        <?php
                        $eSql = "SELECT * FROM `events` order by id DESC LIMIT 1";
                        $eResult = mysqli_query($conn, $eSql);
                        if (mysqli_num_rows($eResult) > 0){
                            $erow = mysqli_fetch_assoc($eResult);
                            $eventName = $erow['ename'];
                            $eImg = './images/uploads/events/'.$erow['eimage'];
                        } else {
                            echo "<p>Coming up soon!</p>";
                        }
                        ?>
                        <a href="events">
                            <img class="img-fluid preview-thumbnail" src="<?php echo $eImg;?>" alt="<?php echo $eventName;?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body mb-0 p-0">
                    <?php
                    $id = intval($_GET['imageid']);
                    $results = mysqli_query($conn, "SELECT * FROM `outreaches` WHERE `id`=$id");
                    while ($row = mysqli_fetch_array($results))
                    {
                        echo "<button type='button' class='close mr-3 p-2' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>";
                        echo "<img src='./images/uploads/outreach/".$row['image']."' alt='".$row['heading']."' style='width:100%'>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
require("./components/footer.php");
?>

<script>

    function myFunction() {
        var input, filter, cards, cardContainer, h5, title, i;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("myItems");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-body h2.card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
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
    if (queryParameters().imageid){
        $('#modalIMG').modal('show');
    }
</script>

