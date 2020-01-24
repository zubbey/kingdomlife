<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Media</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

<div class="entry-content container">
    <div class="row my-lg-5">
        <div class="col-12">
            <div class="tabs">
                <ul class="tabs-nav d-flex">
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#audio">Audio Messages</li>
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#video">Videos </li>
                </ul>

                <div class="tabs-container">
                    <div id="audio" class="tab-content">
                        <div class="page">
                            <div class="player-wrap" data-url="//archive.org/download/mythium/JLS_ATI" data-title="All This Is - Joe L.'s Studio">
                                <div id="bigPlay" class="button">
                                    <div class="playpause">
                                        <div class="play"><svg viewBox="0 0 14 14"><path d="M0,0 L0,14 L11,7 L0,0 Z"/></svg></div>
                                        <div class="pause d-none"><svg viewBox="0 0 14 14"><path d="M0,14 L4,14 L4,0 L0,0 L0,14 L0,14 Z M8,0 L8,14 L12,14 L12,0 L8,0 L8,0 Z"/></svg></div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="pt-3"><h4 class="font-weight-bold text-light">Kingdomlife Audio Massages</h4></div>
                                    <p class="action">&nbsp;</p>
                                    <p class="title ellipsis text-light"></p>
                                </div>
                                <div class="player">
                                    <audio preload></audio>
<!--                                    <div class="playpause">-->
<!--                                        <div class="play"><svg viewBox="0 0 14 14"><path d="M0,0 L0,14 L11,7 L0,0 Z"/></svg></div>-->
<!--                                        <div class="pause"><svg viewBox="0 0 14 14"><path d="M0,14 L4,14 L4,0 L0,0 L0,14 L0,14 Z M8,0 L8,14 L12,14 L12,0 L8,0 L8,0 Z"/></svg></div>-->
<!--                                    </div>-->
                                    <small class="timer small">
                                        <div class="current">0:00:00</div>
                                        <div>/</div>
                                        <div class="duration">0:00:00</div>
                                    </small>
                                    <div><input type="range" min="0" max="100" step=".1" value="0" class="seek"></div>
                                    <div class="prev"><svg viewBox="0 0 12 12"><path d="M3.5,6 L12,12 L12,0 L3.5,6 Z M0,0 L0,12 L2,12 L2,0 L0,0 L0,0 Z"/></svg></div>
                                    <div class="next"><svg viewBox="0 0 12 12"><path d="M0,12 L8.5,6 L0,0 L0,12 L0,12 Z M10,0 L10,12 L12,12 L12,0 L10,0 L10,0 Z"/></svg></div>
                                </div>
                            </div>
                            <div class="playlist-wrap pt-5">

                                <?php
                                $result= mysqli_query($conn, "SELECT description, filename FROM audio ORDER BY id" )
                                or die("SELECT Error: ".mysqli_error());

                                echo "<ol>";
                                while ($row = mysqli_fetch_array($result)){
                                    $files_field= $row['filename'];
                                    $files_show= "audio/$files_field";
                                    $descriptionvalue= $row['description'];
                                    echo "<li id='track' class='py-3'>";
                                    echo "<a href='".$files_show."'>".$descriptionvalue."</a>
                                <span class='text-black px-3 float-right' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-toggle='tooltip' data-placement='left' title='Click to Download'>
                                    <a href='".$files_show.".mp3' download><i class='fas fa-arrow-down'></i> Download</a>
                                </span>
                                ";
                                    echo "</li>";
                                }
                                echo "</ol>";

                                ?>
                            </div>
                        </div>
                    </div>

                    <div id="video" class="tab-content">
                        <div class="container">
                            <h5>video title</h5>
                            <div id="results" class="row">

                            </div>
                        </div>
                    </div><!--  Tab-content-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require("./components/footer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.get(
            "https://www.googleapis.com/youtube/v3/search",{
                part : 'snippet',
                channelId : 'UCUpOJeFIjT8Xx8Aux-OcT8w', // You can get one from Advanced settings on YouTube
                type : 'video',
                maxResults : 50,
                key: google_key},
            function(data) {
                $.each( data.items, function( i, item ) {
                    $('#results').append('<div class="col-6 col-md-4"><iframe width="100%" height="200" src="https://www.youtube.com/embed/{item.id.videoId}" frameborder="0" allowfullscreen><div class="py-lg-4">'+ item.snippet.title +'</div></iframe></div>');
                })
            }
        );
    });
</script>