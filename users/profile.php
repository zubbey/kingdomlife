<?php
require ("../components/user_menu.php");

?>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-3">
                <div class="osahan-account-page-left shadow-sm bg-white h-100">
                    <div class="border-bottom p-4">
                        <div class="osahan-user text-center">
                            <div class="osahan-user-media">
                                <img class="mb-3 rounded-pill shadow-sm mt-1" src="https://i.imgur.com/09BChWb.png" alt="gurdeep singh osahan">
                                <div class="osahan-user-media-body">
                                    <h6 class="mb-2"><?php echo $_SESSION['username'];?></h6>
                                    <p class="mb-1"><?php echo $_SESSION['phone'];?></p>
                                    <p><?php echo $_SESSION['email'];?></p>
                                    <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> Edit Profile</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutme-tab" data-toggle="tab" href="#aboutme" role="tab" aria-controls="aboutme" aria-selected="false">About me</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="d-flex justify-content-between mt-0 mb-4">
                                <h4 class="font-weight-bold">All Items</h4>
                                <button class="btn btn-primary rounded"><i class="fas fa-plus"></i> Add Item</button>
                            </div>
                            <div class="bg-white card mb-4 order-list shadow-sm">
                                <div class="gold-members p-4">
                                    <a href="#">
                                    </a>
                                    <div class="media">
                                        <a href="#">
                                            <img class="mr-4 product" src="../images/book.jpg" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <a href="#">
                                                <span class="float-right text-success">Approved on Mon, Nov 12, 7:18 PM <i class="icofont-check-circled text-success"></i></span>
                                            </a>
                                            <h6 class="mb-2">
                                                <a href="#"></a>
                                                <a href="#" class="text-black">26 Things Successful People Do</a>
                                            </h6>
                                            <p class="text-dark">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at efficitur massa. Pellentesque sed arcu eu enim dictum varius. Sed nec faucibus elit, eget imperdiet lacus. Nam tincidunt viverra porta. Proin accumsan lorem a orci pharetra,
                                            </p>
                                            <hr>
                                            <div class="float-right">
                                                <a class="btn btn-sm btn-outline-primary rounded" href="#"><i class="icofont-check-circled"></i> Mark as sold out</a>
                                                <a class="btn btn-sm btn-danger text-white rounded" href="#"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                            <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Price:</span> ₦3,000
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white card mb-4 order-list shadow-sm">
                                <div class="gold-members p-4">
                                    <a href="#">
                                    </a>
                                    <div class="media">
                                        <a href="#">
                                            <img class="mr-4 product" src="../images/book1.jpg" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <a href="#">
                                                <span class="float-right text-danger">Pending...</span>
                                            </a>
                                            <h6 class="mb-2">
                                                <a href="#"></a>
                                                <a href="#" class="text-black">The blue print of jusus church</a>
                                            </h6>
                                            <p class="text-dark">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at efficitur massa. Pellentesque sed arcu eu enim dictum varius. Sed nec faucibus elit, eget imperdiet lacus. Nam tincidunt viverra porta. Proin accumsan lorem a orci pharetra,
                                            </p>
                                            <hr>
                                            <div class="float-right">
                                                <a class="btn btn-sm btn-danger text-white rounded" href="#"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                            <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Price:</span> ₦5,000
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require("../components/user_footer.php");
?>