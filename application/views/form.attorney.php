<?php
$data 		= isset($value[0])?$value[0]:array();
$AttorneyId	= isset($data['id_attorney'])?$data['id_attorney']:"";
$NamaJaksa	= isset($data['name_attorney'])?$data['name_attorney']:"";
$NoHandphone= isset($data['phone'])?$data['phone']:"";
$EmailJaksa = isset($data['email'])?$data['email']:"";
?>
<h3 class="page-header">Data Jaksa</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/attorney/save">
        <input type="hidden" name="AttorneyId" value="<?php echo $AttorneyId;?>" />
	<div class="form-group">
    	<label for="NamaJaksa">Nama Jaksa</label>
        <input type="text" value="<?php echo $NamaJaksa; ?>" class="form-control" name="NamaJaksa" id="NamaJaksa" placeholder="Nama Jaksa">
    </div>
    <div class="form-group">
      <label for="NoHandphone">Nomor Handphone</label>
      <input type="text" value="<?php echo $NoHandphone ?>" class="form-control" id="NoHandphone" name="NoHandphone" placeholder="+628XXXXXXX">
    </div>
    <div class="form-group">
      <label for="EmailJaksa">Email</label>
      <input type="text" value="<?php echo $EmailJaksa; ?>" class="form-control" id="EmailJaksa" name="EmailJaksa" placeholder="email@kejaksaan.go.id">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitAttorney" id="submitAttorney" value="Simpan Data" />                                  
    </div>
</div>
