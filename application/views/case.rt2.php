<?php
  //Data RP-6
  $data_rp6               = isset($rp6[0])?$rp6[0]:array();
  $Id_Rp6                 = isset( $data_rp6["id_rp6"])?$data_rp6["id_rp6"]:"";
  $SuspectId              = isset( $data_rp6["suspect_id"])?$data_rp6["suspect_id"]:"";
  $Pasal                  = isset( $data_rp6["pasal"])?$data_rp6["pasal"]:"";

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
  
  $register_rt2   = isset( $data_rt2["register_rt2"])?$data_rt2["register_rt2"]:"";
  $tgl_rt2        = isset( $data_rt2["tgl_rt2"])?date("d/m/Y", strtotime($data_rt2["tgl_rt2"])):"";
  $no_ketetapan   = isset( $data_rt2["no_ketetapan"])?$data_rt2["no_ketetapan"]:"";
  $tgl_sp3        = isset( $data_rt2["sp3_tgl"])?date("d/m/Y", strtotime($data_rt2["sp3_tgl"])):"";
  $no_sp3         = isset( $data_rt2["sp3_no"])?$data_rt2["sp3_no"]:"";
  $lama_sp3       = isset( $data_rt2["sp3_tgl_ditahan"])?date("d/m/Y", strtotime($data_rt2["sp3_tgl_ditahan"])):"";
  $pp_mulai       = isset( $data_rt2["pp_dari_pu_mulai"])?date("d/m/Y", strtotime($data_rt2["pp_dari_pu_mulai"])):"";
  $pp_akhir       = isset( $data_rt2["pp_dari_pu_sampai"])?date("d/m/Y", strtotime($data_rt2["pp_dari_pu_sampai"])):"";
  $penangguhan    = isset( $data_rt2["ditangguhkan_mulai"])?date("d/m/Y", strtotime($data_rt2["ditangguhkan_mulai"])):"";
  $keterangan_rt2     = isset( $data_rt2["keterangan_rt2"])?$data_rt2["keterangan_rt2"]:"";
?>

<h3 class="page-header">Lihat Data Register Tahanan 2 (RT 2)</h3>
          <div class="row">
            
            <div class="form-group">
              <label for="register_rt2" class="col-sm-3 control-label">No Register</label>
                <input readonly="readonly"  type="text" value="<?php echo $register_rt2; ?>" class="form-control" id="register_rt2" name="register_rt2">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rt2">Tanggal</label>
              <input readonly="readonly"  type="text" value="<?php echo $tgl_rt2; ?>" class="form-control datepicker" id="tgl_rt2" name="tgl_rt2">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="no_ketetapan">No Ketetapan Perpanjang Penahanan</label>
              <input readonly="readonly"  type="text" value="<?php echo $no_ketetapan; ?>" class="form-control" id="no_ketetapan" name="no_ketetapan">
            </div>

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
            <div class="form-group">
              <label class="col-sm-3 control-label" for="pasal">Pasal yang disangkakan</label>
              <textarea readonly="readonly"  class="form-control" id="pasal" name="pasal"><?php echo $Pasal; ?></textarea>
            </div>

            <!-- =============================== -->
            <div class="form-group">
              <label class="col-sm-3 control-label" for="no_sp3">No Surat Perintah Penahanan Penyidik</label>
              <input readonly="readonly" type="text" value="<?php echo $no_sp3; ?>" class="form-control" id="no_sp3" name="no_sp3">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_sp3">Tanggal Surat Perintah Penahanan Penyidik</label>
              <input readonly="readonly" type="text" value="<?php echo $tgl_sp3; ?>" class="form-control datepicker" id="tgl_sp3" name="tgl_sp3">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="lama_sp3">Tanggal Mulai Ditahan</label>
              <input readonly="readonly" type="text" value="<?php echo $lama_sp3; ?>" class="form-control datepicker" id="lama_sp3" name="lama_sp3">
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <label class="col-sm-3 control-label" for="pp_mulai">Perpanjang Penahanan oleh Penuntut Umum</label>
              <input readonly="readonly" type="text" value="<?php echo $pp_mulai; ?>" style="display:inline" class="form-control datepicker" id="pp_mulai" name="pp_mulai">
              - <input readonly="readonly" type="text" value="<?php echo $pp_akhir; ?>" style="display:inline" class="form-control datepicker" id="pp_akhir" name="pp_akhir">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="penangguhan">Penangguhan Penahanan oleh Penyidik mulai tanggal </label>
              <input readonly="readonly" type="text" value="<?php echo $penangguhan; ?>" class="form-control datepicker" id="penangguhan" name="penangguhan">
            </div>
            <!-- ============================== -->
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rt2">Keterangan</label>
              <textarea readonly="readonly" class="form-control" id="keterangan_rt2" name="keterangan_rt2"><?php echo $keterangan_rt2; ?></textarea>
            </div>
            <!-- ============================== -->
            <div class="form-group">
              <a href="<?php echo base_url().'index.php/rt2/'?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> <b>Kembali ke Register Tahanan 2</b> </a>                                  
            </div>
          </div>
