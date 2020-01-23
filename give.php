<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");

//FOR VISITORS
if (isset($_GET['visitors_offering_amount'])){
    $amount = $_GET['visitors_offering_amount'];
    $email = $_GET['visitors_offering_email'];
    $gaveOption = $_GET['visitors_offering_gaveOption'];

} else if (isset($_GET['visitors_tithe_amount'])){
    $amount = $_GET['visitors_tithe_amount'];
    $email = $_GET['visitors_tithe_email'];
    $gaveOption = $_GET['visitors_tithe_gaveOption'];

} else if (isset($_GET['visitors_partnership_amount'])){
    $amount = $_GET['visitors_partnership_amount'];
    $email = $_GET['visitors_partnership_email'];
    $gaveOption = $_GET['visitors_partnership_gaveOption'];

}
//FOR MEMBERS
if (isset($_GET['members_offering_amount'])){
    $amount = $_GET['members_offering_amount'];
    $email = $_GET['members_offering_email'];
    $gaveOption = $_GET['members_offering_gaveOption'];

} else if (isset($_GET['members_tithe_amount'])){
    $amount = $_GET['members_tithe_amount'];
    $email = $_GET['members_tithe_email'];
    $gaveOption = $_GET['members_tithe_gaveOption'];

} else if (isset($_GET['members_partnership_amount'])){
    $amount = $_GET['members_partnership_amount'];
    $email = $_GET['members_partnership_email'];
    $gaveOption = $_GET['members_partnership_gaveOption'];

} else if (isset($_GET['members_firstfruit_amount'])){
    $amount = $_GET['members_firstfruit_amount'];
    $email = $_GET['members_firstfruit_email'];
    $gaveOption = $_GET['members_firstfruit_gaveOption'];

}
if (isset($_GET['payment']) && $_GET['payment'] === 'true'){
    $referenceCode = $_GET['referenceCode'];
    $amount = $_GET['amount'];
    $email = $_GET['email'];
    $gaveOption = $_GET['gaveOption'];
    storePaymentData($referenceCode, $amount, $email, $gaveOption);
}
?>

    <form class="d-none">
        <button id="paybtn" type="button" onclick="payWithPaystack()"></button>
    </form>
    <div class="modal fade" id="offeringModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="deep-grey-text pb-1">Offering</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="rounded-circle" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                        <div class="form-group">
                            <div class="border-bottom"></div>
                        <?php
                        if (isset($_SESSION['user_session'])){
                            echo '
                                <input type="hidden" name="members_offering_gaveOption" value="Offering">
                                <input name="members_offering_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="members_offering_email" type="email" class="form-control" value="'.$_SESSION['email'].'">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="members_offering" type="submit" class="btn-lg btn-danger btn-block z-depth-2">Pay Offering</button>
                                </div>
                            ';
                        } else {
                            echo '
                                <input type="hidden" name="visitors_offering_gaveOption" value="Offering">
                                <input name="visitors_offering_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="visitors_offering_email" type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="visitors_offering" type="submit" class="btn gradient-bg btn-block">Pay Offering</button>
                                </div>
                            ';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="titheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="deep-grey-text pb-1">Tithe</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="rounded-circle"><span aria-hidden="true">&times;</span></div>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['user_session']) || isset($_GET['anonymoustithe'])){
                        echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">';
                        echo '<div class="form-group">';
                        echo '<div class="border-bottom"></div>';
                        if (isset($_SESSION['user_session'])){
                            echo '
                                <input type="hidden" name="members_tithe_gaveOption" value="Tithe">
                                <input name="members_tithe_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="members_tithe_email" type="email" class="form-control" value="'.$_SESSION['email'].'">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="members_tithe" type="submit" class="btn gradient-bg btn-block">Give Tithe</button>
                                </div>
                            ';
                        } else {
                            echo '
                                <input type="hidden" name="visitors_tithe_gaveOption" value="Tithe">
                                <input name="visitors_tithe_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="visitors_tithe_email" type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="visitors_tithe" type="submit" class="btn gradient-bg btn-block">Give Tithe</button>
                                </div>
                            ';
                        }

                        echo '</form>';
                    } else{
                        $_SESSION['fromGive'] = true;
                        $_SESSION['gaveOption'] = "tithe";
                        echo '
                        <div class="text-center mb-4">
                        <p class="font-small">You\'re not yet a member</p>
                        <a href="?register=true" class="btn gradient-bg"> Register Now</a>
                        <p class="font-small">or <a href="?anonymoustithe=tithe" class="highlight-color font-weight-bold ml-1">Give Anonymously?</a></p>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="deep-grey-text pb-1">Partner with us</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="rounded-circle"><span aria-hidden="true">&times;</span></div>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['user_session']) || isset($_GET['anonymouspartnership'])){
                        echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">';
                        if (isset($_SESSION['user_session'])){
                            echo '
                            <label for="Form-email2">Select Programme</label>
                            <select name="members_partnership_gaveOption" class="custom-select custom-select-lg mb-3">
                                <option value="Widows Ministry Outreach" selected>Widows Ministry Outreach</option>
                                <option value="Free Medical Missions Outreach" >Free Medical Missions Outreach</option>
                                <option value="Kingdom Life scholarship Scheme">Kingdom Life Scholarship Scheme</option>
                                <option value="Kingdom Life Food Bank">Kingdom Life Food Bank</option>
                            </select>
                            ';
                            echo '<div class="form-group">';
                            echo '<div class="border-bottom"></div>';
                            echo '
                                <input name="members_partnership_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="members_partnership_email" type="email" class="form-control" value="'.$_SESSION['email'].'">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="members_partnership" type="submit" class="btn gradient-bg btn-block">Partner</button>
                                </div>
                            ';
                        } else {
                            echo '
                            <label for="Form-email2">Select Programme</label>
                            <select name="visitors_partnership_gaveOption" class="custom-select custom-select-lg mb-3">
                                <option value="Widows Ministry Outreach" selected>Widows Ministry Outreach</option>
                                <option value="Free Medical Missions Outreach" >Free Medical Missions Outreach</option>
                                <option value="Kingdom Life scholarship Scheme">Kingdom Life Scholarship Scheme</option>
                                <option value="Kingdom Life Food Bank">Kingdom Life Food Bank</option>
                            </select>
                            ';
                            echo '<div class="form-group">';
                            echo '<div class="border-bottom"></div>';
                            echo '
                                <input name="visitors_partnership_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="visitors_partnership_email" type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="visitors_partnership" type="submit" class="btn gradient-bg btn-block">Partner</button>
                                </div>
                            ';
                        }

                        echo '</form>';
                    } else{
                        $_SESSION['fromGive'] = true;
                        $_SESSION['gaveOption'] = "partnership";
                        echo '
                        <div class="text-center mb-4">
                        <p class="font-small">You\'re not yet a member</p>
                        <a href="?register=true" class="btn gradient-bg"> Register Now</a>
                        <p class="font-small">or <a href="?anonymouspartnership=partnership" class="highlight-color font-weight-bold ml-1">Give Anonymously?</a></p>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<!--FIRST FRUIT-->

<div class="modal fade" id="firstfruitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="deep-grey-text pb-1">First Fruit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="rounded-circle" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                    <div class="form-group"> <!-- left unspecified, .bmd-form-group will be automatically added (inspect the code) -->
                        <div class="border-bottom"></div>
                        <?php
                        if (isset($_SESSION['user_session'])){
                            echo '
                                <input type="hidden" name="members_firstfruit_gaveOption" value="First Fruit">
                                <input name="members_firstfruit_amount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;100">
                                </div>
                                <div class="form-group">
                                    <input name="members_firstfruit_email" type="email" class="form-control" value="'.$_SESSION['email'].'">
                                </div>
                                <div class="text-center mb-4">
                                    <button name="members_firstfruit" type="submit" class="btn-lg btn-danger btn-block z-depth-2">Give First Fruit</button>
                                </div>
                            ';
                        } else{
                            $_SESSION['fromGive'] = true;
                            $_SESSION['gaveOption'] = "firstfruit";
                            echo '
                                <div class="text-center mb-4">
                                <p class="font-small">You\'re not yet a member</p>
                                <a href="?register=true&joinfrom=firstfruit" class="btn gradient-bg"> Register Now</a>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Give Online</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

    <div class="col-md-4 mx-auto text-center my-5">
        <h6 class="font-weight-bold">KINGDOM LIFE GOSPEL OUTREACH MINISTRIES</h6>
        <h6>ACCESS BANK: <span class="highlight-color">0041709140</span></h6>
        <h6>FIRST BANK: <span class="highlight-color">2005297612</span></h6>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg my-lg-5">
        <div class="container">
            <div class="row">
                <div onclick="location.assign('?give=offering')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 offering rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">Offerings</h4>
                            <i class="icon_globe"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Give your Offering Online</p>
                        </div>
                    </div>
                </div>

                <div onclick="location.assign('?give=tithe')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 tithe rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">Tithe</h4>
                            <i class="icon_gift"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Pay your tithe Online</p>
                        </div>
                    </div>
                </div>

                <div onclick="location.assign('?give=partnership')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 donation rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">Partnership</h4>
                            <i class="icon_heart"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Join us today as we reach out to the world beyond the confines of the church.</p>
                        </div>
                    </div>
                </div>
                <div onclick="location.assign('?give=firstfruit')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 firstfruit rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">First Fruit</h4>
                            <i class="fas fa-pepper-hot"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Help to see the world in a better shape</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require("./components/footer.php");
?>

<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_live_3f38bcf11ebcc575162fe2e177cea7b114f2c5db',
            email: '<?php echo $email;?>',
            amount: <?php echo $amount;?> * 100,
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: "Gave",
                        variable_name: "gave",
                        value: "<?php echo $gaveOption;?>"
                    }
                ]
            },
            callback: function(response){
                var res = response.reference;
                paymentSuccess(res);
            },
            onClose: function(){
                cancelPayment();
            }
        });
        handler.openIframe();
    }

    function paymentSuccess(response){
        if (<?php echo isset($_SESSION['user_session'])?'true':'false'; ?>) {
            window.location.assign('users/profile?payment=true&referenceCode='+response+'&amount=<?php echo $amount;?>&email=<?php echo $email;?>&gaveOption=<?php echo $gaveOption;?>');
        } else {
            window.location.assign('?payment=true&referenceCode='+response+'&amount=<?php echo $amount;?>&email=<?php echo $email;?>&gaveOption=<?php echo $gaveOption;?>');
        }
    }

    function cancelPayment(){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'No, continue!',
            cancelButtonText: 'Yes, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                payWithPaystack();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Thank you! God bless you :)',
                    'error'
                )
            }
        });
    }
</script>

<script>
    //################# CHECK URL PARAM FUNCTION ##################
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

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
    if (queryParameters().anonymoustithe === "tithe" || queryParameters().give === "tithe"){
        $('#titheModal').modal('show');
    }
    if (queryParameters().anonymouspartnership === "partnership" || queryParameters().give === "partnership"){
        $('#donationModal').modal('show');
    }
    if (queryParameters().give === "firstfruit"){
        $('#firstfruitModal').modal('show');
    }
    // FOR VISITORS
    if (queryParameters().visitors_offering_amount || queryParameters().visitors_tithe_amount || queryParameters().visitors_partnership_amount || queryParameters().visitors_firstfruit_amount){
        $('#paybtn')[0].click();
    }
    // FOR MEMBERS
    if (queryParameters().members_offering_amount || queryParameters().members_tithe_amount || queryParameters().members_partnership_amount || queryParameters().members_firstfruit_amount){
        $('#paybtn')[0].click();
    }
    if (queryParameters().payment === "true"){
        let resCode = getUrlVars()["referenceCode"];
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Thanks! God bless you.',
            text: 'Here is your reference code: ' + resCode,
            showConfirmButton: false,
            timer: 20000
        });
    }
</script>
