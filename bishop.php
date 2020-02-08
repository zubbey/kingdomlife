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
                <div class="section-heading">
                    <h4 class="entry-title text-capitalize" style="line-height: 1;">MEET THE PRESIDING BISHOP <br>OF KINGDOM LIFE GOSPEL OUTREACH MINISTRIES INT’L.</h4>
                </div>
                <div class="col-12 col-lg-9 order-2 order-lg-2">
                    <?php
//                    $sql = "SELECT * FROM `pageContents` WHERE id = 2 LIMIT 1";
//                    $result = mysqli_query($conn, $sql);
//                    while ($contentRow = mysqli_fetch_assoc($result)) {
                        echo '
                           
                            <div class="entry-content">
                                <p class=""><strong>Bishop Victor C. Uzosike </strong>is the presiding Bishop of Kingdom Life Gospel Outreach Ministries International. </p>
                                <p>A vibrant and dynamic charismatic preacher, Bishop Uzosike is fondly called the Apostle of Destiny because of his life transforming teachings, which have propelled many to discover and fulfill their destinies.</p>
                                <p> He is an internationally sought-for conference speaker, host of Hour of Destiny on Radio and Televisions, Executive Producer Legacy - A Christian soap opera, President Spirit Filled International Network of Gospel Ministers as well as President, Prophetic Bible College, Port-Harcourt. Bishop Uzosike is passionate about soul winning and has impacted thousands of youths on the essence of winning souls for Christ through the umbrella of soldiers of Christ.  A prolific writer and author of several books including best sellers; Living In Power, Your Place of Welcome, and Covenant Control.</p> 
                                <p>He is highly respected as one of the Leaders of the Christian communities in Nigeria. In recognition and appreciation of his numerous contributions to nation building, Bishop Uzosike has received awards from West African Students Union Parliament (WASUP) and National Association of Imo State Students, Award of Excellence by National Association of Niger Delta students as clergy man of the year 2015, in appreciation of his scholarship awards to Niger Delta Youths.</p>
                            </div>
                        ';
                    ?>
                </div>

                <div class="col-12 col-lg-3 order-1 order-lg-1">
                    <img class="mt-3" src="https://i.imgur.com/XbjZN8i.jpg" alt="Bishop" height="100%">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .highlighted-cause -->

</div>
<?php
require("./components/footer.php");
?>
