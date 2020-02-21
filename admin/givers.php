<?php
require("./assets/admin_menu.php");
?>


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Online Givers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <input class="form-control w-50 mb-0" type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Username.." title="Type in a name">
                        </div>

                        <table id="myTable" class="table align-items-center table-flush">
                            <thead itemscope class="text-capitalize">
                            <th scope="col">S/N</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Reference Code</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Gave</th>
                            <th scope="col">Date</th>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM givepayment order by id DESC";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)){

                                    $imgSql = mysqli_query($conn, "SELECT * FROM profileimg WHERE userid = '".$row['id']."' ");
                                    $img = mysqli_fetch_assoc($imgSql);
                                    if ($img['status'] == 1) {
                                        $image = '<img style="vertical-align: middle;" src="../images/uploads/profile' . $row['id'] . '.jpg?' . mt_rand() . '" id="profile-image1" width="35" class="rounded-circle img-thumbnail" alt="Profile Image">';
                                    } else {
                                        $image = '<img style="vertical-align: middle;" src="https://i.imgur.com/gaJNXRO.png" width="30" class="rounded-circle" alt="Profile Image">';
                                    }

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td class='text-left'>".$row['id']."</td>";
                                    echo "<td>".$image."</td>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['email'].' '.$row['lastname']."</td>";
                                    echo "<td>".$row['referenceCode']."</td>";
                                    echo "<td>".number_format($row['amount'])."</td>";
                                    echo "<td>".$row['gaveOption']."</td>";
                                    echo "<td>".date('F/j/Y',strtotime($row['created_date']))."</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            } else {
                                echo "<p>No givers or partners yet!</p>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require ("./assets/footer.php");
?>
