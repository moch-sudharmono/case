<?php
$data 		        = isset($value[0])?$value[0]:array();
$SupervisorId	    = isset($data['id_supervisor'])?$data['id_supervisor']:"";
$NamaSupervisor	  = isset($data['name_supervisor'])?$data['name_supervisor']:"";
$NoHandphone      = isset($data['phone_supervisor'])?$data['phone_supervisor']:"";
$EmailSupervisor  = isset($data['email_supervisor'])?$data['email_supervisor']:"";
?>
<h3 class="page-header">Data Supervisor</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/supervisor/save">
        <input type="hidden" name="SupervisorId" value="<?php echo $SupervisorId;?>" />
	<div class="form-group">
    	<label for="NamaSupervisor">Nama Jaksa</label>
        <input type="text" value="<?php echo $NamaSupervisor; ?>" class="form-control" name="NamaSupervisor" id="NamaSupervisor" placeholder="Nama Supervisor">
    </div>
    <div class="form-group">
      <label for="NoHandphone">Nomor Handphone</label>
      <input type="text" value="<?php echo $NoHandphone ?>" class="form-control" id="NoHandphone" name="NoHandphone" placeholder="+628XXXXXXX">
    </div>
    <div class="form-group">
      <label for="EmailSupervisor">Email</label>
      <input type="text" value="<?php echo $EmailSupervisor; ?>" class="form-control" id="EmailSupervisor" name="EmailSupervisor" placeholder="email@kejaksaan.go.id">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitSupervisor" id="submitSupervisor" value="Simpan Data" />                                  
    </div>
</div>
