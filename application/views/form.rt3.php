<?php
  //Data RP-12
  $data_rp12      = isset( $rp12[0])?$rp12[0]:array();
  $id_rp12        = isset( $data_rp12["id_rp12"])?$data_rp12["id_rp12"]:"";
  $RegisterRP12   = isset( $data_rp12["register_rp12"])?$data_rp12["register_rp12"]:"";

  //Data RP-9
  $data_rp9       = isset( $rp9[0])?$rp9[0]:array();
  $PasalDakwaan   = isset( $data_rp9["pasal_dakwaan"])?$data_rp9["pasal_dakwaan"]:"";
  $Jaksa1         = isset( $data_rp9["jpu1"])?$data_rp9["jpu1"]:"";
  $Jaksa2         = isset( $data_rp9["jpu2"])?$data_rp9["jpu2"]:"";  

  //Data RP-12
  $data_rp6      = isset( $rp6[0])?$rp6[0]:array();
  $id_rp6        = isset( $data_rp6["id_rp6"])?$data_rp6["id_rp6"]:"";
  
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
  
  //Data Jaksa
  $attorney1      = isset($attorney1[0])?$attorney1[0]:array();
  $NamaJaksa1     = isset( $attorney1["name_attorney"])?$attorney1["name_attorney"]:"";
  $attorney2      = isset($attorney2[0])?$attorney2[0]:array();
  $NamaJaksa2     = isset( $attorney2["name_attorney"])?$attorney2["name_attorney"]:"";

  //Data RP 9
  $data_rt3         = isset($rt3[0])?$rt3[0]:array();
  $id_rt3           = isset( $data_rt3["id_rt3"])?$data_rt3["id_rt3"]:"";
  $RegisterRT3      = isset( $data_rt3["register_rt3"])?$data_rt3["register_rt3"]:"";
  $tgl_rt3    = ( isset($data_rt3["tgl_rt3"]) && $data_rt3["tgl_rt3"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["tgl_rt3"])):"";
  $PenyidikanTahanan = isset( $data_rt3["penyidikan_jenis"])?$data_rt3["penyidikan_jenis"]:"";
  $PenyidikanTgl    = ( isset($data_rt3["penyidikan_tgl"]) && $data_rt3["penyidikan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penyidikan_tgl"])):"";
  $LamaTahanan      = isset( $data_rt3["penyidikan_lama"])?$data_rt3["penyidikan_lama"]:"";
  $PenuntutanTahanan = isset( $data_rt3["penuntutan_jenis"])?$data_rt3["penuntutan_jenis"]:"";
  $PenuntutanTgl    = ( isset($data_rt3["penuntutan_tgl"]) && $data_rt3["penuntutan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_tgl"])):"";
  $Pengalihan       = isset( $data_rt3["penuntutan_pengalihan"])?$data_rt3["penuntutan_pengalihan"]:"";
  $PengalihanTgl    = ( isset($data_rt3["penuntutan_pengalihan_tgl"]) && $data_rt3["penuntutan_pengalihan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_pengalihan_tgl"])):"";
  $Penangguhan      = isset( $data_rt3["penuntutan_penangguhan"])?$data_rt3["penuntutan_penangguhan"]:"";
  $PenangguhanTgl   = ( isset($data_rt3["penuntutan_penangguhan_tgl"]) && $data_rt3["penuntutan_penangguhan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_penangguhan_tgl"])):"";
  $Pencabutan       = isset( $data_rt3["penuntutan_pencabutan"])?$data_rt3["penuntutan_pencabutan"]:"";
  $PencabutanTgl    = ( isset($data_rt3["penuntutan_pencabutan_tgl"]) && $data_rt3["penuntutan_pencabutan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_pencabutan_tgl"])):"";
  $Dikeluarkan      = isset( $data_rt3["penuntutan_dikeluarkan"])?$data_rt3["penuntutan_dikeluarkan"]:"";
  $DikeluarkanTgl   = ( isset($data_rt3["penuntutan_dikeluarkan_tgl"]) && $data_rt3["penuntutan_dikeluarkan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_dikeluarkan_tgl"])):"";
  $Perpanjang       = isset( $data_rt3["penuntutan_diperpanjang"])?$data_rt3["penuntutan_diperpanjang"]:"";
  $PerpanjangTgl    = ( isset($data_rt3["penuntutan_diperpanjang_tgl"]) && $data_rt3["penuntutan_diperpanjang_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["penuntutan_diperpanjang_tgl"])):"";
  $PNTgl            = ( isset($data_rt3["pn_tgl"]) && $data_rt3["pn_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["pn_tgl"])):"";
  $PNNo             = isset( $data_rt3["pn_no"])?$data_rt3["pn_no"]:"";
  $PNLama           = isset( $data_rt3["pn_lama_ditahan"])?$data_rt3["pn_lama_ditahan"]:"";
  $PTTgl            = ( isset($data_rt3["pt_tgl"]) && $data_rt3["pt_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["pt_tgl"])):"";
  $PTNo             = isset( $data_rt3["pt_no"])?$data_rt3["pt_no"]:"";
  $PTLama           = isset( $data_rt3["pt_lama_ditahan"])?$data_rt3["pt_lama_ditahan"]:"";
  $MATgl            = ( isset($data_rt3["ma_tgl"]) && $data_rt3["ma_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["ma_tgl"])):"";
  $MANo             = isset( $data_rt3["ma_no"])?$data_rt3["ma_no"]:"";
  $MALama           = isset( $data_rt3["ma_lama_ditahan"])?$data_rt3["ma_lama_ditahan"]:"";
  $AmarPnTgl        = ( isset($data_rt3["amar_pn_tgl"]) && $data_rt3["amar_pn_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["amar_pn_tgl"])):"";
  $AmarPnNo         = isset( $data_rt3["amar_pn_no"])?$data_rt3["amar_pn_no"]:"";
  $AmarPtTgl        = ( isset($data_rt3["amar_pt_tgl"]) && $data_rt3["amar_pt_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["amar_pt_tgl"])):"";
  $AmarPtNo         = isset( $data_rt3["amar_pt_no"])?$data_rt3["amar_pt_no"]:"";
  $AmarMaTgl        = ( isset($data_rt3["amar_ma_tgl"]) && $data_rt3["amar_ma_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rt3["amar_ma_tgl"])):"";
  $AmarMaNo         = isset( $data_rt3["amar_ma_no"])?$data_rt3["amar_ma_no"]:"";
  $Pelaksanaan      = isset( $data_rt3["pelaksanaan_putusan"])?$data_rt3["pelaksanaan_putusan"]:"";

  $keterangan_rt3   = isset( $data_rt3["keterangan_rt3"])?$data_rt3["keterangan_rt3"]:"";

?>

<script type="text/javascript">
$(document).ready(function(){
  $("#Jaksa1").val(<?php echo $Jaksa1;?>);
  $("#Jaksa2").val(<?php echo $Jaksa2;?>);
});
</script>

<h3 class="page-header">Form Register Tahanan 3 (RT 3)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Identitas Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Pasal &amp; Jaksa</a></li>
                <li><a href="#tab4" data-toggle="tab">Tahap Penyidikan</a></li>
                <li><a href="#tab5" data-toggle="tab">Tahap Penuntutan</a></li>
                <li><a href="#tab6" data-toggle="tab">Status Tahanan</a></li>
                <li><a href="#tab7" data-toggle="tab">Amar Putusan</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rt3/save">
            <input type="hidden" name="rp12_id" value="<?php echo $id_rp12;?>" />
            <input type="hidden" name="rp6_id" value="<?php echo $id_rp6;?>" />
            <input type="hidden" name="id_rt3" value="<?php echo $id_rt3;?>" />
	<div class="tab-content">
    	<div class="tab-pane" id="tab1">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRP12">No Register RP 12</label>
              <input readonly="readonly" type="text" value="<?php echo $RegisterRP12; ?>" class="form-control" id="RegisterRP12" name="RegisterRP12">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRT3">Register RT3</label>
              <input type="text" value="<?php echo $RegisterRT3; ?>" class="form-control" id="RegisterRT3" name="RegisterRT3">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rt3">Tanggal</label>
              <input  type="text" value="<?php echo $tgl_rt3; ?>" class="form-control datepicker" id="tgl_rt3" name="tgl_rt3">
            </div>
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
        <div class="tab-pane" id="tab3">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PasalDakwaan">Tindak Pidana yang didakwakan</label>
              <textarea readonly='readonly' class="form-control" id="pasal" name="PasalDakwaan"><?php echo $PasalDakwaan; ?></textarea>
            </div>
            <!-- ================================================== -->  
            <fieldset>
              <legend>Jaksa Penuntut Umum</legend>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NamaJaksa1">Jaksa Peneliti 1</label>
                  <input readonly="readonly"  type="text" value="<?php echo $NamaJaksa1; ?>" class="form-control" id="NamaJaksa1" name="NamaJaksa1">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NamaJaksa2">Jaksa Peneliti 2 </label>
                  <input readonly="readonly"  type="text" value="<?php echo $NamaJaksa2; ?>" class="form-control" id="NamaJaksa2" name="NamaJaksa2">
                </div>
            </fieldset>

            <!-- ================================================== -->  

            <div class="form-group">
              <label class="col-sm-3 control-label" for="PasalDakwaan">Pasal yang didakwakan</label>
              <input readonly="readonly" type="text" value="<?php echo $PasalDakwaan; ?>" class="form-control" id="PasalDakwaan" name="PasalDakwaan">
            </div>
		</div>
            <!-- ================================================== -->  
        <div class="tab-pane" id="tab4">
            <fieldset>
            <legend>Tahap Penyidikan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PenyidikanTahanan">Jenis Tahanan</label>
              <input  type="text" value="<?php echo $PenyidikanTahanan; ?>" class="form-control" id="PenyidikanTahanan" name="PenyidikanTahanan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PenyidikanTgl">Tanggal</label>
              <input  type="text" value="<?php echo $PenyidikanTgl; ?>" class="form-control datepicker" id="PenyidikanTgl" name="PenyidikanTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="LamaTahanan">Lama Ditahan</label>
              <input  type="text" value="<?php echo $LamaTahanan; ?>" class="form-control" id="LamaTahanan" name="LamaTahanan">
            </div> 
            </fieldset>
		</div>
        <div class="tab-pane" id="tab5">
            <fieldset>
              <legend>Tahap Penuntutan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PenuntutanTahanan">Jenis Tahanan</label>
              <input type="text" value="<?php echo $PenuntutanTahanan; ?>" class="form-control" id="PenuntutanTahanan" name="PenuntutanTahanan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PenuntutanTgl">Tanggal Berita Acara Tahanan</label>
              <input type="text" value="<?php echo $PenuntutanTgl; ?>" class="form-control datepicker" id="PenuntutanTgl" name="PenuntutanTgl">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pengalihan">Pengalihan</label>
              <input type="text" value="<?php echo $Pengalihan; ?>" class="form-control" id="Pengalihan" name="Pengalihan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PengalihanTgl">Tanggal Berita Acara Pengalihan</label>
              <input type="text" value="<?php echo $PengalihanTgl; ?>" class="form-control datepicker" id="PengalihanTgl" name="PengalihanTgl">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Penangguhan">Penangguhan</label>
              <input type="text" value="<?php echo $Penangguhan; ?>" class="form-control" id="Penangguhan" name="Penangguhan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PenangguhanTgl">Tanggal Berita Acara Penangguhan</label>
              <input type="text" value="<?php echo $PenangguhanTgl; ?>" class="form-control datepicker" id="PenangguhanTgl" name="PenangguhanTgl">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pencabutan">Pencabutan</label>
              <input type="text" value="<?php echo $Pencabutan; ?>" class="form-control" id="Pencabutan" name="Pencabutan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PencabutanTgl">Tanggal Berita Acara Pencabutan</label>
              <input type="text" value="<?php echo $PencabutanTgl; ?>" class="form-control datepicker" id="PencabutanTgl" name="PencabutanTgl">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Dikeluarkan">Dikeluarkan</label>
              <input type="text" value="<?php echo $Dikeluarkan; ?>" class="form-control" id="Dikeluarkan" name="Dikeluarkan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="DikeluarkanTgl">Tanggal Berita Acara Dikeluarkan</label>
              <input type="text" value="<?php echo $DikeluarkanTgl; ?>" class="form-control datepicker" id="DikeluarkanTgl" name="DikeluarkanTgl">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Perpanjang">Diperpanjang Ketua PN </label>
              <input type="text" value="<?php echo $Perpanjang; ?>" class="form-control" id="Perpanjang" name="Perpanjang">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PerpanjangTgl">Tanggal Berita Acara Diperpanjang Ketua PN</label>
              <input type="text" value="<?php echo $PerpanjangTgl; ?>" class="form-control datepicker" id="PerpanjangTgl" name="PerpanjangTgl">
            </div>

            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab6">
            <fieldset>
              <legend>Status Tahanan Pengadilan Negeri</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PNTgl">Tanggal</label>
              <input type="text" value="<?php echo $PNTgl; ?>" class="form-control datepicker" id="PNTgl" name="PNTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PNNo">Nomor</label>
              <input type="text" value="<?php echo $PNNo; ?>" class="form-control" id="PNNo" name="PNNo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PNLama">Lama Ditahan</label>
              <input type="text" value="<?php echo $PNLama; ?>" class="form-control" id="PNLama" name="PNLama">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Status Tahanan Pengadilan Tinggi</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PTTgl">Tanggal</label>
              <input type="text" value="<?php echo $PTTgl; ?>" class="form-control datepicker" id="PTTgl" name="PTTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PTNo">Nomor</label>
              <input type="text" value="<?php echo $PTNo; ?>" class="form-control" id="PTNo" name="PTNo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="PTLama">Lama Ditahan</label>
              <input type="text" value="<?php echo $PTLama; ?>" class="form-control" id="PTLama" name="PTLama">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Status Tahanan Mahkamah Agung</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="MATgl">Tanggal</label>
              <input type="text" value="<?php echo $MATgl; ?>" class="form-control datepicker" id="MATgl" name="MATgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="MANo">Nomor</label>
              <input type="text" value="<?php echo $MANo; ?>" class="form-control" id="MANo" name="MANo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="MALama">Lama Ditahan</label>
              <input type="text" value="<?php echo $MALama; ?>" class="form-control" id="MALama" name="MALama">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
        <div class="tab-pane" id="tab7">
            <fieldset>
              <legend>Amar Putusan Tentang Tahanan Oleh Pengadilan Negeri</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarPnTgl">Tanggal</label>
              <input type="text" value="<?php echo $AmarPnTgl; ?>" class="form-control datepicker" id="AmarPnTgl" name="AmarPnTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarPnNo">Nomor</label>
              <input type="text" value="<?php echo $AmarPnNo; ?>" class="form-control" id="AmarPnNo" name="AmarPnNo">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan Tentang Tahanan Oleh Pengadilan Tinggi</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarPtTgl">Tanggal</label>
              <input type="text" value="<?php echo $AmarPtTgl; ?>" class="form-control datepicker" id="AmarPtTgl" name="AmarPtTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarPtNo">Nomor</label>
              <input type="text" value="<?php echo $AmarPtNo; ?>" class="form-control" id="AmarPtNo" name="AmarPtNo">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan Tentang Tahanan Oleh Mahkamah Agung</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarMaTgl">Tanggal</label>
              <input type="text" value="<?php echo $AmarMaTgl; ?>" class="form-control datepicker" id="AmarMaTgl" name="AmarMaTgl">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AmarMaNo">Nomor</label>
              <input type="text" value="<?php echo $AmarMaNo; ?>" class="form-control" id="AmarMaNo" name="AmarMaNo">
            </div>
            </fieldset>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pelaksanaan">Putusan Dilaksanakan</label>
              <textarea  class="form-control" id="Pelaksanaan" name="Pelaksanaan"><?php echo $Pelaksanaan; ?></textarea>
            </div>
         </div>
            <!-- ============================== -->
         <div class="tab-pane" id="tab8">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rt3">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rt3" name="keterangan_rt3"><?php echo $keterangan_rt3; ?></textarea>
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitrt3" id="submitrt3" value="Simpan Data" />                                  
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

