<?php
  //Data RP-6
  $data                   = isset($rp6[0])?$rp6[0]:array();
  $Id_Rp6                 = isset( $data["id_rp6"])?$data["id_rp6"]:"";
  $SuspectId              = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $Pasal                  = isset( $data["pasal"])?$data["pasal"]:"";

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
  $data_rt2       = isset($value[0])?$value[0]:array();
  $id_rt2         = isset( $data_rt2["id_rt2"])?$data_rt2["id_rt2"]:"";
  $register_rt2   = isset( $data_rt2["register_rt2"])?$data_rt2["register_rt2"]:"";
  $tgl_rt2        = (isset( $data_rt2["tgl_rt2"]) && $data_rt2["tgl_rt2"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["tgl_rt2"])):"";
  $no_ketetapan   = isset( $data_rt2["no_ketetapan"])?$data_rt2["no_ketetapan"]:"";
  $tgl_sp3        = (isset( $data_rt2["sp3_tgl"]) && $data_rt2["sp3_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["sp3_tgl"])):"";
  $no_sp3         = isset( $data_rt2["sp3_no"])?$data_rt2["sp3_no"]:"";
  $lama_sp3       = (isset( $data_rt2["sp3_tgl_ditahan"]) && $data_rt2["sp3_tgl_ditahan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["sp3_tgl_ditahan"])):"";
  $pp_mulai       = (isset( $data_rt2["pp_dari_pu_mulai"]) && $data_rt2["pp_dari_pu_mulai"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["pp_dari_pu_mulai"])):"";
  $pp_akhir       = (isset( $data_rt2["pp_dari_pu_sampai"]) && $data_rt2["pp_dari_pu_sampai"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["pp_dari_pu_sampai"])):"";
  $penangguhan    = (isset( $data_rt2["ditangguhkan_mulai"]) && $data_rt2["ditangguhkan_mulai"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt2["ditangguhkan_mulai"])):"";
  $keterangan_rt2 = isset( $data_rt2["keterangan_rt2"])?$data_rt2["keterangan_rt2"]:"";

?>


<h3 class="page-header">Form Register Tahanan 2 (RT 2)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Identitas Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Pasal</a></li>
                <li><a href="#tab4" data-toggle="tab">Penahanan</a></li>
                <li><a href="#tab5" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rt2/save">
            <input type="hidden" name="suspect_id" value="<?php echo $SuspectId;?>" />
            <input type="hidden" name="rp6_id" value="<?php echo $Id_Rp6;?>" />
            <input type="hidden" name="id_rt2" value="<?php echo $id_rt2;?>" />
    <div class="tab-content">
    	<div class="tab-pane" id="tab1">
            <div class="form-group">
              <label for="register_rt2" class="col-sm-3 control-label">No Register</label>
                <input  type="text" value="<?php echo $register_rt2; ?>" class="form-control" id="register_rt2" name="register_rt2">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rt2">Tanggal</label>
              <input  type="text" value="<?php echo $tgl_rt2; ?>" class="form-control datepicker" id="tgl_rt2" name="tgl_rt2">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="no_ketetapan">No Ketetapan Perpanjang Penahanan</label>
              <input  type="text" value="<?php echo $no_ketetapan; ?>" class="form-control" id="no_ketetapan" name="no_ketetapan">
            </div>
        </div>
        <div class="tab-pane" id="tab2">
            <fieldset>
            <legend>Identitas Tersangka</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NamaTersangka">Nama</label>
              <input readonly="readonly"  type="text" value="<?php echo $NamaTersangka; ?>" class="form-control" id="NamaTersangka" name="NamaTersangka">
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
         <div class="tab-pane" id="tab3">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="pasal">Pasal yang disangkakan</label>
              <textarea readonly="readonly"  class="form-control" id="pasal" name="pasal"><?php echo $Pasal; ?></textarea>
            </div>
		 </div>
         <div class="tab-pane" id="tab4">
            <!-- =============================== -->
            <div class="form-group">
              <label class="col-sm-3 control-label" for="no_sp3">No Surat Perintah Penahanan Penyidik</label>
              <input type="text" value="<?php echo $no_sp3; ?>" class="form-control" id="no_sp3" name="no_sp3">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_sp3">Tanggal Surat Perintah Penahanan Penyidik</label>
              <input type="text" value="<?php echo $tgl_sp3; ?>" class="form-control datepicker" id="tgl_sp3" name="tgl_sp3">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="lama_sp3">Tanggal Mulai Ditahan</label>
              <input type="text" value="<?php echo $lama_sp3; ?>" class="form-control datepicker" id="lama_sp3" name="lama_sp3">
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <label class="col-sm-3 control-label" for="pp_mulai">Perpanjang Penahanan oleh Penuntut Umum</label>
              <input type="text" value="<?php echo $pp_mulai; ?>" style="display:inline" class="form-control datepicker" id="pp_mulai" name="pp_mulai">
              - <input type="text" value="<?php echo $pp_akhir; ?>" style="display:inline" class="form-control datepicker" id="pp_akhir" name="pp_akhir">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="penangguhan">Penangguhan Penahanan oleh Penyidik mulai tanggal </label>
              <input type="text" value="<?php echo $penangguhan; ?>" class="form-control datepicker" id="penangguhan" name="penangguhan">
            </div>
         </div>
            <!-- ============================== -->
         <div class="tab-pane" id="tab5">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rt2">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rt2" name="keterangan_rt2"><?php echo $keterangan_rt2; ?></textarea>
            </div>
            <!-- ============================== -->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitRt2" id="submitRt2" value="Simpan Data" />                                  
              </div>
            </div>
		</div>
		<ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">Awal</a></li>
			<li class="previous"><a href="#">Sebelum</a></li>
			<li class="next last" style="display:none;"><a href="#">Akhir</a></li>
		  	<li class="next"><a href="#">Berikut</a></li>
		</ul>
    </div>
            </form>
</div> <!--RootWizard-->
</div> <!--Row-->



