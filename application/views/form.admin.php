<?php
$data 		   = isset($value[0])?$value[0]:array();
$IdAdmin	   = isset($data['id_admin'])?$data['id_admin']:"";
$EmailAdmin	 = isset($data['email'])?$data['email']:"";
$NamaAdmin   = isset($data['name'])?$data['name']:"";
$Password    = isset($data['password'])?$data['password']:"";
$role    = isset($data['role'])?$data['role']:"";
?>
<h3 class="page-header">Data Admin</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/admin/save">
        <input type="hidden" name="IdAdmin" value="<?php echo $IdAdmin;?>" />
	<div class="form-group">
    	<label for="NamaAdmin">Nama Admin</label>
        <input type="text" value="<?php echo $NamaAdmin; ?>" class="form-control" name="NamaAdmin" id="NamaAdmin" placeholder="Nama Admin">
    </div>
    <div class="form-group">
      <label for="EmailAdmin">Email</label>
      <input type="text" value="<?php echo $EmailAdmin ?>" class="form-control" id="EmailAdmin" name="EmailAdmin" placeholder="email@email.com">
    </div>
    <?php 
      if(empty($IdAdmin)||!isset($IdAdmin)){
    ?>
    <div class="form-group">
      <label for="Password">Password Baru</label>
      <input class="form-control" id="Password" name="Password" type="password" placeholder="*******">
    </div>
    <?php 
      }
    ?>
    <div class="form-group">
                  <label for="role">Kategori Admin</label>
                  <select class="form-control required" id="role" name="role">
                    <option value="">--Pilih Kategori Admin--</option>                    
                    <option value="admin">Administrator</option>
                    <option value="user">Data Entry</option>
                    </select>
                </div>   
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitAdmin" id="submitAdmin" value="Simpan Data" />                                  
    </div>
</div>
