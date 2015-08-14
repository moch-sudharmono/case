<?php
$session_data = $this->session->userdata('logged_in');
$IdAdmin 		   = $session_data['id_admin'];
?>
<h3 class="page-header">Ubah Password</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/admin/updatepassword">
    <input type="hidden" name="IdAdmin" value="<?php echo $IdAdmin;?>" />
	  <div class="form-group">
      <label for="OldPassword">Password Lama</label>
      <input class="form-control" id="OldPassword" name="OldPassword" type="password" placeholder="*******">
    </div>
    
    <div class="form-group">
      <label for="NewPassword">Password Baru</label>
      <input class="form-control" id="NewPassword" name="NewPassword" type="password" placeholder="*******">
    </div>

    <div class="form-group">
      <span class="error" style="color:red"><?php echo $error; ?></span>
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitPassword" id="submitPassword" value="Simpan Data" />                                  
    </div>
</div>
