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
    $this->load->view('head-js');
    ?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/signin.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/login/login_process.js"></script>

</head>

<body>

<div class="container-fluid">

    <?php
    $attributes = array('class' => 'form-horizontal form-signin', 'id' => 'frmsignin', 'name' => 'frmsignin');
    echo form_open('login/validate_login', $attributes);
    ?>
    <h2 class="form-signin-heading">Please sign in</h2>

    <div class="row">
        <div id="divmessage">
            <div id="spnmessage"></div>
        </div>
    </div>
    <label for="username" class="sr-only">Username</label>
    <input name="username" id="username" class="form-control" placeholder="User Name" required="" autofocus=""
           type="text">
    <label for="password" class="sr-only">Password</label>
    <input name="password" id="password" class="form-control" placeholder="Password" required="" type="password">

    <div class="checkbox">
        <label>
            <input value="remember-me" type="checkbox"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php
$this->load->view('footer');
?>

</body>
</html>