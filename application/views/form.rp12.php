<?php
  //Data RP 9
  $data_rp9               = isset( $rp9[0])?$rp9[0]:array();
  $id_rp9                 = isset( $data_rp9["id_rp9"])?$data_rp9["id_rp9"]:"";
  $register_rp9           = isset( $data_rp9["register_rp9"])?$data_rp9["register_rp9"]:"";
  
  //Data RT 2
  $data_rt2               = isset( $rt2[0])?$rt2[0]:array();
  $id_rt2                 = isset( $data_rt2["id_rt2"])?$data_rt2["id_rt2"]:"";
  $register_rt2           = isset( $data_rt2["register_rt2"])?$data_rt2["register_rt2"]:"";
  
  //Data RT 2
  $data_rb2               = isset( $rb2[0])?$rb2[0]:array();
  $id_rb2                 = isset( $data_rb2["id_rb2"])?$data_rb2["id_rb2"]:"";
  $register_rb2           = isset( $data_rb2["register_rb2"])?$data_rb2["register_rb2"]:"";
 
  //Data Suspect
  $suspects       = isset( $suspect[0])?$suspect[0]:array();
  $NamaTersangka  = isset( $suspects["name_suspect"])?$suspects["name_suspect"]:"";
  $TempatLahir    = isset( $suspects["birthplace"])?$suspects["birthplace"]:"";
  $TanggalLahir   = isset( $suspects["birthdate"] )?date("d/m/Y", strtotime($suspects["birthdate"])):"";
  $JenisKelamin   = isset( $suspects["gender"])?$suspects["gender"]:"";
  $WargaNegara    = isset( $suspects["nationality"])?$suspects["nationality"]:"";
  $Alamat         = isset( $suspects["address"])?$suspects["address"]:"";
  $Pekerjaan      = isset( $suspects["job"])?$suspects["job"]:"";
  $Pendidikan     = isset( $suspects["education"])?$suspects["education"]:"";
  $Agama          = isset( $suspects["religion"])?$suspects["religion"]:"";

  //Data RP 12
  $data_rp12      = isset($rp12[0])?$rp12[0]:array();
  $id_rp12        = isset( $data_rp12["id_rp12"])?$data_rp12["id_rp12"]:"";
  $RegisterRp12   = isset( $data_rp12["register_rp12"])?$data_rp12["register_rp12"]:"";
  $tgl_rp12         = ( isset($data_rp12["tgl_rp12"]) && $data_rp12["tgl_rp12"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_rp12"])):"";
  $NoAmarPutusan  = isset( $data_rp12["no_amar_hukum_tetap"])?$data_rp12["no_amar_hukum_tetap"]:"";
  $TglAmarPutusan = ( isset($data_rp12["tgl_amar_hukum_tetap"]) && $data_rp12["tgl_amar_hukum_tetap"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_amar_hukum_tetap"])):"";
  $NoP48          = isset( $data_rp12["no_p48"])?$data_rp12["no_p48"]:"";
  $TglP48         = ( isset($data_rp12["tgl_p48"]) && $data_rp12["tgl_p48"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_p48"])):"";
  $TglPutusanTpd    = ( isset($data_rp12["tgl_putusan_terpidana"]) && $data_rp12["tgl_putusan_terpidana"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_putusan_terpidana"])):"";
  $TglPutusanDenda  = ( isset($data_rp12["tgl_putusan_denda_pengganti"]) && $data_rp12["tgl_putusan_denda_pengganti"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_putusan_denda_pengganti"])):"";
  $TglPutusanBiaya  = ( isset($data_rp12["tgl_putusan_biaya_perkara"]) && $data_rp12["tgl_putusan_biaya_perkara"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_putusan_biaya_perkara"])):"";
  $TglPutusanBb     = ( isset($data_rp12["tgl_putusan_bb"]) && $data_rp12["tgl_putusan_bb"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_putusan_bb"])):"";
  $TglP51           = ( isset($data_rp12["tgl_p51"]) && $data_rp12["tgl_p51"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["tgl_p51"])):"";
  $PBUmum           = isset( $data_rp12["pidana_bersyarat_umum"])?$data_rp12["pidana_bersyarat_umum"]:"";
  $PBKhusus         = isset( $data_rp12["pidana_bersyarat_khusus"])?$data_rp12["pidana_bersyarat_khusus"]:"";
  $PBPerubahanKhusus  = isset( $data_rp12["pidana_bersyarat_perubahan_khusus"])?$data_rp12["pidana_bersyarat_perubahan_khusus"]:"";
  $PBUsulJpu          = isset( $data_rp12["pidana_bersyarat_usul_jpu"])?$data_rp12["pidana_bersyarat_usul_jpu"]:"";
  $PBAmarHakim        = isset( $data_rp12["pidana_bersyarat_amar_hakim"])?$data_rp12["pidana_bersyarat_amar_hakim"]:"";
  $PBNo               = isset( $data_rp12["pidana_bersyarat_no"])?$data_rp12["pidana_bersyarat_no"]:"";
  $PBTgl              = ( isset($data_rp12["pidana_bersyarat_tgl"]) && $data_rp12["pidana_bersyarat_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["pidana_bersyarat_tgl"])):"";
  $PBTglBa            = ( isset($data_rp12["pidana_bersyarat_tgl_ba"]) && $data_rp12["pidana_bersyarat_tgl_ba"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["pidana_bersyarat_tgl_ba"])):"";
  $EksekusiNo         = isset( $data_rp12["eksekusi_no"])?$data_rp12["eksekusi_no"]:"";
  $EksekusiTgl        = ( isset($data_rp12["eksekusi_tgl"]) && $data_rp12["eksekusi_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["eksekusi_tgl"])):"";
  $EksekusiAlasan     = isset( $data_rp12["eksekusi_alasan"])?$data_rp12["eksekusi_alasan"]:"";
  $EksekusiLamaPidana = isset( $data_rp12["eksekusi_lama_pidana"])?$data_rp12["eksekusi_lama_pidana"]:"";
  $LBNoHakim        = isset( $data_rp12["lepas_bersyarat_no_hakim"])?$data_rp12["lepas_bersyarat_no_hakim"]:"";
  $LBTglHakim       = ( isset($data_rp12["lepas_bersyarat_tgl_hakim"]) && $data_rp12["lepas_bersyarat_tgl_hakim"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["lepas_bersyarat_tgl_hakim"])):"";
  $LBTglPelaksanaan = ( isset($data_rp12["lepas_bersyarat_tgl_pelaksanaan"]) && $data_rp12["lepas_bersyarat_tgl_pelaksanaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["lepas_bersyarat_tgl_pelaksanaan"])):"";
  $LBTglPercobaan   = ( isset($data_rp12["lepas_bersyarat_tgl_percobaan"]) && $data_rp12["lepas_bersyarat_tgl_percobaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp12["lepas_bersyarat_tgl_percobaan"])):"";
  $KejariLepas      = isset( $data_rp12["lepas_bersyarat_kajari_lepas"])?$data_rp12["lepas_bersyarat_kajari_lepas"]:"";
  $KejariAwas       = isset( $data_rp12["lepas_bersyarat_kajari_awas"])?$data_rp12["lepas_bersyarat_kajari_awas"]:"";
  $Bispa            = isset( $data_rp12["lepas_bersyarat_bispa"])?$data_rp12["lepas_bersyarat_bispa"]:"";
  $KediamanTpd      = isset( $data_rp12["lepas_bersyarat_kediaman"])?$data_rp12["lepas_bersyarat_kediaman"]:"";

  $keterangan_rp12 = isset( $data_rp12["keterangan_rp12"])?$data_rp12["keterangan_rp12"]:"";

?>


<h3 class="page-header">Form Register Perkara 12 (RP 12)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Amar Putusan</a></li>
                <li><a href="#tab4" data-toggle="tab">Surat Perintah P-48</a></li>
                <li><a href="#tab5" data-toggle="tab">Pelaksaan Putusan</a></li>
                <li><a href="#tab6" data-toggle="tab">Pidana Bersyarat</a></li>
                <li><a href="#tab7" data-toggle="tab">Eksekusi</a></li>
                <li><a href="#tab8" data-toggle="tab">Pelepasan Bersyarat</a></li>
                <li><a href="#tab9" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rp12/save">
            <input type="hidden" name="rp9_id" value="<?php echo $id_rp9;?>" />
            <input type="hidden" name="rt2_id" value="<?php echo $id_rt2;?>" />
            <input type="hidden" name="rb2_id" value="<?php echo $id_rb2;?>" />
            <input type="hidden" name="id_rp12" value="<?php echo $id_rp12;?>" />
     <div class="tab-content">    
     	<div class="tab-pane" id="tab1">   
            <fieldset>
              <legend>Nomor Register </legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRp9">Register Perkara 9</label>
              <input readonly="readonly"  type="text" value="<?php echo $register_rp9; ?>" class="form-control" id="RegisterRp9" name="RegisterRp9">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRt2">Register Tersangka 2</label>
              <input readonly="readonly"  type="text" value="<?php echo $register_rt2; ?>" class="form-control datepicker" id="RegisterRt2" name="RegisterRt2">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRb2">Register Barang Bukti 2</label>
              <input readonly="readonly"  type="text" value="<?php echo $register_rb2; ?>" class="form-control datepicker" id="RegisterRb2" name="RegisterRb2">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRp12">Register RP12</label>
              <input type="text" value="<?php echo $RegisterRp12; ?>" class="form-control" id="RegisterRp12" name="RegisterRp12">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rp12">Tanggal</label>
              <input type="text" value="<?php echo $tgl_rp12; ?>" class="form-control datepicker" id="tgl_rp12" name="tgl_rp12">
            </div>
            </fieldset>
		</div>
            <!-- ====================================== -->
        <div class="tab-pane" id="tab2">
            <fieldset>
              <legend>Identitas Tersangka</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NamaTersangka">Nama</label>
              <input readonly="readonly"  type="text" value="<?php echo $NamaTersangka; ?>" class="form-control datepicker" id="NamaTersangka" name="NamaTersangka">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TempatLahir">Tempat Lahir</label>
              <input readonly="readonly"  type="text" value="<?php echo $TempatLahir; ?>" class="form-control" id="TempatLahir" name="TempatLahir">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TanggalLahir">Tanggal Lahir</label>
              <input readonly="readonly"  type="text" value="<?php echo $TanggalLahir; ?>" class="form-control datepicker" id="TanggalLahir" name="TanggalLahir">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="JenisKelamin">Jenis Kelamin</label>                  
              <input readonly="readonly"  type="text" value="<?php echo $JenisKelamin; ?>" class="form-control" id="JenisKelamin" name="JenisKelamin">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="WargaNegara">Warga Negara / Kebangsaan</label>
              <input readonly="readonly"  type="text" value="<?php echo $WargaNegara; ?>" class="form-control" id="WargaNegara" name="WargaNegara">
            </div>                                         
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Alamat">Alamat</label>
              <textarea readonly="readonly"  class="form-control" id="Alamat" name="Alamat"><?php echo $Alamat; ?></textarea>
            </div>                
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Agama">Agama</label>
              <input readonly="readonly"  type="text" value="<?php echo $Agama; ?>" class="form-control" id="Agama" name="Agama">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pekerjaan">Pekerjaan</label>
              <input readonly="readonly"  type="text" value="<?php echo $Pekerjaan; ?>" class="form-control" id="Pekerjaan" name="Pekerjaan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pendidikan">Pendidikan</label>
              <input readonly="readonly"  type="text" value="<?php echo $Pendidikan; ?>" class="form-control" id="Pendidikan" name="Pendidikan">
            </div>
          </fieldset>
        </div>
            <!-- ================================================== -->  
         <div class="tab-pane" id="tab3">
            <fieldset>
              <legend>Amar Putusan PN/PT/MA/Grasi/PK yang telah mempunyai Kekuatan Hukum Tetap</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglAmarPutusan">Tanggal</label>
              <input  type="text" value="<?php echo $TglAmarPutusan; ?>" class="form-control datepicker" id="TglAmarPutusan" name="TglAmarPutusan">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoAmarPutusan">Nomor</label>
              <input  type="text" value="<?php echo $NoAmarPutusan; ?>" class="form-control" id="NoAmarPutusan" name="NoAmarPutusan">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->  
		<div class="tab-pane" id="tab4">
            <fieldset>
              <legend>Surat Perintah (P-48)</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglP48">Tanggal</label>
              <input type="text" value="<?php echo $TglP48; ?>" class="form-control datepicker" id="TglP48" name="TglP48">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoP48">No Surat Perintah</label>
              <input type="text" value="<?php echo $NoP48; ?>" class="form-control" id="NoP48" name="NoP48">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab5">
            <fieldset>
              <legend>Tanggal Berita Acara Pelaksanaan Putusan Terhadap</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBATerpidana">Terpidana</label>
              <input type="text" value="<?php echo $TglPutusanTpd; ?>" class="form-control datepicker" id="TglBATerpidana" name="TglBATerpidana">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBADenda">Denda / Kurungan Pengganti</label>
              <input type="text" value="<?php echo $TglPutusanDenda; ?>" class="form-control datepicker" id="TglBADenda" name="TglBADenda">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBABiayaPerkara">Biaya Perkara / Uang Pengganti</label>
              <input type="text" value="<?php echo $TglPutusanBiaya; ?>" class="form-control datepicker" id="TglBABiayaPerkara" name="TglBABiayaPerkara">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBABukti">Barang Bukti</label>
              <input type="text" value="<?php echo $TglPutusanBb; ?>" class="form-control datepicker" id="TglBABukti" name="TglBABukti">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab6">
            <fieldset>
              <legend>Pidana Bersyarat</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglP51">Tanggal Pemberitahuan</label>
              <input type="text" value="<?php echo $TglP51; ?>" class="form-control datepicker" id="TglP51" name="TglP51">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBUmum">Syarat Umum</label>
              <textarea  class="form-control" id="PBUmum" name="PBUmum"><?php echo $PBUmum; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBKhusus">Syarat Khusus</label>
              <textarea  class="form-control" id="PBKhusus" name="PBKhusus"><?php echo $PBKhusus; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBPerubahanKhusus">Perubahan Syarat Khusus (Pasal 14e KUHP)</label>
              <textarea  class="form-control" id="PBPerubahanKhusus" name="PBPerubahanKhusus"><?php echo $PBPerubahanKhusus; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBUsulJpu">Usul JPU untuk menjalankan Pidana Peringatan</label>
              <textarea  class="form-control" id="PBUsulJpu" name="PBUsulJpu"><?php echo $PBUsulJpu; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBAmarHakim">Amar Penetapan Hakim</label>
              <textarea  class="form-control" id="PBAmarHakim" name="PBAmarHakim"><?php echo $PBAmarHakim; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBTgl">Tanggal Ketetapan</label>
              <input type="text" value="<?php echo $PBTgl; ?>" class="form-control datepicker" id="PBTgl" name="PBTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBNo">No Ketetapan</label>
              <input type="text" value="<?php echo $PBNo; ?>" class="form-control" id="PBNo" name="PBNo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PBTglBa">Tanggal Berita Acara Pelaksanaan Penetapan Hakim</label>
              <input type="text" value="<?php echo $PBTglBa; ?>" class="form-control datepicker" id="PBTglBa" name="PBTglBa">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
        <div class="tab-pane" id="tab7">    
            <fieldset>
              <legend>Kewenangan Eksekusi</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="EksekusiTgl">Tanggal Ketetapan</label>
              <input type="text" value="<?php echo $EksekusiTgl; ?>" class="form-control datepicker" id="EksekusiTgl" name="EksekusiTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="EksekusiNo">Nomor Ketetapan</label>
              <input type="text" value="<?php echo $EksekusiNo; ?>" class="form-control" id="EksekusiNo" name="EksekusiNo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="EksekusiAlasan">Alasan Mati / Daluarsa</label>
              <textarea  class="form-control" id="EksekusiAlasan" name="EksekusiAlasan"><?php echo $EksekusiAlasan; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="EksekusiLamaPidana">Lama Pidana yang Dijalankan</label>
              <textarea  class="form-control" id="EksekusiLamaPidana" name="EksekusiLamaPidana"><?php echo $EksekusiLamaPidana; ?></textarea>
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab8">
            <fieldset>
              <legend>Pelepasan Bersyarat</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="LBTglHakim">Tanggal Keputusan Menteri Kehakiman</label>
              <input type="text" value="<?php echo $LBTglHakim; ?>" class="form-control datepicker" id="LBTglHakim" name="LBTglHakim">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="LBNoHakim">Nomor Keputusan Menteri Kehakiman</label>
              <input type="text" value="<?php echo $LBNoHakim; ?>" class="form-control" id="LBNoHakim" name="LBNoHakim">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="LBTglPelaksanaan">Tanggal Pelaksanaan</label>
              <input type="text" value="<?php echo $LBTglPelaksanaan; ?>" class="form-control datepicker" id="LBTglPelaksanaan" name="LBTglPelaksanaan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="LBTglPercobaan">Tanggal Masa Percobaan Berakhir</label>
              <input type="text" value="<?php echo $LBTglPercobaan; ?>" class="form-control datepicker" id="LBTglPercobaan" name="LBTglPercobaan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="KejariLepas">Kejari yang melepas</label>
              <input type="text" value="<?php echo $KejariLepas; ?>" class="form-control" id="KejariLepas" name="KejariLepas">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="KejariAwas">Kejari yang mengawasi</label>
              <input type="text" value="<?php echo $KejariAwas; ?>" class="form-control" id="KejariAwas" name="KejariAwas">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Bispa">Balai Bispa</label>
              <input type="text" value="<?php echo $Bispa; ?>" class="form-control" id="Bispa" name="Bispa">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="KediamanTpd">Tempat Kediaman Terpidana</label>
              <textarea  class="form-control" id="KediamanTpd" name="KediamanTpd"><?php echo $KediamanTpd; ?></textarea>
            </div>
            </fieldset>
		</div>
            <!-- ============================== -->
        <div class="tab-pane" id="tab9">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rp12">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rp12" name="keterangan_rp12"><?php echo $keterangan_rp12; ?></textarea>
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitrp12" id="submitrp12" value="Simpan Data" />                                  
               </div>
            </div>
		</div>
        <ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">Awal</a></li>
			<li class="previous"><a href="#">Sebelum</a></li>
			<li class="next last" style="display:none;"><a href="#">Akhir</a></li>
		  	<li class="next"><a href="#">Berikut</a></li>
		</ul>
		</div> <!--Tab Content-->
            </form>
	</div> <!--Root Wizard-->
</div> <!--Row-->

<script>
window.onbeforeunload = function(){
  return 'Are you sure you want to leave?';
};
</script>