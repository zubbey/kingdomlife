<?php
require("./assets/admin_menu.php");
?>


    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3"><?php echo $successMsg;?></div>
                <div class="card">
                    <div class="card-header m-0">
                        <h4 class="card-title">Members Testimonies</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

                <?php
                $Query = "SELECT * FROM `testimonies` order by id DESC ";

                if ($result = mysqli_query($conn, $Query)) {
                    /* fetch associative array */
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['userid'];
                        if ($row['status'] == 1){
                            $status = 'checked';
                            $status_text = 'Live';
                        } else {
                            $status = '';
                            $status_text = '<span class="text-danger">Go Live</span>';
                        }

                        $UserQuery = "SELECT * FROM `members` WHERE `id` = '$id'";
                        if ($userResult = mysqli_query($conn, $UserQuery)){
                            $userRow = mysqli_fetch_assoc($userResult);
                            $username = $userRow["username"];
                            $userid = $userRow["id"];
                        }
                        echo '
                        <div class="col-sm-3 col-sm-4">
                            <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <img src="../images/uploads/profile' . $userid . '.jpg?' . mt_rand() . '" class="card-img-top" height="200px" alt="'.$username.'">
                                <h6 class="my-3">@'.$username.'</h6>
                                <div class="card-text">
                                    <p class="font-weight-light comment more"  style="font-size: 15px" >'. $row['testimony'] .'</p>
                                </div>';
                        echo '
                            <blockquote class="d-flex justify-content-between">
                                <footer class="blockquote-footer"> <cite title="Source Title">'.$row['created_date'].'</cite></footer>
                             ';

                        echo '
                              <form id="goLive">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="testCheckbox" type="checkbox" '.$status.'>
                                        '.$status_text.'
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <input type="hidden" name="q" value="'.$row['status'].'">
                                <input type="hidden" name="memberid" value="'.$userid.'">
                              </form>
                             ';
                        echo '</blockquote>';
                        echo '</div> ';
                        echo '</div>';
                        echo '</div>';
                    }
                }

                ?>
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
