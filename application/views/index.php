
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SIPPO ::: Sistem Pemberkasan Perkara Online Kejaksaan Negeri Tanjung Selor</title>

    <script src="<?php echo base_url(); ?>inc/js/jquery-1.11.2.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>inc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>inc/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>inc/js/jquery-ui.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>inc/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> 
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>inc/css/prettify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>inc/css/bootstrap-wysihtml5.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>inc/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>inc/css/dataTables.tableTools.css">
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>inc/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>inc/js/dataTables.tableTools.js"></script>

    <script src="<?php echo base_url(); ?>inc/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/bootstrap-wysihtml5.js"></script>

    <style type="text/css">
      body 
      {
        font-size: 10pt;
      }
      #prevBtn { display:none;}

      #myTab{
        font-size: 9pt;
      }

      .aLeft{text-align: left;}
      .aCenter{text-align: center;}
      .aRight{text-align: right;}
      .form-control{width: 450px;}
      .datepicker{width: 200px;}
    </style>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>inc/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/docs.min.js"></script>    
    <script src="<?php echo base_url(); ?>inc/js/jquery.bootstrap.wizard.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/prettify.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>inc/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {        

        $(".tables").DataTable();

		$('#rootwizard').bootstrapWizard();
		
        $( ".datepicker" ).datepicker({
          dateFormat: 'dd/mm/yy'
        });

        $('.sidemenu').click(function(){
          $(this).addClass('active');
        });

        $('[data-toggle="tooltip"]').tooltip();   
        
      });

    $(".collapse").collapse();
    </script>

  </head>

  <body>

    <?php $this->load->view("templates/top_menu.php") ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php $this->load->view("templates/side_menu.php") ?>        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php $this->load->view($content); ?>  
        </div>
      </div>
    </div>

    
  </body>
</html>
