<?php
  //Data RP-6
  $data                   = isset($rp6[0])?$rp6[0]:array();
  $Id_Rp6                 = isset( $data["id_rp6"])?$data["id_rp6"]:"";
  $SuspectId              = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $Pasal                  = isset( $data["pasal"])?$data["pasal"]:"";
  $TglPenyerahan          = isset( $data["date"])?date("d/m/Y", strtotime($data["date"])):"";
  $NoSuratPenyerahan      = isset( $data["registration_no"])?$data["registration_no"]:"";
  $TglTerimaKejaksaan     = isset( $data["date_received"])?date("d/m/Y", strtotime($data["date_received"])):"";
  $Instansi               = isset( $data["institution"])?$data["institution"]:"";
  $RegisterRp6            = isset( $data["register_rp6"])?$data["register_rp6"]:"";

  //Data RT 2
  $data_rt2         = isset($rt2[0])?$rt2[0]:array();
  $register_tahanan = isset( $data_rt2["register_rt2"])?$data_rt2["register_rt2"]:"";

  //Data Suspect
  $suspects       = isset($suspect[0])?$suspect[0]:array();
  $NamaTersangka  = isset( $suspects["name_suspect"])?$suspects["name_suspect"]:"";
  $TempatLahir    = isset( $suspects["birthplace"])?$suspects["birthplace"]:"";
  $TanggalLahir   = isset( $suspects["birthdate"] )?date("d/m/Y", strtotime($suspects["birthdate"])):"";
  $JenisKelamin   = isset( $suspects["gender"])?$suspects["gender"]:"";
  $WargaNegara    = isset( $suspects["nationality"])?$suspects["nationality"]:"";
  $Alamat         = isset( $suspects["address"])?$suspects["address"]:"";
  $Pekerjaan      = isset( $suspects["job"])?$suspects["job"]:"";
  $Pendidikan     = isset( $suspects["education"])?$suspects["education"]:"";
  $Agama          = isset( $suspects["religion"])?$suspects["religion"]:"";

  //Data RT 2
  $data_rp7       = isset($value[0])?$value[0]:array();
  $id_rp7         = isset( $data_rp7["id_rp7"])?$data_rp7["id_rp7"]:"";
  $register_rp7   = isset( $data_rp7["register_rp7"])?$data_rp7["register_rp7"]:"";
  $tgl_rp7        = (isset( $data_rp7["tgl_rp7"]) && $data_rp7["tgl_rp7"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_rp7"])):"";
  //$register_tahanan   = isset( $data_rp7["register_tahanan"])?$data_rp7["register_tahanan"]:"";
  $tgl_p19        = (isset( $data_rp7["date_p19"]) && $data_rp7["date_p19"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["date_p19"])):"";
  $no_p19         = isset( $data_rp7["no_p19"])?$data_rp7["no_p19"]:"";
  $tgl_kembali    = (isset($data_rp7["tgl_terima_kembali_penyidik"]) && $data_rp7["tgl_terima_kembali_penyidik"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_terima_kembali_penyidik"])):"";
  $petunjuk       = isset( $data_rp7["petunjuk_belum_terpenuhi"])?$data_rp7["petunjuk_belum_terpenuhi"]:"";
  $tgl_tambahan   = (isset($data_rp7["tgl_pemeriksaan_tambahan"]) && $data_rp7["tgl_pemeriksaan_tambahan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_pemeriksaan_tambahan"])):"";
  $tgl_lengkap    = (isset($data_rp7["tgl_lengkap"]) && $data_rp7["tgl_lengkap"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_lengkap"])):"";
  $tgl_setelah_p19 = (isset($data_rp7["tgl_setelah_dilengkapi_penyidik"]) && $data_rp7["tgl_setelah_dilengkapi_penyidik"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_setelah_dilengkapi_penyidik"])):"";
  $tgl_tahap2     = (isset($data_rp7["tgl_bp_tahap2"]) && $data_rp7["tgl_bp_tahap2"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp7["tgl_bp_tahap2"])):"";
  $keterangan_rp7 = isset( $data_rp7["keterangan_rp7"])?$data_rp7["keterangan_rp7"]:"";

?>


<h3 class="page-header">Form Register Perkara 7 (RP 7)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Berkas Perkara</a></li>
                <li><a href="#tab3" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab4" data-toggle="tab">Pasal &amp; Jaksa</a></li>
                <li><a href="#tab5" data-toggle="tab">Berkas Tidak Lengkap</a></li>
                <li><a href="#tab6" data-toggle="tab">Berkas Lengkap</a></li>
                <li><a href="#tab7" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rp7/save">
            <input type="hidden" name="rp6_id" value="<?php echo $Id_Rp6;?>" />
            <input type="hidden" name="id_rp7" value="<?php echo $id_rp7;?>" />
	<div class="tab-content">
    	<div class="tab-pane" id="tab1">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="register_rp7">Register RP7</label>
              <input type="text" value="<?php echo $register_rp7; ?>" class="form-control" id="register_rp7" name="register_rp7">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rp7">Tanggal RP7</label>
              <input type="text" value="<?php echo $tgl_rp7; ?>" class="form-control datepicker" id="tgl_rp7" name="tgl_rp7">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRp6">Register RP6</label>
              <input readonly="readonly" type="text" value="<?php echo $RegisterRp6; ?>" class="form-control" id="RegisterRp6" name="RegisterRp6">
            </div>

            <div class="form-group">
              <label for="register_tahanan" class="col-sm-3 control-label">Register RT2</label>
                <input readonly="readonly" type="text" value="<?php echo $register_tahanan; ?>" class="form-control" id="register_tahanan" name="register_tahanan">
            </div>
         </div>
         <div class="tab-pane" id="tab2">
            <fieldset>
              <legend>Penerimaan Berkas Perkara</legend>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenyerahan">Tanggal Surat Penyerahan</label>
              <input readonly="readonly"  type="text" value="<?php echo $TglPenyerahan; ?>" class="form-control datepicker" id="TglPenyerahan" name="TglPenyerahan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoSuratPenyerahan">No Surat Penyerahan</label>
              <input readonly="readonly"  type="text" value="<?php echo $NoSuratPenyerahan; ?>" class="form-control" id="NoSuratPenyerahan" name="NoSuratPenyerahan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Instansi">Instansi</label>
              <input readonly="readonly"  type="text" value="<?php echo $Instansi; ?>" class="form-control" id="Instansi" name="Instansi">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglTerimaKejaksaan">Tanggal Terima Kejaksaan</label>
              <input readonly="readonly"  type="text" value="<?php echo $TglTerimaKejaksaan; ?>" class="form-control datepicker" id="TglTerimaKejaksaan" name="TglTerimaKejaksaan">
            </div>
            </fieldset>
		</div>
            <!-- ====================================== -->
        <div class="tab-pane" id="tab3">
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
        <div class="tab-pane" id="tab4">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="pasal">Pasal yang disangkakan</label>
              <textarea readonly="readonly"  class="form-control" id="pasal" name="pasal"><?php echo $Pasal; ?></textarea>
            </div>
            <?php
				if(isset($attorney)){
					foreach($attorney as $nox=>$valx){
			?>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NamaJaksa">Jaksa Peneliti <?php echo $nox+1; ?></label>
              <input readonly="readonly"  type="text" value="<?php echo $valx["name_attorney"]; ?>" class="form-control" id="NamaJaksa" name="NamaJaksa">
            </div>
            <?php
					}
				}
			?>
            
        </div>
            <!-- =============================== -->
        <div class="tab-pane" id="tab5">
            <fieldset>
              <legend>Berkas Tidak Lengkap</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_p19">Tanggal P19</label>
              <input  type="text" value="<?php echo $tgl_p19; ?>" class="form-control datepicker" id="tgl_p19" name="tgl_p19">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="no_p19">No P19</label>
              <input  type="text" value="<?php echo $no_p19; ?>" class="form-control" id="no_p19" name="no_p19">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_kembali">Tanggal Terima Kembali Penyidik</label>
              <input type="text" value="<?php echo $tgl_kembali; ?>" class="form-control datepicker" id="tgl_kembali" name="tgl_kembali">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="petunjuk">Petunjuk Belum Terpenuhi</label>
              <textarea  class="form-control" id="petunjuk" name="petunjuk"><?php echo $petunjuk; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_tambahan">Tanggal Pemeriksaan Tambahan</label>
              <input type="text" value="<?php echo $tgl_tambahan; ?>" class="form-control datepicker" id="tgl_tambahan" name="tgl_tambahan">
            </div>
          </fieldset>
        </div>
            <!-- ============================== -->
        <div class="tab-pane" id="tab6">
            <fieldset>
              <legend>Berkas Lengkap</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_lengkap">Tanggal Telah Lengkap</label>
              <input type="text" value="<?php echo $tgl_lengkap; ?>" class="form-control datepicker" id="tgl_lengkap" name="tgl_lengkap">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_setelah_p19">Tanggal Setelah Dilengkapi Penyidik </label>
              <input type="text" value="<?php echo $tgl_setelah_p19; ?>" class="form-control datepicker" id="tgl_setelah_p19" name="tgl_setelah_p19">
            </div>
          </fieldset>
          <hr />
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_tahap2">Tanggal Berkas Perkara Tahap II </label>
              <input type="text" value="<?php echo $tgl_tahap2; ?>" class="form-control datepicker" id="tgl_tahap2" name="tgl_tahap2">
            </div>
		</div>
            <!-- ============================== -->
        <div class="tab-pane" id="tab7">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rp7">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rp7" name="keterangan_rp7"><?php echo $keterangan_rp7; ?></textarea>
            </div>
            <!-- ============================== -->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitrp7" id="submitrp7" value="Simpan Data" />                                  
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

