<?php
require("./assets/admin_menu.php");

//if (isset($_GET[]))

?>


<div class="content">
    <ul class="nav nav-pills nav-pills-primary mb-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="banner" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                Banners
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="bulletin" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                Bulletins
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="event" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                Events
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="outreach" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
                Outreaches
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="stock" data-toggle="tab" href="#link5" role="tablist" aria-expanded="false">
                Stock
            </a>
        </li>
    </ul>

    <div class="tab-content tab-space">
        <div class="tab-pane active" id="link1" aria-expanded="true">
        <!--  Add /Remove Banners-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between m-0">
                            <h4 class="card-title">Home Banners</h4>
                            <div class="toolbar">
                                <button type="button" onclick="location.assign('?add=banner')" id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Banner</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $bSql = "SELECT * FROM `banner` order by id DESC ";
                $bResult = mysqli_query($conn, $bSql);
                if (mysqli_num_rows($bResult) > 0){
                    while ($brow = mysqli_fetch_assoc($bResult)){
                        echo '
                        <div class="col-sm-3 col-sm-4">
                            <div class="card mx-auto" style="width: 20rem;">
                            <div class="card-body">
                                <img src="../images/uploads/banner/'.$brow['image'].'" class="card-img-top" alt="">
                                <blockquote class="mt-3 d-flex justify-content-between">
                                    <footer class="blockquote-footer">'. date('F/j/Y',strtotime($brow['createdate'])).'</footer>
                                    <div><i onclick="location.assign(\'?delbid='.$brow['id'].'&file=images/uploads/banner/'.$brow['image'].'&table=banner\')" class=\'fas fa-trash text-danger\'></i></div>
                                </blockquote>
                            </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo "<p>You have 0 Banner</p>";
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="link2" aria-expanded="false">
            <!--  Add /Remove Bulletins-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between  m-0">
                            <h4 class="card-title">Bulletins</h4>
                            <div class="toolbar">
                                <button onclick="location.assign('?add=bulletin')" id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Bulletin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $btSql = "SELECT * FROM `bulletins` order by id DESC ";
                $btResult = mysqli_query($conn, $btSql);
                if (mysqli_num_rows($btResult) > 0){
                    while ($btrow = mysqli_fetch_assoc($btResult)){
                        echo '
                            <div class="col-sm-3 col-sm-6">
                                <div class="card mx-auto" style="width: 20rem;">
                                <div class="card-body">
                                    <iframe src="../images/uploads/bulletin/'.$btrow['file'].'" class="card-img-top" width="100%" height="500px"></iframe>
                                    <blockquote class="mt-3 d-flex justify-content-between">
                                        <footer class="blockquote-footer">'.date('F/j/Y',strtotime($btrow['createdate'])).'</footer>
                                        <div><i onclick="location.assign(\'?delbtid='.$btrow['id'].'&file=images/uploads/bulletin/'.$btrow['file'].'&table=bulletins\')" class=\'fas fa-trash text-danger\'></i></div>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            ';
                    }
                } else {
                    echo "<p class='p-3'>You have 0 Banner</p>";
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="link3" aria-expanded="false">
            <!--  Add /Remove Events-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between  m-0">
                            <h4 class="card-title">Events</h4>
                            <div class="toolbar">
                                <button onclick="location.assign('?add=event')" id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Event</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $eSql = "SELECT * FROM `events` order by id DESC ";
                $eResult = mysqli_query($conn, $eSql);
                if (mysqli_num_rows($eResult) > 0){
                    while ($erow = mysqli_fetch_assoc($eResult)){
                        echo '
                            <div class="col-sm-3 col-sm-6">
                                <div class="card mx-auto" style="width: 20rem;">
                                <div class="card-body">
                                    <img src="../images/uploads/events/'.$erow['eimage'].'" class="card-img-top" alt="">
                                    <div class="card-header mt-3 p-0 h5 font-weight-bold">'.$erow['ename'].'</div>
                                    <div class="card-text">'.$erow['einfo'].'</div>
                                    <hr>
                                    <p>Time: '.$erow['etime'].'</p>
                                    <hr>
                                    <p>Date: '.$erow['edate'].'</p>
                                     <hr>
                                    <p>Venue: '.$erow['evenue'].'</p>
                                    <blockquote class="mt-3 d-flex justify-content-between">
                                        <footer class="blockquote-footer">'.date('F/j/Y',strtotime($erow['createdate'])).'</footer>
                                        <div><i onclick="location.assign(\'?deleid='.$erow['id'].'&file=images/uploads/events/'.$erow['eimage'].'&table=events\')" class=\'fas fa-trash text-danger\'></i></div>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            ';
                    }
                } else {
                    echo "<p class='p-3'>You have 0 Event</p>";
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="link4" aria-expanded="false">
            <!--  Add /Remove Outreaches-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between  m-0">
                            <h4 class="card-title">Church Outreaches</h4>
                            <div class="toolbar">
                                <button onclick="location.assign('?add=outreach')" id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Outreach</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $oSql = "SELECT * FROM `outreaches` order by id DESC ";
                $oResult = mysqli_query($conn, $oSql);
                if (mysqli_num_rows($oResult) > 0){
                    while ($orow = mysqli_fetch_assoc($oResult)){
                        echo '
                            <div class="col-sm-3 col-sm-6">
                                <div class="card mx-auto" style="width: 25rem;">
                                <div class="card-body">
                                    <img src="../images/uploads/outreach/'.$orow['image'].'" class="card-img-top" alt="">
                                    <h5 class="card-header font-weight-bold">'.$orow['heading'].'</h5>
                                    <div class="card-text comment more">'.$orow['body'].'</div>
                                    <blockquote class="mt-3 d-flex justify-content-between">
                                        <footer class="blockquote-footer">'.date('F/j/Y',strtotime($orow['postDate'])).'</footer>
                                        <div><i onclick="location.assign(\'?deloid='.$orow['id'].'&file=images/uploads/outreach/'.$orow['image'].'&table=outreaches\')" class=\'fas fa-trash text-danger\'></i></div>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            ';
                    }
                } else {
                    echo "<p class='p-3'>You have 0 Banner</p>";
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="link5" aria-expanded="false">
            <!--  Add /Remove Stock-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between  m-0">
                            <h4 class="card-title">EStore Stock</h4>
                            <div class="toolbar">
                                <button onclick="location.assign('?add=stock')" id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $sSql = "SELECT * FROM `stock` order by id DESC ";
                $sResult = mysqli_query($conn, $sSql);
                if (mysqli_num_rows($sResult) > 0){
                    while ($srow = mysqli_fetch_assoc($sResult)){
                        echo '
                            <div class="col-sm-3 col-sm-4">
                                <div class="card mx-auto" style="width: 20rem;">
                                <div class="card-body">
                                    <img src="../images/uploads/stock/'.$srow['thumbnail'].'" class="card-img-top" alt="">
                                    <h5 class="card-header font-weight-bold p-0 mt-3">'.ucwords($srow['type']).'</h5>
                                    <p class="card-text">'.$srow['name'].'</p>
                                    <p class="card-text">&#8358;'.number_format($srow['amount']).'</p>
                                    <blockquote class="mt-3 d-flex justify-content-between">
                                        <footer class="blockquote-footer">'.date('F/j/Y',strtotime($srow['postDate'])).'</footer>
                                        <div><i onclick="location.assign(\'?delsid='.$srow['id'].'&file=images/uploads/stock/'.$srow['thumbnail'].'&table=stock\')" class=\'fas fa-trash text-danger\'></i></div>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            ';
                    }
                } else {
                    echo "<p class='p-3'>You have 0 Banner</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade mt-lg-5" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="taskForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modalBody" class="modal-body">
                </div>
                <div id="modalFooter" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="createBtn" type="button" class="btn btn-primary" name="createbtn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require ("./assets/footer.php");
?>

<script>
    var showChar = 150;
    var ellipsestext = "...";
    var moretext = "Read More";
    var lesstext = "Show less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }
    });
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });

</script>
