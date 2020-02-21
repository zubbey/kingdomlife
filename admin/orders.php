<?php
require("./assets/admin_menu.php");
?>


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order</h4>
                </div>
            </div>

            <div class="bg-white card mb-4 order-list shadow-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Buyer</th>
                        <th scope="col">Product key</th>
                        <th scope="col">Product value</th>
                        <th scope="col">Order number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //                                SELECT domain FROM mytable WHERE domain LIKE '%domain.com%';
                    $sql = "SELECT `productKey`, `productValue`, `ordernumber`, `status`, `order_date` FROM `orders` WHERE `productKey` LIKE 'qty%' OR `productKey` LIKE 'product_amount%' OR `productKey` LIKE 'product_name%' order by `id` DESC;";
                    $orderResult = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($orderResult) > 0){

                        while ($row = mysqli_fetch_assoc($orderResult)) {

                            if ($row['status'] > 0) {
                                $status = "<p class='card-link text-success'><i class='icon_check'></i> Delivered<p>";
                                $statusCheck = "checked";
                            } else {
                                $status = "<p class='card-link text-danger m-0'>In Transit</p>";
                                $statusCheck = "";
                            }

                            $imgSql = mysqli_query($conn, "SELECT * FROM members WHERE id = '".$row['id']."' ");
                            $user = mysqli_fetch_assoc($imgSql);
                            echo '<tr>';
                            echo '<td scope="col">'.$user['username'].'</td>';

                            echo '
                                    <td scope="col">'.$row['productKey'].'</td>
                                    <td scope="col">'.$row['productValue'].'</td>
                                    <td scope="col">'.$row['ordernumber'].'</td>
                                    <td scope="col">'.$status.'</td>
                                    <td scope="col">'.$row['order_date'].'</td>
                                    <td scope="col">
                                        <form id="deliveredForm">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" id="testCheckbox" type="checkbox" '.$statusCheck.'>
                                                    '.$status.'
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="d" value="'.$status.'">
                                            <input type="hidden" name="memberid" value="'.$row['id'].'">
                                      </form>
                                    
                                    </td>
                                </tr>
                                </tbody>
                            ';

                        }
                    } else {
                        echo "<p class='p-3'>No Order has been placed yet!</p>";
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
</div>


<?php
require ("./assets/footer.php");
?>
