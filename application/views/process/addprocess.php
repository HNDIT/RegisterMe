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
            <h1 class="page-header">Processing Transactions<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add New </button></h1>

        </div>
    </div>
</div>
<?php
$this->load->view('footer');
?>
</body>
</html>