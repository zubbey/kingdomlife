<footer>
    <div class="footer-bar store-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <p class="m-0">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a class="highlight-color" href="http://kingdomlifegospel.org" target="_blank">Kingdomlife Gospel Outreach Ministries</a></p>
                </div><!-- .col-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-bar -->
</footer><!-- .site-footer -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type='text/javascript' src='../js/jquery.js'></script>
<script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='../js/swiper.min.js'></script>
<!--<script src="https://unpkg.com/swiper/js/swiper.js"></script>-->
<!--<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>-->
<script type='text/javascript' src='../js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='../js/circle-progress.min.js'></script>
<script type='text/javascript' src='../js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='../js/jquery.barfiller.js'></script>
<script type='text/javascript' src="../js/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type='text/javascript' src="../js/audio.js"></script>
<script type='text/javascript' src='../js/custom.js'></script>
<script>
    $(document).ready(function() {
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

        $("#file").change(function(e) {
            $("#upload-img")[0].click();
        });
    });

    // for messages

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
    if (queryParameters().add === "true"){
        $('#additemModal').modal('show');
    }
    if (queryParameters().error === "fullnameempty" || queryParameters().error === "prayerempty" || queryParameters().success === "prayersent"){
        $('a#prayer-request-tab')[0].click();
    }

    if (queryParameters().account === "created"){
        Swal.fire({
            icon: 'success',
            title: 'Congrat! your account was created successfully.',
            text: 'A verification link was sent to your email address, please verify to continue.',
            showConfirmButton: false,
            timer: 20000
        });
    }
    // FOR ACCOUNT SETTINGS
    if (queryParameters().success === "infoupdated" || queryParameters().success === "passwordChanged" || queryParameters().success === "usernamechanged"){
        Swal.fire({
            icon: 'success',
            title: 'Updated successfully!',
            showConfirmButton: false,
            timer: 5000
        });
        $('#settings-tab')[0].click();
    }
    if (queryParameters().accountsetting === "true" || queryParameters().changeUsername === "true" || queryParameters().changeEmail === "true" || queryParameters().error === "passwordshort" || queryParameters().error === "nouserpasswordfound" || queryParameters().error === "passwordnotmatch" || queryParameters().error === "invalidphone" || queryParameters().error === "phoneempty" || queryParameters().error === "emptychangeemail" || queryParameters().error === "invalidemail" || queryParameters().error === "wrongpassword" || queryParameters().error === "emailexist" || queryParameters().error === "emptychangeemail" || queryParameters().error === "emptychangeusername" || queryParameters().error === "invalidusername" || queryParameters().error === "usernameexist"){
        $('#settings-tab')[0].click();
        // window.location.assign('?#password-tab');
    }
    if (queryParameters().changeUsername === "true"){
        $('#changeusernameModal').modal('show');
    }
    if (queryParameters().changeEmail === "true"){
        $('#changeemailModal').modal('show');
    }
    if (queryParameters().success === "true"){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
        })
    }
    if (queryParameters().emailverified === "true"){
        Swal.fire({
            icon: 'success',
            title: 'Congrat! your email has been verified successfully.',
            showConfirmButton: false,
            timer: 5000
        });
        $('.alert.alert-warning.alert-dismissible.fade.show').hide();
    }
    if (queryParameters().resendmail === "true"){
        Swal.fire({
            icon: 'success',
            title: 'Email Sent Successfully! Please Check your mail.',
            showConfirmButton: false,
            timer: 2500
        });
    }
    if (queryParameters().success === "uploaded"){
        Swal.fire({
            icon: 'success',
            title: 'Successfully Uploaded!',
            showConfirmButton: false,
            timer: 5000
        })
    }
    if (queryParameters().success === "posted"){
        Swal.fire({
            icon: 'success',
            title: 'Posted!',
            showConfirmButton: false,
            timer: 5000
        })
    }
    if (queryParameters().success === "prayersent"){
        Swal.fire({
            icon: 'success',
            title: 'Sent Successfully!',
            showConfirmButton: false,
            timer: 5000
        })
    }
    if (queryParameters().payment === "true"){
        Swal.fire({
            icon: 'success',
            title: 'Thanks! God bless you.',
            showConfirmButton: false,
            timer: 5000
        });
        $('a#offerings-tab')[0].click();
    }
    if (queryParameters().order === "sent"){
        Swal.fire({
            icon: 'success',
            title: 'Congrats! Your order has been placed.',
            text: 'Your order will be delivered to you in (2) two working days.',
            showConfirmButton: false,
            timer: 10000
        });
        $('a#orders-tab')[0].click();
    }
    if (queryParameters().offerings === "true"){
        $('a#offerings-tab')[0].click();
    }
    if (queryParameters().mystory === "true"){
        window.location.assign('?#mystory-tab');
    }
    if (queryParameters().orders === "true"){
        $('a#orders-tab')[0].click();
    }

    setInterval(ScrollDiv,50)
    if (queryParameters().success === "deleted"){
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            showConfirmButton: false,
            timer: 5000
        })
    }
    if (queryParameters().error === "posted"){
        Swal.fire({
            icon: 'error',
            text: 'Oops! Something went wrong, check your connection & try Again',
            showConfirmButton: false,
            timer: 5000
        })
    }
</script>
</body>
</html>