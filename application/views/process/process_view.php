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
            <h1 class="page-header">Processing Transactions
                <button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add New</button>
            </h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Account</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Account Type</th>
                    <th>Operation</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $opitem) {
                    echo '<tr>' .
                        '<td>' . $opitem->id . '</td>' .
                        '<td>' . $opitem->account_id . '</td>' .
                        '<td>' . $opitem->date . '</td>' .
                        '<td>' . $opitem->amount . '</td>';
                    if ($opitem->type == 1) {
                        echo '<td>Credit Account</td>';
                    } elseif ($opitem->type == 2) {
                        echo '<td>Shares Account</td>';
                    } elseif ($opitem->type == 3) {
                        echo '<td>Reservation</td>';
                    }

                    if ($opitem->op_type == 1) {
                        echo '<td>Starting Balance</td>';
                    } elseif ($opitem->op_type == 2) {
                        echo '<td>Month End Balance</td>';
                    } elseif ($opitem->op_type == 3) {
                        echo '<td>Credit Interest</td>';
                    } elseif ($opitem->op_type == 4) {
                        echo '<td>Shares Interest</td>';
                    } elseif ($opitem->op_type == 5) {
                        echo '<td>Reservation for Office</td>';
                    } elseif ($opitem->op_type == 6) {
                        echo '<td>Credit Installment</td>';
                    } elseif ($opitem->op_type == 7) {
                        echo '<td>Shares Installment</td>';
                    }


                    echo '<td><a href="' . base_url() . 'process/updateMembership"><button class="btn btn-info" type="button">Update</button></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
            <nav>
                <ul class="pagination">

                    <?php foreach ($links as $link) {
                        echo '<li><a href="'.$link.'">'.$link.'</a></li>';
                    }
                    ?>

                </ul>
            </nav>


        </div>
    </div>
</div>
<?php
$this->load->view('footer');
?>
</body>
</html>