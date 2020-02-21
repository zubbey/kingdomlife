<?php
require("./assets/admin_menu.php");
?>


<div class="content">
    <ul class="nav nav-pills nav-pills-primary" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                Members Prayers
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                Visitors Prayers
            </a>
        </li>
    </ul>

    <div class="tab-content tab-space">
        <div class="tab-pane active" id="link1" aria-expanded="true">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3"><?php echo $successMsg;?></div>
                    <div class="card">
                        <div class="card-header m-0">
                            <h4 class="card-title">Members Prayer Request</h4>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <?php
                        $Query = "SELECT * FROM `prayerrequest` order by id DESC ";

                        if ($result = mysqli_query($conn, $Query)) {
                            /* fetch associative array */
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['userid'];

                                $UserQuery = "SELECT * FROM `members` WHERE `id` = '$id'";
                                if ($userResult = mysqli_query($conn, $UserQuery)){
                                    $userRow = mysqli_fetch_assoc($userResult);
                                    $userid = $userRow["id"];
                                }
                                echo '
                            <div class="card-body m-auto text-center">
                                <img src="../images/uploads/profile' . $userid . '.jpg?' . mt_rand() . '" class="card-img-top rounded-circle" style="width: 50px !important; height: 50px;" alt="'.$username.'">
                                <h6 class="my-3">'.$row['fullname'].'</h6>
                               ';
                                echo '
                            <blockquote class="d-flex justify-content-between">
                                <div class="card-text">
                                    <p class="font-weight-light comment more"  style="font-size: 15px" >'. $row['prayer'] .'</p>
                                </div>
                             </blockquote>
                             ';
                                echo '<footer class="blockquote-footer"> <cite title="Source Title">'.$row['created_date'].'</cite></footer>';
                                echo '</div> ';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="link2" aria-expanded="false">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3"><?php echo $successMsg;?></div>
                    <div class="card">
                        <div class="card-header m-0">
                            <h4 class="card-title">Members Prayer Request</h4>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <?php
                        $Query = "SELECT * FROM `visitorprayerrequest` order by id DESC ";

                        if ($result = mysqli_query($conn, $Query)) {
                            /* fetch associative array */
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                            <div class="card-body m-auto text-center">
                                <img src="https://i.imgur.com/gaJNXRO.png" class="card-img-top rounded-circle" style="width: 50px !important; height: 50px;" alt="'.$username.'">
                                <h6 class="my-3">'.$row['fullname'].'</h6>
                               ';
                                echo '
                            <blockquote class="d-flex justify-content-between">
                                <div class="card-text">
                                    <p class="font-weight-light comment more"  style="font-size: 15px" >'. $row['prayer'] .'</p>
                                </div>
                             </blockquote>
                             ';
                                echo '<footer class="blockquote-footer"> <cite title="Source Title">'.$row['created_date'].'</cite></footer>';
                                echo '</div> ';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
require ("./assets/footer.php");
?>

<script>
    var showChar = 350;
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
</script>
