<?php
require ("./assets/admin_menu.php");

?>

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-02 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Registered</p>
                                <?php

                                $sql = "SELECT * FROM members";
                                $query = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($query);
                                if ($num > 0) {
                                    echo "<p class='card-title'>" . $num . "</p>";
                                } else {
                                    echo "<p class='card-title'>0 members</p>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Amount</p>
                                <?php
                                $ch = curl_init();

                                curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/transaction/totals');
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


                                $headers = array();
                                $headers[] = 'Authorization: Bearer SECRET_KEY';
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                                $result = curl_exec($ch);
                                if($result){
                                    $data = json_decode($result, true);
                                    $totalAmount = $data['data']['total_volume']/100;
                                }
                                if (curl_errno($ch)) {
                                    echo 'Error:' . curl_error($ch);
                                }
                                curl_close($ch);
                                ?>
                                <p id='total' class='card-title'>&#8358;<?php echo number_format($totalAmount);?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i> Last day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-world-2 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <?php
                                $countVisitors = mysqli_query($conn, "SELECT id FROM visitors");
                                echo "<p class=\"card-title\">".mysqli_num_rows($countVisitors)."</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-watch-time text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Online Givers</p>
                                <?php
                                $visitorgSql = "SELECT * FROM visitorspayment";
                                $vgResult = mysqli_query($conn, $visitorgSql);
                                $vnum = mysqli_num_rows($vgResult);
                                if ($vnum > 0) {
                                    $visitors = $vnum;
                                } else {
                                    $visitors = 0;
                                }

                                $giveSql = "SELECT * FROM givepayment";
                                $giveResult = mysqli_query($conn, $giveSql);
                                $num = mysqli_num_rows($giveResult);
                                if ($num > 0) {
                                    $result = $num + $visitors;
                                    echo "<p class='card-title'>" . $result . "</p>";
                                } else {
                                    echo "<p class='card-title'>0 Giver</p>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update now
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Users Behavior</h5>
                    <p class="card-category">24 Hours performance</p>
                </div>
                <div class="card-body ">
                    <canvas id=chartHours width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Email Statistics</h5>
                    <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-primary"></i> Opened
                        <i class="fa fa-circle text-warning"></i> Read
                        <i class="fa fa-circle text-danger"></i> Deleted
                        <i class="fa fa-circle text-gray"></i> Unopened
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Number of emails sent
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">NASDAQ: AAPL</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i> Tesla Model S
                        <i class="fa fa-circle text-warning"></i> BMW 5 Series
                    </div>
                    <hr/>
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require ("./assets/footer.php");
?>