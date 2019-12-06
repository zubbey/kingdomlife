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
                <li class="nav-item">
                    <a class="nav-link active" id="ebook-tab" data-toggle="tab" href="#ebook" role="tab" aria-controls="ebook" aria-selected="true">Ebook <span id="totalEbooks" class="badge badge-primary badge-pill"></span></a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">

                <div class="tab-pane fade show active" id="ebook" role="tabpanel" aria-labelledby="ebook-tab">
                    <div id="ebooks" class="row clearfix">
                            <?php

                            $Query = "SELECT * FROM Ebooks";

                            if ($result = $conn->query($Query)) {

                                // fetch associative array
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='ebook-card col-lg-4 col-md-6 col-sm-8'>";
                                    echo "<figure class='card product_item'>";
                                    echo "<div class='cp_img'>";
                                    echo "<img onclick=\"location.assign('?imageid=".$row["id"]."')\" src='".$row["thumbnail"]."' alt='Product' class='img-fluid thumbnail'>";
                                    echo "</div>";
                                    echo "<figcaption class='info-wrap p-3'>";
                                    echo "<h3 class='title text-dots'><a href='#'>".$row["name"]."</a></h3>";
                                    echo "<hr>";
                                    echo "<div class='action-wrap'>";
                                    echo "<button class='btn color-1 btn-sm rounded float-right'> Order Now </button>";
                                    echo "<div class='price-wrap h5'>";
                                    echo "<span class='price-new text-black'>&#8358;".number_format($row["amount"])."</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='card-footer pt-3 pb-0 px-0 bg-transparent'>";
                                    echo "<p class='m-0'>Posted on ".$row["postDate"]."</p>";
                                    echo "</div>";
                                    echo "</figcaption>";
                                    echo "</figure>";
                                    echo "</div>";
                                }
                                $result->free();
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <?php
                $id = intval($_GET['imageid']);
                $results = mysqli_query($conn, "SELECT * FROM Ebooks WHERE id=$id");
                while ($row = mysqli_fetch_array($results))
                {
                    echo "<div class='modal-header'>";
                    echo "<div><a data-href='".$row['thumbnail']."' download='Preview' onclick='forceDownload(this)' class='btn btn-primary btn-rounded text-white'><i class='fa fa-arrow-alt-circle-down'></i> Download Preview</a></div>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>";
                    echo "</div>";
                    echo "<img src='".$row['thumbnail']."' alt='".$row['name']."' style='width:100%'>";
                }
                ?>
            </div>
        </div>
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
    // if (queryParameters().tab == "audio"){
    //     $('#audio-tab')[0].click();
    // }
    if (queryParameters().tab == "ebook"){
        $('#ebook-tab')[0].click();
    }
    if (queryParameters().imageid){
        $('#modalIMG').modal('show');
    }
    $(document).ready(() => {
        let countDiv = $('#ebook .ebook-card').length; // Result: 3
        $('#totalEbooks').html(countDiv);
    });

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
            link.innerText="<Download Again";
        };
        xhr.send();
    }
</script>
