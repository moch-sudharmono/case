<?php $session_data = $this->session->userdata('logged_in'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#428bca;">
      <div class="container-fluid">
        <div class="navbar-header" style="height:50px">
          <img src="<?php echo base_url();?>asset/image/logo.png" height="40px" style="padding-top:3px;float:left;margin-right:10px;" />
          <a class="navbar-brand" style="color:white" href="<?php echo base_url(); ?>">             
            SIPPO ::: Sistem Pemberkasan Perkara Online | Kejaksaan Negeri Tanjung Selor
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">                    
            <li><a href="#" style="text-weight:bold;color:#fff;">Hello, <?php echo $session_data['name']; ?></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/user/logout" style="text-weight:bold;color:#fff;">Log Out</a></li>
          </ul>
          <!--
          <form class="navbar-form navbar-right" action="">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
          -->
        </div>
      </div>
    </nav>