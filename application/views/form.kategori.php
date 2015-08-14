<?php
$data 		      	= isset($value[0])?$value[0]:array();
$id_kategori	  	= isset($data['id_kategori'])?$data['id_kategori']:"";
$kategori_perkara 	= isset($data['kategori_perkara'])?$data['kategori_perkara']:"";
$deskripsi_kategori = isset($data['deskripsi_kategori'])?$data['deskripsi_kategori']:"";
$status_kategori    = isset($data['status_kategori'])?$data['status_kategori']:"";
?>
<script type="text/javascript">
$(document).ready(function(){
$('#status_kategori').prop('checked',<?php echo ($status_kategori==1?'true':'false');?>);
});
</script>
<h3 class="page-header">Form Kategori Perkara</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/kategori/save">
        <input type="hidden" name="id_kategori" value="<?php echo $id_kategori;?>" />
	<div class="form-group">
    	<label for="kategori_perkara">Kategori Perkara</label>
        <input type="text" value="<?php echo $kategori_perkara; ?>" class="form-control" name="kategori_perkara" id="kategori_perkara" placeholder="Kategori Perkara">
    </div>
    <div class="form-group">
      <label for="deskripsi_kategori">Deskripsi Kategori Perkara</label>
      <input type="text" value="<?php echo $deskripsi_kategori ?>" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" placeholder="Deskripsi">
    </div>
    <div class="form-group">
      <label for="status_kategori">Status Aktif</label>
      <input type="checkbox" value="1" class="form-control" id="status_kategori" name="status_kategori">
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitKategori" id="submitKategori" value="Simpan Data" />                                  
    </div>
</div>
