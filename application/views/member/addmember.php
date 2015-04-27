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

    <script type="text/javascript" src="<?php echo base_url(); ?>js/member/member_process.js"></script>

</head>

<body>
<?php $this->load->view('header'); ?>

<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('sidemenu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Member Management

            </h1>


            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'frmaddmember', 'name' => 'frmaddmember');
            echo form_open('member/addMemberForm', $attributes);
            ?>

            <div class="row">
                <div id="divmessage">
                    <div id="spnmessage"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="txtMemberID" > Member ID</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input class="form-control" id="txtMemberID" name="txtMemberID" type="text" placeholder="ex C001"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="txtName"> Name</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input class="form-control" id="txtName" name="txtName" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="txtAddress"> Address</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <textarea class="form-control" id="txtAddress" name="txtAddress"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="txtAccountID"> Account ID</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input class="form-control" id="txtAccountID" name="txtAccountID" type="text" placeholder="NIC # here"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="txtOPBalance"> Opening Balance</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input class="form-control" id="txtOPBalance" name="txtOPBalance" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input class="form-control btn btn-success" id="btnSubmit" name="btnSubmit" type="submit"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php echo form_close(); ?>
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