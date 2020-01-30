<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
<style>
    /*FOR LIVE STREAMING*/
    .sctv_frame {
        height: calc(56.25vw - 134.125px);
        height: calc(~'56.25vw - 134.125px');
    }
    /* large desktop */
    @media (min-width: 1151px) {
        .sctv_frame {
            height: calc(37.5vw + 65px);
            height: calc(~'37.5vw + 65px');
        }
    }
    /* tablet */
    @media (max-width: 900px) {
        .sctv_frame {
            height: calc(56.25vw + 634px);
            height: calc(~'56.25vw + 634px');
        }
    }
    /* mobile */
    @media (max-width: 640px) {
        .sctv_frame {
            height: calc(56.25vw + 651px);
            height: calc(~'56.25vw + 651px');
        }
    }

</style>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><iframe frameborder="no" height="42" scrolling="no" src="http://streamingchurch.tv/streaming/js_countdown/live_in300x42/index.php?churchid=church9555" width="300"></iframe></h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->
<div class="container">
    <div class="row my-lg-5">
        <div class="col-12">
            <div class="sctv_frame" style="width: 100%; position: relative; min-height:543px;">
                <iframe style="width:100%; height:100%; position: absolute;" frameborder="0" name="sctv" scrolling="no" mozallowfullscreen webkitallowfullscreen allowfullscreen allow="autoplay; fullscreen" src="https://stream.streamingchurch.tv/stream.php?churchid=church9555"></iframe>
            </div>
        </div>
    </div>
</div>
<?php
require("./components/footer.php");
?>
