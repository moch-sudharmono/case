<?php
$data 		        = isset($value[0])?$value[0]:array();
$IdNotification	  = isset($data['id_notification'])?$data['id_notification']:"";
$Judul	          = isset($data['title'])?$data['title']:"";
$Periode          = isset($data['period'])?$data['period']:"";
$KodePerkara      = isset($data['kode_perkara'])?$data['kode_perkara']:"";
$Content          = isset($data['content'])?$data['content']:"";
?>
<h3 class="page-header">Form Redaksional Notifikasi</h3>
<div class="row">
	<form method="post" action="<?php echo base_url(); ?>index.php/notification/save">
        <input type="hidden" name="Id_Notification" value="<?php echo $IdNotification;?>" />
	<div class="form-group">
    	<label for="Title">Judul</label>
        <input type="text" value="<?php echo $Judul; ?>" class="form-control" name="Title" id="Title" placeholder="Judul Notifikasi">
    </div>
    <div class="form-group">
      <label for="Periode">Periode Notifikasi (Dalam Hari)</label>
      <input type="text" value="<?php echo $Periode ?>" class="form-control" id="Periode" name="Periode" placeholder="X">
    </div>
    <div class="form-group">
      <label for="KodePerkara">Kode Perkara</label>
      <input type="text" value="<?php echo $KodePerkara; ?>" class="form-control" id="KodePerkara" name="KodePerkara" placeholder="P-XX">
    </div>
    <div class="form-group">
      <label for="Content">Isi Pesan</label>
      <textarea  class="form-control" id="Content" name="Content" placeholder="Isi Notifikasi : tulis [tersangka] untuk menampilkan nama tersangka"><?php echo $Content; ?></textarea>
      <span><em>*ketik <strong>[tersangka]</strong> pada isi pesan untuk menampilkan nama tersangka</em></span>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submitNotification" id="submitNotification" value="Simpan Data" />                                  
    </div>
</div>
