<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");

if (isset($_GET['error']) && $_GET['error'] === 'postempty'){
    $invalid_post_textarea = "style = 'border: 2px solid #f95503 !important;'";
    $invalid_post_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
?>
<style>
    .testimonial-cont::before{
        content: none !important;
    }
    .testimonial-cont.text-center {
        background: #f9f8f8;
        border: solid 1px #dedddd;
        padding: 10px;
        border-radius: 30px;
    }
    .contact-form span {
        display: block;
         margin-top: 0;
         text-align: left;
    }
    .contact-form {
        padding: 20px;
         margin-top: 0;
        background: #f9f8f8;
        border-radius: 30px;
    }
    .contact-form input[type="text"], .contact-form input[type="email"], .contact-form textarea{
        font-size: 18px;
    }
    .entry-footer.d-flex.align-items-center {
        padding: 20px 0;
    }
    .entry-footer h4 {
        padding-left: 10px !important;
    }
</style>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Testimonies</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="pt-5 pb-3">Share your story</h4>
            <?php
            if (isset($_SESSION['user_session'])){
                $sql = "SELECT * FROM members LIMIT 1;";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    if ($user = mysqli_fetch_assoc($result)) {
                        $id = $_SESSION['user_id'];

                        $sqlImg = "SELECT * FROM profileimg WHERE userid='$id' LIMIT 1;";
                        $resultImg = mysqli_query($conn, $sqlImg);
                        while ($imgRow = mysqli_fetch_assoc($resultImg)){
                            if ($imgRow['status'] == 1 ) {
                                $profileImage = '<img src="./images/uploads/profile'.$id.'.jpg?'.mt_rand().'" id="profile-image1" width="150" class="mx-auto img-fluid img-circle d-block rounded-circle img-thumbnail" alt="Profile Image">';
                                $profileImageSmall = '<img src="./images/uploads/profile'.$id.'.jpg?'.mt_rand().'" id="profile-image1" width="40" class="rounded-circle img-thumbnail" alt="Profile Image">';
                            } else {
                                $profileImage = '<img src="https://i.imgur.com/gaJNXRO.png" class="mx-auto img-fluid img-circle d-block rounded-circle" alt="Profile Image">';
                                $profileImageSmall = '<img src="https://i.imgur.com/gaJNXRO.png" width="30" class="rounded-circle" alt="Profile Image">';
                            }
                        }
                    }
                }

                echo '
                <form class="contact-form" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">
                    <div class="entry-footer d-flex align-items-center py-3">
                        '.$profileImageSmall.'
                        <h4> @'.ucwords($_SESSION['username']).'</h4>
                    </div>
                    '.$invalid_post_Msg.'
                    <textarea rows="4" cols="6" placeholder="Eg: Thank you Jesus for my life!" name="testimony"'. $invalid_post_textarea .'></textarea>
                    <div class="entry-footer">
                        <input class="btn gradient-bg" type="submit" name="testimony-btn" value="Share Your Testimony">
                    </div>
                </form>
                ';
            } else{
                echo '<input onclick="location.assign(\'?register=true\')" class="btn gradient-bg" type="submit" value="Share your story">';
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mb-4">
        <?php
        $Query = "SELECT * FROM `testimonies` WHERE `status` = 1";

        if ($result = $conn->query($Query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $id = $row['userid'];
                $UserQuery = "SELECT * FROM `members` WHERE `id` = '$id'";
                if ($userResult = $conn->query($UserQuery)){
                    $userRow = $userResult->fetch_assoc();
                    $username = $userRow["username"];
                    $userid = $userRow["id"];
                }
                echo '
                    <div class="testimonial-item col col-4 m-auto">
                        <div class="testimonial-cont text-center">
                            <div class="entry-footer align-items-center mt-5">
                                <img src="./images/uploads/profile' . $userid . '.jpg?' . mt_rand() . '" class="rounded-circle" height="100px" alt="'.$username.'">
                                <h6>@'.$username.'</h6>
                            </div>
                            <div class="">
                                <p class="font-weight-light comment more"  style="font-size: 15px" >'.sanitize($row['testimony']).'</p>
                            </div>
                            <div class="">
                                <small class="text-muted">'.$row['created_date'].'</small>
                            </div>
                        </div>
                    </div>
                ';
            }
        }

        ?>
    </div>
</div>

<?php
require("./components/footer.php");
?>