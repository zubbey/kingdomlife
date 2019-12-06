<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Units & Their Descriptions</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row my-lg-5">
        <?php

        $unitQuery = "SELECT * FROM churchUnits";

        if ($result = $conn->query($unitQuery)) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {

                echo "<div class='col-lg-4'>";
                echo "<div class='media'>";
                        echo "<img src='".$row["image"]."' class='align-self-start mr-3' alt='Unitimage'>";
                        echo "<div class='media-body'>";
                            echo "<h2 class='mt-0'>".$row["heading"]."</h2>";
                            echo "<p>".nl2br($row["body"])."</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            }

            /* free result set */
            $result->free();
        }
        ?>
    </div>
</div>
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
    if (queryParameters().give === "offering"){
        $('#offeringModal').modal('show');
    }
</script>

