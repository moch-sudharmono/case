<?php
  //Data RP-9
  $data           = isset( $rp9[0])?$rp9[0]:array();
  $id_rp9         = isset( $data["id_rp9"])?$data["id_rp9"]:"";
  $PasalDakwaan   = isset( $data["pasal_dakwaan"])?$data["pasal_dakwaan"]:"";
  $Jaksa1         = isset( $data["jpu1"])?$data["jpu1"]:"";
  $Jaksa2         = isset( $data["jpu2"])?$data["jpu2"]:"";

  //Data RP-6
  $data_rp6       = isset($rp6[0])?$rp6[0]:array();
  $RegistrationNo = isset($data_rp6["registration_no"])?$data_rp6["registration_no"]:"";

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

  //Data RB 2
  $data_rb2           = isset($rb2[0])?$rb2[0]:array();
  $id_rb2             = isset( $data_rb2["id_rb2"])?$data_rb2["id_rb2"]:"";
  $RegisterRB2        = isset( $data_rb2["register_rb2"])?$data_rb2["register_rb2"]:"";
  $TglPenerimaanBb    = (isset($data_rb2["tgl_penerimaan_bb"]) && $data_rb2["tgl_penerimaan_bb"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["tgl_penerimaan_bb"])):"";
  $JumlahUkuranJenis  = isset( $data_rb2["bb_juj"])?$data_rb2["bb_juj"]:"";
  $Penyimpanan        = isset( $data_rb2["penyimpanan"])?$data_rb2["penyimpanan"]:"";
  $TglPenyerahanPN    = (isset($data_rb2["tgl_penyerahan_pn"]) && $data_rb2["tgl_penyerahan_pn"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["tgl_penyerahan_pn"])):"";
  $NoPutusan          = isset( $data_rb2["putusan_no"])?$data_rb2["putusan_no"]:"";
  $TglPutusan         = (isset($data_rb2["putusan_tgl"]) && $data_rb2["putusan_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["putusan_tgl"])):"";
  $NoPutusanPT        = isset( $data_rb2["no_amar_pt"])?$data_rb2["no_amar_pt"]:"";
  $TglPutusanPT       = (isset($data_rb2["tgl_amar_pt"]) && $data_rb2["tgl_amar_pt"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["tgl_amar_pt"])):"";
  $NoPutusanMA        = isset( $data_rb2["no_amar_ma_rb2"])?$data_rb2["no_amar_ma_rb2"]:"";
  $TglPutusanMA       = (isset($data_rb2["tgl_amar_ma_rb2"]) && $data_rb2["tgl_amar_ma_rb2"]!= '0000-00-00')?date("d/m/Y", strtotime($data_rb2["tgl_amar_ma_rb2"])):"";
  $TglBAPutusan       = (isset($data_rb2["tgl_ba_pelaksanaan"]) && $data_rb2["tgl_ba_pelaksanaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["tgl_ba_pelaksanaan"])):"";
  $NoPengumumanTD     = isset( $data_rb2["bbtd_no_pengumuman"])?$data_rb2["bbtd_no_pengumuman"]:"";
  $TglPengumumanTD    = (isset($data_rb2["bbtd_tgl_pengumuman"]) && $data_rb2["bbtd_tgl_pengumuman"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bbtd_tgl_pengumuman"])):"";
  $NoPermohonanTD     = isset( $data_rb2["bbtd_no_lelang"])?$data_rb2["no_amar_banding"]:"";
  $TglPermohonanTD    = (isset($data_rb2["bbtd_tgl_lelang"]) && $data_rb2["bbtd_tgl_lelang"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bbtd_tgl_lelang"])):"";
  $TglPenyerahanTD    = (isset($data_rb2["bbtd_tgl_ba_pembinaan"]) && $data_rb2["bbtd_tgl_ba_pembinaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bbtd_tgl_ba_pembinaan"])):"";
  $NoPemanfaatanTD    = isset( $data_rb2["bbtd_no_pemanfaatan"])?$data_rb2["bbtd_no_pemanfaatan"]:"";
  $TglPemanfaatanTD   = (isset($data_rb2["bbtd_tgl_pemanfaatan"]) && $data_rb2["bbtd_tgl_pemanfaatan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bbtd_tgl_pemanfaatan"])):"";
  $TglBABT            = (isset($data_rb2["bt_tgl_ba"]) && $data_rb2["bt_tgl_ba"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bt_tgl_ba"])):"";
  $AsalInstansi       = isset( $data_rb2["bt_asal_instansi"])?$data_rb2["bt_asal_instansi"]:"";
  $TglPengumumanBT    = (isset($data_rb2["bt_tgl_pengumuman"]) && $data_rb2["bt_tgl_pengumuman"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bt_tgl_pengumuman"])):"";
  $NoPengumumanBT     = isset( $data_rb2["bt_no_pengumuman"])?$data_rb2["bt_no_pengumuman"]:"";
  $TglLelangBT        = (isset($data_rb2["bt_tgl_lelang"]) && $data_rb2["bt_tgl_lelang"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bt_tgl_lelang"])):"";
  $NoLelangBT         = isset( $data_rb2["bt_no_lelang"])?$data_rb2["bt_no_lelang"]:"";
  $TglPenyerahanBT    = (isset($data_rb2["bt_tgl_ba_pembinaan"]) && $data_rb2["bt_tgl_ba_pembinaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bt_tgl_ba_pembinaan"])):"";
  $NoPermohonanBT     = isset( $data_rb2["bt_no_pemanfaatan"])?$data_rb2["bt_no_pemanfaatan"]:"";
  $TglPermohonanBT    = (isset($data_rb2["bt_tgl_pemanfaatan"]) && $data_rb2["bt_tgl_pemanfaatan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rb2["bt_tgl_pemanfaatan"])):"";
  
  $keterangan_rb2     = isset( $data_rb2["keterangan_rb2"])?$data_rb2["keterangan_rb2"]:"";

?>
<script type="text/javascript">
$(document).ready(function(){
  
});
</script>

<h3 class="page-header">Form Register Barang Bukti 2 (RB 2)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Identitas Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Jaksa dan Pasal</a></li>
                <li><a href="#tab4" data-toggle="tab">Barang Bukti</a></li>
                <li><a href="#tab5" data-toggle="tab">Putusan</a></li>
                <li><a href="#tab6" data-toggle="tab">Barang Bukti yang Tidak Diambil</a></li>
                <li><a href="#tab7" data-toggle="tab">Barang Temuan</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rb2/save">
            <input type="hidden" name="rp9_id" value="<?php echo $id_rp9;?>" />
            <input type="hidden" name="id_rb2" value="<?php echo $id_rb2;?>" />
	<div class="tab-content">
    	<div class="tab-pane" id="tab1">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRB2">Register Barang Bukti</label>
              <input type="text" value="<?php echo $RegisterRB2; ?>" class="form-control" id="RegisterRB2" name="RegisterRB2">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegistrationNo">Register Perkara (RP6)</label>
              <input readonly="readonly"  type="text" value="<?php echo $RegistrationNo; ?>" class="form-control" id="RegistrationNo" name="RegistrationNo">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenerimaanBb">Tanggal Penerimaan Tanggung Jawab dari Penyidik</label>
              <input type="text" value="<?php echo $TglPenerimaanBb; ?>" class="form-control datepicker" id="TglPenerimaanBb" name="TglPenerimaanBb">
            </div>
     	</div>
        <div class="tab-pane" id="tab2">
            <!-- ====================================== -->
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
              <legend>Jaksa Penuntut Umum</legend>
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
            </fieldset>

            <!-- ================================================== -->  

            <div class="form-group">
              <label class="col-sm-3 control-label" for="PasalDakwaan">Pasal yang didakwakan</label>
              <input readonly="readonly" type="text" value="<?php echo $PasalDakwaan; ?>" class="form-control" id="PasalDakwaan" name="PasalDakwaan">
            </div>
		</div>
            <!-- ================================================== -->  
        <div class="tab-pane" id="tab4">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="JumlahUkuranJenis">Jumlah, Jenis, Ukuran</label>
              <textarea class="form-control" id="JumlahUkuranJenis" name="JumlahUkuranJenis"><?php echo $JumlahUkuranJenis; ?></textarea>
            </div>

            <!-- ================================================== -->              
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Penyimpanan">Penyimpanan/Penitipan/Pelelangan/Pemusnahan BB(No/Tgl Print, Tempat, Tgl BA)</label>
              <textarea class="form-control" id="Penyimpanan" name="Penyimpanan"><?php echo $Penyimpanan; ?></textarea>
            </div>
            </fieldset>

            <!-- ================================================== -->

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenyerahanPN">Tanggal Penyerahan ke Pengadilan Negeri</label>
              <input type="text" value="<?php echo $TglPenyerahanPN; ?>" class="form-control datepicker" id="TglPenyerahanPN" name="TglPenyerahanPN">
            </div>
         </div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab5">
            <fieldset>
              <legend>Putusan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPutusan">Tanggal Putusan</label>
              <input type="text" value="<?php echo $TglPutusan; ?>" class="form-control datepicker" id="TglPutusan" name="TglPutusan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPutusan">Nomor Putusan</label>
              <input type="text" value="<?php echo $NoPutusan; ?>" class="form-control" id="NoPutusan" name="NoPutusan">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPutusanPT">Tanggal Putusan PT</label>
              <input type="text" value="<?php echo $TglPutusanPT; ?>" class="form-control datepicker" id="TglPutusanPT" name="TglPutusanPT">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPutusanPT">Nomor Putusan PT</label>
              <input type="text" value="<?php echo $NoPutusanPT; ?>" class="form-control" id="NoPutusanPT" name="NoPutusanPT">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPutusanMA">Tanggal Putusan MA</label>
              <input type="text" value="<?php echo $TglPutusanMA; ?>" class="form-control datepicker" id="TglPutusanMA" name="TglPutusanMA">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPutusanMA">Nomor Putusan MA</label>
              <input type="text" value="<?php echo $NoPutusanMA; ?>" class="form-control" id="NoPutusanMA" name="NoPutusanMA">
            </div>

            </fieldset>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBAPutusan">Tanggal Berita Acara Pelaksanaan Putusan PN/PT/MA</label>
              <input type="text" value="<?php echo $TglBAPutusan; ?>" class="form-control datepicker" id="TglBAPutusan" name="TglBAPutusan">
            </div>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab6">
            <fieldset>
              <legend>Barang Bukti Tidak Diambil</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPengumumanTD">Tanggal Pengumuman</label>
              <input type="text" value="<?php echo $TglPengumumanTD; ?>" class="form-control datepicker" id="TglPengumumanTD" name="TglPengumumanTD">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPengumumanTD">Nomor Pengumuman</label>
              <input type="text" value="<?php echo $NoPengumumanTD; ?>" class="form-control" id="NoPengumumanTD" name="NoPengumumanTD">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPermohonanTD">Tanggal Permohonan Ijin Lelang</label>
              <input type="text" value="<?php echo $TglPermohonanTD; ?>" class="form-control datepicker" id="TglPermohonanTD" name="TglPermohonanTD">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPermohonanTD">Nomor Permohonan Ijin Lelang</label>
              <input type="text" value="<?php echo $NoPermohonanTD; ?>" class="form-control" id="NoPermohonanTD" name="NoPermohonanTD">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenyerahanTD">Tanggal Berita Acara Penyerahan ke Pembinaan</label>
              <input type="text" value="<?php echo $TglPenyerahanTD; ?>" class="form-control datepicker" id="TglPenyerahanTD" name="TglPenyerahanTD">
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPemanfaatanTD">Tanggal Pemanfaatan (Permohonan Ijin Kepada)</label>
              <input type="text" value="<?php echo $TglPemanfaatanTD; ?>" class="form-control datepicker" id="TglPemanfaatanTD" name="TglPemanfaatanTD">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPemanfaatanTD">Nomor Pemanfaatan (Permohonan Ijin Kepada)</label>
              <input type="text" value="<?php echo $NoPemanfaatanTD; ?>" class="form-control" id="NoPemanfaatanTD" name="NoPemanfaatanTD">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab7">
            <fieldset>
              <legend>Barang Temuan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBABT">Tanggal Berita Acara</label>
              <input type="text" value="<?php echo $TglBABT; ?>" class="form-control datepicker" id="TglBABT" name="TglBABT">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="AsalInstansi">Asal Instansi</label>
              <input type="text" value="<?php echo $AsalInstansi; ?>" class="form-control" id="AsalInstansi" name="AsalInstansi">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPengumumanBT">Tanggal Pengumuman</label>
              <input type="text" value="<?php echo $TglPengumumanBT; ?>" class="form-control datepicker" id="TglPengumumanBT" name="TglPengumumanBT">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPengumumanBT">No Pengumuman</label>
              <input type="text" value="<?php echo $NoPengumumanBT; ?>" class="form-control" id="NoPengumumanBT" name="NoPengumumanBT">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglLelangBT">Tanggal Permohonan Ijin Lelang</label>
              <input type="text" value="<?php echo $TglLelangBT; ?>" class="form-control datepicker" id="TglLelangBT" name="TglLelangBT">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoLelangBT">No Permohonan Ijin Lelang</label>
              <input type="text" value="<?php echo $NoLelangBT; ?>" class="form-control" id="NoLelangBT" name="NoLelangBT">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenyerahanBT">Tanggal Berita Acara Penyerahan ke Pembinaan</label>
              <input type="text" value="<?php echo $TglPenyerahanBT; ?>" class="form-control datepicker" id="TglPenyerahanBT" name="TglPenyerahanBT">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPermohonanBT">Tanggal Permohonan Ijin Kepada</label>
              <input type="text" value="<?php echo $TglPermohonanBT; ?>" class="form-control datepicker" id="TglPermohonanBT" name="TglPermohonanBT">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPermohonanBT">No Permohonan Ijin Kepada</label>
              <input type="text" value="<?php echo $NoPermohonanBT; ?>" class="form-control" id="NoPermohonanBT" name="NoPermohonanBT">
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
		<div class="tab-pane" id="tab8">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rb2">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rb2" name="keterangan_rb2"><?php echo $keterangan_rb2; ?></textarea>
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitrb2" id="submitrb2" value="Simpan Data" />                                  
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

