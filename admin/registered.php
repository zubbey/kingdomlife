<?php
require("./assets/admin_menu.php");
?>


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registered Members</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="toolbar">
                                    <button id="alertBtn" class="btn btn-primary m-0"><i class="nc-icon nc-simple-add"></i> Add Member</button>
                                </div>
                                <input class="form-control w-50 mb-0" type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Username.." title="Type in a name">
                            </div>

                        <table id="myTable" class="table align-items-center table-flush">
                            <thead itemscope class="text-capitalize">
                            <th scope="col">S/N</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Username</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Verified</th>
                            <th scope="col">Status</th>
                            <th scope="col">Reg Date</th>
                            <th scope="col" class="align-right">Actions</th>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM members";
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

                                    $verified = $row['verified'];
                                    if ($verified > 0){
                                        $verified = "<i class='fas fa-check text-success'></i>";
                                    } else {
                                        $verified = "<span class='text-secondary'>Pending</span>";
                                    }

                                    if ($row['lastAction'] > 0){
                                        $status = "<span class=\"badge badge-success\"> </span> Online";
                                    } else {
                                        $status = "<span class=\"badge badge-danger\"> </span> Offline";
                                    }

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td class='text-left'>".$row['id']."</td>";
                                    echo "<td>".$image."</td>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['firstname'].' '.$row['lastname']."</td>";
                                    echo "<td>".$row['gender']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$verified."</td>";
                                    echo "<td>".$status."</td>";
                                    echo "<td>".date('F/j/Y',strtotime($row['created_at']))."</td>";
                                    echo "<td><span><i class='fas fa-trash text-danger'></i>Delete</span></td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            } else {
                                echo "<p>You have no Member!</p>";
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
