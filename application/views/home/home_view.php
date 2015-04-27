<?php
/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/16/2015
 * Time: 6:37 PM
 */
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CODL Finance 2015</title>

    <!-- Bootstrap core CSS -->
    <?php
    $this->load->view('head-css');
    ?>
</head>

<body>

<?php $this->load->view('header'); ?>

<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('sidemenu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div style="border-radius: 50%;background-color: #2b669a;width: 200px;height: 200px;">
                        <h3 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay*(-1); ?>
                        </h3>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalCreditPayment[0]->TotalCreditPay*(-1); ?></span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div style="border-radius: 50%;background-color: #009900;width: 200px;height: 200px;">
                        <h3 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalSharesPayment[0]->TotalSharesPay; ?>
                        </h3>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalSharesPayment[0]->TotalSharesPay; ?></span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div style="border-radius: 50%;background-color: #d9534f;width: 200px;height: 200px;">
                        <h3 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalReservation[0]->TotalReserveAmount; ?>
                        </h3>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div style="border-radius: 50%;background-color: #888888;width: 200px;height: 200px;">
                        <h3 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay; ?>
                        </h3>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>

            </div>

            <div class="row placeholders">
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #2b669a;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay*(-1); ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalCreditPayment[0]->TotalCreditPay*(-1); ?></span>
                </div>
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #009900;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalSharesPayment[0]->TotalSharesPay; ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalSharesPayment[0]->TotalSharesPay; ?></span>
                </div>
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #d9534f;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalReservation[0]->TotalReserveAmount; ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #46b8da;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay; ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #b2dba1;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay; ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>
                <div class="col-xs-4 col-sm-2 placeholder">
                    <div style="margin-left: 25%;border-radius: 50%;background-color: #8a6d3b;width: 100px;height: 100px;">
                        <h5 style="padding-top: 50%;">
                            <?php echo 'Rs.'.$totalCreditPayment[0]->TotalCreditPay; ?>
                        </h5>
                    </div>

                    <h4>Label</h4>
                    <span class="text-muted">Total Credit Payment:Rs.<?php echo $totalReservation[0]->TotalReserveAmount; ?></span>
                </div>

            </div>

            <h2 class="sub-header">Section title</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
                                <li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
                                <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                                <div class="tab-pane fade" id="tab2default">Default 2</div>
                                <div class="tab-pane fade" id="tab3default">Default 3</div>
                                <div class="tab-pane fade" id="tab4default">Default 4</div>
                                <div class="tab-pane fade" id="tab5default">Default 5</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1primary" data-toggle="tab">Primary 1</a></li>
                                <li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>
                                <li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4primary" data-toggle="tab">Primary 4</a></li>
                                        <li><a href="#tab5primary" data-toggle="tab">Primary 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
                                <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                                <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                                <div class="tab-pane fade" id="tab4primary">Primary 4</div>
                                <div class="tab-pane fade" id="tab5primary">Primary 5</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php
$this->load->view('footer');
?>

</body>
</html>