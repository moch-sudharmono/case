<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SiPPO ::: Sistem Pemberkasan Perkara Online - Kejaksaan Negeri Tanjung Selor</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>inc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>inc/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>inc/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .container{
        background-color: #fff;
        height: 100%;
        padding: 100px 100px 100px 100px;
        border: 2px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
      }
    </style>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="<?php echo base_url(); ?>index.php/user/login">
        <center>
          <img src="<?php echo base_url();?>asset/image/logo.png" height="100px" />
        
        <h4 class="form-signin-heading center">
          Kejaksaan Negeri Tanjung Selor
        </h4>
        </center>
        <label for="inputEmail" class="sr-only">Email </label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Alamat Email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <span class="error" style="color:red"><?php echo $error; ?></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>inc/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
