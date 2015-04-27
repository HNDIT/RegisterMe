<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CODL Finance 2015::Member Management</title>

    <!-- Bootstrap core CSS -->
    <?php
    $this->load->view('head-css');
    $this->load->view('head-js');
    ?>


</head>

<body>
<?php $this->load->view('header'); ?>

<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('sidemenu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Processing Transactions
                <a class="btn btn-success" href="<?php echo base_url(); ?>member/addMember"><i class="fa fa-plus"></i>&nbsp;Add New</a>
            </h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Account ID</th>
                    <th>Opening Balance</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($memberinfo as $opitem) {
                    echo '<tr>' .
                        '<td>' . $opitem->id . '</td>' .
                        '<td>' . $opitem->member_id . '</td>' .
                        '<td>' . $opitem->name . '</td>' .
                        '<td>' . $opitem->address . '</td>' .
                        '<td>' . $opitem->address . '</td>' .
                        '<td>' . $opitem->address . '</td>';

                    echo '<td>Credit Installment</td>';


                    echo '<td><a href="' . base_url() . 'member/updateMember/'.$opitem->id .'"><button class="btn btn-info" type="button">Update</button></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
            <nav>
                <ul class="pagination">

                    <?php foreach ($links as $link) {
                        echo '<li><a href="' . $link . '">' . $link . '</a></li>';
                    }
                    ?>

                </ul>
            </nav>


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