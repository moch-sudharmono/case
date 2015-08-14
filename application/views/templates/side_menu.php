<?php $session_data = $this->session->userdata('logged_in'); ?>
<style type="text/css">
.sidebar{ padding: 0;}
</style>
<div id="MainMenu">
  <div class="list-group panel">
  	<a href="<?php echo base_url(); ?>" class="list-group-item list-group-item-info" data-parent="#MainMenu">Halaman Utama</a>
    <a href="#demo3" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">Register Perkara</a>
    <div class="collapse" id="demo3">
      <a href="<?php echo base_url(); ?>index.php/rp6/" class="list-group-item">RP 6</a>
      <a href="<?php echo base_url(); ?>index.php/rp7/" class="list-group-item">RP 7</a>
      <a href="<?php echo base_url(); ?>index.php/rp9/" class="list-group-item">RP 9</a>
      <a href="<?php echo base_url(); ?>index.php/rp12/" class="list-group-item">RP 12</a>
    </div>
    <a href="#demo6" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">Register Perkara Anak</a>
    <div class="collapse" id="demo6">
      <a href="<?php echo base_url(); ?>index.php/rpa1/" class="list-group-item">RPA 1</a>
      <a href="<?php echo base_url(); ?>index.php/rpa2/" class="list-group-item">RPA 2</a>
      <a href="<?php echo base_url(); ?>index.php/rpa3/" class="list-group-item">RPA 3</a>
      <a href="<?php echo base_url(); ?>index.php/rpa4/" class="list-group-item">RPA 4</a>
      <a href="<?php echo base_url(); ?>index.php/rpa5/" class="list-group-item">RPA 5</a>
    </div>
    <a href="#demo4" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">Register Tahanan</a>
    <div class="collapse" id="demo4">
      <a href="<?php echo base_url(); ?>index.php/rt2/" class="list-group-item">RT 2</a>
      <a href="<?php echo base_url(); ?>index.php/rt3/" class="list-group-item">RT 3</a>
    </div>
    <a href="#demo5" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">Register Barang Bukti</a>
    <div class="collapse" id="demo5">
      <a href="<?php echo base_url(); ?>index.php/rb2/" class="list-group-item">RB 2</a>
    </div>
    
    <a href="<?php echo base_url(); ?>index.php/suspect/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Tersangka</a>
    <?php 
	 if($session_data['role'] == 'admin'){
	?>
    <a href="<?php echo base_url(); ?>index.php/attorney/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Jaksa</a>
    <a href="<?php echo base_url(); ?>index.php/supervisor/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Supervisor</a>
    <a href="<?php echo base_url(); ?>index.php/kategori/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Kategori Perkara</a>
    <a href="<?php echo base_url(); ?>index.php/admin/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Administrasi</a>
    <a href="<?php echo base_url(); ?>index.php/notification/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Notifikasi</a>
    <?php } ?>
    <a href="<?php echo base_url(); ?>index.php/admin/panduan" class="list-group-item list-group-item-info" data-parent="#MainMenu">Panduan Aplikasi</a>
    <a href="<?php echo base_url(); ?>index.php/admin/change/" class="list-group-item list-group-item-info" data-parent="#MainMenu">Ubah Password</a>
  </div>
</div>