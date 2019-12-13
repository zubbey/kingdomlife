<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<!--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">-->
<?php
if (isset($_GET['offeringAmount'])){
    $amount = $_GET['offeringAmount'];
} else if (isset($_GET['titheAmount'])){
    $amount = $_GET['titheAmount'];
} else if (isset($_GET['partnerAmount'])){
    $amount = $_GET['partnerAmount'];
} else if (isset($_GET['firstfruitAmount'])){
    $amount = $_GET['firstfruitAmount'];
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
                        <div class="form-group"> <!-- left unspecified, .bmd-form-group will be automatically added (inspect the code) -->
                            <div class="border-bottom"></div>
                            <input name="offeringAmount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;1,000">
                        </div>
                        <div class="text-center mb-4">
                            <?php
                            if (isset($_SESSION['user_session'])){
                                echo '<button name="offeringBtn" type="submit" class="btn-lg btn-danger btn-block z-depth-2">Pay Offering</button>';
                            } else{
                                echo '<button onclick="location.assign(\'?register=true\')" type="button" class="btn-lg btn-danger btn-block z-depth-2">Pay Offering</button>';
                            }
                            ?>
                        </div>
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
                if (isset($_SESSION['user_session'])){
                    echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">';
                    echo '<div class="form-group">';
                    echo '<div class="border-bottom"></div>';
                    echo '<input name="titheAmount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;1,000">';
                    echo '</div>';
                    echo '<div class="text-center mb-4">';
                    echo '<button name="titheBtn" type="submit" class="btn-lg btn-danger btn-block z-depth-2">Pay Tithe</button>';
                    echo '</div>';
                    echo '</form>';
                } else{
                    echo '<p class="font-small grey-text d-flex justify-content-center">You\'re not yet a member<a href="?register=true"
          class="dark-grey-text font-weight-bold ml-1"> Register Now</a></p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

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
                        <input name="firstfruitAmount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;1,000">
                    </div>
                    <div class="text-center mb-4">
                        <?php
                        if (isset($_SESSION['user_session'])){
                            echo '<button name="firstfruitBtn" type="submit" class="btn-lg btn-danger btn-block z-depth-2">Give firstfruit</button>';
                        } else{
                            echo '<button onclick="location.assign(\'?register=true\')" type="button" class="btn-lg btn-danger btn-block z-depth-2">Give firstfruit</button>';
                        }
                        ?>
                    </div>
                </form>
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
                <label for="Form-email2">Select Programme</label>
                <select name="partnerOption" class="custom-select custom-select-lg mb-3">
                    <option value="Widows Ministry Outreach" selected>Widows Ministry Outreach</option>
                    <option value="Free Medical Missions Outreach" >Free Medical Missions Outreach</option>
                    <option value="Kingdom Life scholarship Scheme">Kingdom Life scholarship Scheme</option>
                    <option value="Kingdom Life Food Bank">Kingdom Life Food Bank</option>
                </select>
                <div class="form-check my-1">
                    <input onclick="location.assign('?anonymous=user')" class="form-check-input" name="anonymous" type="checkbox" id="defaultCheck12">
                    <label for="defaultCheck12" class="grey-text">Donate Anonymously</label>
                </div>

                <div class="option">
                    <hr>
                    Or
                    <hr>
                </div>

                <?php
                if (isset($_SESSION['user_session']) || isset($_GET['anonymous'])){
                    echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">';
                    echo '<div class="form-group">';
                    echo '<div class="border-bottom"></div>';
                    if (isset($_GET['anonymous'])){
                        echo '<input name="anonymousEmail" type="email" class="form-control mb-3" placeholder="Enter email address">';
                    }
                    echo '<input name="partnerAmount" type="text" class="form-control" placeholder="Enter Amount Eg: &#8358;1,000">';
                    echo '</div>';
                    echo '<div class="text-center mb-4">';
                    echo '<button type="submit" class="btn-lg btn-danger btn-block z-depth-2">Partner</button>';
                    echo '</div>';
                    echo '</form>';
                } else{
                    echo '<p class="font-small grey-text">You\'re not yet a member<a href="?register=true"
          class="dark-grey-text font-weight-bold ml-1"> Register Now</a></p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

    <div class="hero-wrap hero-wrap-about" style="background-image: url('https://i.imgur.com/GGFN0an.png'); opacity: .5;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 bread py-3 font-weight-bold" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Give Online</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mx-auto text-center my-5">
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg my-lg-5">
        <div class="container">
            <div class="row">
                <div onclick="location.assign('?give=offering')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 offering rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">Offerings</h4>
                            <i class="fas fa-globe-africa"></i>
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
                            <i class="fas fa-plane-arrival"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Pay your tithe Online</p>
                        </div>
                    </div>
                </div>

                <div onclick="location.assign('?give=donation')" class="col-md-4 mb-4 pastorcard">
                    <div class="card gradient-card rounded">
                        <div class="card-image p-4 donation rounded-top">
                            <h4 class="text-uppercase font-weight-bold my-4 text-white">Partnership</h4>
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="card-body white">
                            <p class="text-muted">Help to see the world in a better shape</p>
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
require ("./components/footer.php");
?>
<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_test_e95beb6f47a4393ac5bceae21f4a0551fe91c396',
            email: '<?php echo $_SESSION["email"];?>',
            amount: <?php echo $amount;?> * 100,
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: "<?php echo $_SESSION['phone']?>"
                    }
                ]
            },
            callback: function(response){
                var res = 'success. transaction ref is ' + response.reference;
                paymentSuccess(res);
            },
            onClose: function(){
                cancelPayment();
            }
        });
        handler.openIframe();
    }

    function paymentSuccess(response){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your Payment was successful',
            text: 'Here is your reference code: ' + response,
            showConfirmButton: false,
            timer: 2000
        });
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
    if (queryParameters().give === "tithe"){
        $('#titheModal').modal('show');
    }
    if (queryParameters().give === "donation" || queryParameters().anonymous === "user"){
        $('#donationModal').modal('show');
    }
    if (queryParameters().give === "firstfruit"){
        $('#firstfruitModal').modal('show');
    }
    if (queryParameters().anonymous === "user"){
        $('input[name="anonymous"]')[0].checked = true;
        $('.option').hide();
    }
    if (queryParameters().offeringAmount){
        $('#paybtn')[0].click();
    }
    if (queryParameters().titheAmount){
        $('#paybtn')[0].click();
    }
    if (queryParameters().partnerAmount){
        $('#paybtn')[0].click();
    }
    if (queryParameters().firstfruitAmount){
        $('#paybtn')[0].click();
    }
</script>