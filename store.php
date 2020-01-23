<?php
require_once("./controller/auth_controller.php");
require("./components/e_store_menu.php");

//FOR VISITORS
if (isset($_GET['checkout'])){
    $amount = $_GET['total_amount'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];
}
if (isset($_GET['error']) && $_GET['error'] === 'phoneempty'){
    $invalid_phone = "is-invalid";
    $invalid_phone_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'invalidphone'){
    $invalid_phone = "is-invalid";
    $invalid_phone_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'emptyinput'){
    $invalid_field= "is-invalid";
    $invalid_field_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
?>
<style>
    .contact-form span {
        display: initial !important;
    }
    .modal-content {
        border-radius: 24px !important;
    }
    .contact-form {
        border-radius: 24px !important;
        padding: 20px !important;
    }
</style>
<form class="d-none">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button id="paybtn" type="button" onclick="payWithPaystack()"></button>
</form>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Online Store</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">My Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="contact-form m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="GET">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col">
                                        <label for="firstname">First Name: </label>
                                        <?php echo $invalid_field_Msg;?>
                                        <input type="text" name="firstname" id="firstname" class="form-control <?php echo $invalid_field;?>" placeholder="First Name">
                                    </div>
                                    <div class="col">
                                        <label for="firstname">Last Name: </label>
                                        <?php echo $invalid_field_Msg;?>
                                        <input type="text" name="lastname" id="lastname" class="form-control <?php echo $invalid_field;?>" placeholder="Last Name">
                                    </div>
                                </div>
                                <label for="Email">Email Address: </label>
                                <input type="email" id="Email" value="<?php echo $_SESSION['email']; ?>" disabled>
                                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                <label for="Phone">Phone Number: </label>
                                <?php echo $invalid_phone_Msg;?>
                                <input type="text" id="Phone" name="phone" placeholder="Phone Number" class="form-control <?php echo $invalid_field; echo $invalid_phone;?>" value="<?php echo $_SESSION['phone']; ?>">
                                <label for="Prayer">Delievery Address: </label>
                                <?php echo $invalid_field_Msg;?>
                                <textarea class="<?php echo $invalid_field;?>" id="address" rows="3" cols="6" name="address" placeholder="Eg: No. 6 Chief Matthew close, Rivers State, Port harcourt"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="modal-body">
                                    <table class="show-cart table">

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="total text-right">Total price: <h4> &#8358;<span class="total-cart"></span></h4></div>
                                <div class="modal-footer m-0 p-0">
                                    <button type="button" class="btn btn-outline" data-dismiss="modal">Continue Shopping</button>
                                    <button type='submit' class='btn gradient-bg' name='checkout' value="Success">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>



    <div class="container">
    <div class="row my-4">
        <div class="col-12">
            <div class="tabs">
                <ul class="tabs-nav d-flex">
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#e_books">E Books</li>
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#cd">CD</li>
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#dvd">DVD</li>
                    <li class="tab-nav d-flex justify-content-center align-items-center" data-target="#audio_books">Audio Books</li>
                </ul>

                <div class="tabs-container">
                    <div id="e_books" class="tab-content">
                        <div id="ebooks" class="row clearfix">
                            <div class="container">
                                <div class="row">
                                    <?php

                                    $Query = "SELECT * FROM ebooks";

                                    if ($result = $conn->query($Query)) {

                                        // fetch associative array
                                        while ($row = $result->fetch_assoc()) {

                                            echo "
                                                 <div class='col-sm-6 col-md-4 col-md-3'>
                                                    <div class='card p-3'>
                                                        <img class='card-img-top' src='".$row["thumbnail"]."' alt='".$row["name"]."'>
                                                        <div class='card-block'>
                                                            <h5 class='card-title pt-3'>".$row["name"]."</h5>
                                                            <hr class='m-0'>
                                                            <p class='card-text p-2'>Price: &#8358;".number_format($row["amount"])."</p>
                                                            <a onclick=\"checkCart('cart-id".$row["id"]."')\" data-name='".$row["name"]."' data-price='".$row["amount"]."' class='add-to-cart btn btn-outline btn-block cart-id".$row["id"]."'><i class='cart icon_cart'></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        $result->free();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cd" class="tab-content">
                       <h3>There's 0 available item here</h3>
                    </div>

                    <div id="dvd" class="tab-content">
                        <h3>There's 0 available item here</h3>
                    </div>
                    <div id="audio_books" class="tab-content">
                        <h3>There's 0 available item here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require("./components/e_store_footer.php");
?>