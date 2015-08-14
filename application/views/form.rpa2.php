<?php
 
  //Data RPA1
  $data                   = isset($rpa1[0])?$rpa1[0]:array();
  $id_rpa1                = isset($data["id_rpa1"])?$data["id_rpa1"]:"";
  $register_rpa1          = isset( $data["register_rpa1"])?$data["register_rpa1"]:"";
  $suspect_id             = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $no_p16          = isset( $data["no_p16"])?$data["no_p16"]:"";
  $tgl_p16         = (isset( $data["tgl_p16"] ) && $data["tgl_p16"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_p16"])):"";
  $no_penahanan            = isset( $data["no_penahanan"])?$data["no_penahanan"]:"";
  $tgl_penahanan           = (isset( $data["tgl_penahanan"] ) && $data["tgl_penahanan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_penahanan"])):"";
  $no_perpanjangan         = isset( $data["no_perpanjangan"])?$data["no_perpanjangan"]:"";
  $tgl_perpanjangan        = (isset( $data["tgl_perpanjangan"] ) && $data["tgl_perpanjangan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_perpanjangan"])):"";

  //Data RPA2
  $data                   = isset($value[0])?$value[0]:array();
  $id_rpa2                = isset($data["id_rpa2"])?$data["id_rpa2"]:"";
  $register_rpa2          = isset( $data["register_rpa2"])?$data["register_rpa2"]:"";
  $tgl_rpa2        = (isset( $data["tgl_rpa2"] ) && $data["tgl_rpa2"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_rpa2"])):"";
  $no_pn          = isset( $data["no_pn"])?$data["no_pn"]:"";
  $tgl_pn        = (isset( $data["tgl_pn"] ) && $data["tgl_pn"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_pn"])):"";
  $no_tuntutan          = isset( $data["no_tuntutan"])?$data["no_tuntutan"]:"";
  $tgl_tuntutan        = (isset( $data["tgl_tuntutan"] ) && $data["tgl_tuntutan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_tuntutan"])):"";
  $isi_tuntutan          = isset( $data["isi_tuntutan"])?$data["isi_tuntutan"]:"";
  $no_putusan_pn          = isset( $data["no_putusan_pn"])?$data["no_putusan_pn"]:"";
  $tgl_putusan_pn        = (isset( $data["tgl_putusan_pn"] ) && $data["tgl_putusan_pn"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_putusan_pn"])):"";
  $putusan_pn          = isset( $data["putusan_pn"])?$data["putusan_pn"]:"";
  $jenis_upaya_hukum          = isset( $data["jenis_upaya_hukum"])?$data["jenis_upaya_hukum"]:"";
  $tgl_upaya_hukum        = (isset( $data["tgl_upaya_hukum"] ) && $data["tgl_upaya_hukum"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_upaya_hukum"])):"";
  $putusan_pt_ma          = isset( $data["putusan_pt_ma"])?$data["putusan_pt_ma"]:"";
  $keterangan_rpa2          = isset( $data["keterangan_rpa2"])?$data["keterangan_rpa2"]:"";
  
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
?>

<h3 class="page-header">Form RPA 2</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab4" data-toggle="tab">Penahanan</a></li>
                <li><a href="#tab5" data-toggle="tab">Tuntutan</a></li>
                <li><a href="#tab6" data-toggle="tab">Putusan Pengadilan Negeri</a></li>
                <li><a href="#tab7" data-toggle="tab">Upaya Hukum</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" action="<?php echo base_url(); ?>index.php/rpa2/save">
            <input type="hidden" name="rpa1_id" value="<?php echo $id_rpa1;?>" />
            <input type="hidden" name="id_rpa2" value="<?php echo $id_rpa2;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa1">Register RPA 1</label>
                  <input type="text" value="<?php echo $register_rpa1; ?>" class="form-control" readonly="readonly" id="register_rpa1" name="register_rpa1">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa2">Register RPA 2</label>
                  <input type="text" value="<?php echo $register_rpa2; ?>" class="form-control" id="register_rpa2" name="register_rpa2" placeholder="No Register RPA 2">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_rpa2">Tanggal </label>
                  <input type="text" value="<?php echo $tgl_rpa2; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_rpa2" id="tgl_rpa2" placeholder="DD/MM/YYYY">
                </div>
               	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_pn">No Pelimpahan ke PN</label>
                  <input type="text" value="<?php echo $no_pn; ?>" class="form-control" id="no_pn" name="no_pn" placeholder="No Pelimpahan ke PN">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_pn">Tanggal Pelimpahan ke PN </label>
                  <input type="text" value="<?php echo $tgl_pn; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_pn" id="tgl_pn" placeholder="DD/MM/YYYY">
                </div>
              </div>
              <div class="tab-pane" id="tab2">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NamaTersangka">Nama</label>
                  <input readonly="readonly" type="text" value="<?php echo $NamaTersangka; ?>" class="form-control" id="NamaTersangka" name="NamaTersangka" placeholder="Nama Tersangka">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TempatLahir">Tempat Lahir</label>
                  <input readonly="readonly" type="text" value="<?php echo $TempatLahir; ?>" class="form-control" id="TempatLahir" name="TempatLahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalLahir">Tanggal Lahir</label>
                  <input readonly="readonly" type="text" value="<?php echo $TanggalLahir; ?>" class="form-control datepicker" id="TanggalLahir" name="TanggalLahir" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="JenisKelamin">Jenis Kelamin</label>                  
                  <input readonly="readonly" type="text" value="<?php echo $JenisKelamin; ?>" class="form-control" id="JenisKelamin" name="JenisKelamin">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="WargaNegara">Warga Negara / Kebangsaan</label>
                  <input readonly="readonly" type="text" value="<?php echo $WargaNegara; ?>" class="form-control" id="WargaNegara" name="WargaNegara" placeholder="Warga Negara ">
                </div>                                         
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Alamat">Alamat</label>
                  <textarea readonly="readonly" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat"><?php echo $Alamat ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Agama">Agama</label>
                  <input readonly="readonly" type="text" value="<?php echo $Agama; ?>" class="form-control" id="Agama" name="Agama">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Pekerjaan">Pekerjaan</label>
                  <input readonly="readonly" type="text" value="<?php echo $Pekerjaan; ?>" class="form-control" id="Pekerjaan" name="Pekerjaan" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Pendidikan">Pendidikan</label>
                  <input readonly="readonly" type="text" value="<?php echo $Pendidikan; ?>" class="form-control" id="Pendidikan" name="Pendidikan" placeholder="SD/SMP/SMA/Sarjana">
                </div>                                                
              </div>

              <div class="tab-pane" id="tab3">
               	<div class="form-group">
                    <label class="col-sm-3 control-label" for="no_p16">Nomor P16</label>
                    <input readonly="readonly" type="text" value="<?php echo $no_p16; ?>" class="form-control" id="no_p16" name="no_p16" placeholder="Nomor Surat P16">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_p16">Tanggal P16</label>
                    <input readonly="readonly" type="text" value="<?php echo $tgl_p16; ?>" class="form-control datepicker" id="tgl_p16" name="tgl_p16" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Jaksa">Jaksa Peneliti</label>
                  <select class="form-control" id="Jaksa" name="Jaksa[]">
                    <option>--Pilih Jaksa--</option>
                    <?php
                      if( isset($attorney) and !empty($attorney) ): 
                      foreach( $attorney as $val ):
                    ?>
                    <option value="<?php echo $val['id_attorney']; ?>"><?php echo $val['name_attorney']; ?></option>
                    <?php 
                      endforeach;
                      endif; 
                    ?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="addAttorney"></label>
                  <a class="addAttorney btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Jaksa</a>
                </div>                                        
              </div>

              <div class="tab-pane" id="tab4">                
                <fieldset>
                  <legend>Penahanan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_penahanan">Nomor</label>
                    <input readonly="readonly" type="text" value="<?php echo $no_penahanan; ?>" class="form-control" id="no_penahanan" name="no_penahanan" placeholder="Nomor Surat Penahanan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_penahanan">Tanggal</label>
                    <input readonly="readonly" type="text" value="<?php echo $tgl_penahanan; ?>" class="form-control datepicker" id="tgl_penahanan" name="tgl_penahanan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>
                
                <fieldset>
                  <legend>Perpanjangan Penahanan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_perpanjangan">Nomor</label>
                    <input readonly="readonly" type="text" value="<?php echo $no_perpanjangan; ?>" class="form-control" id="no_perpanjangan" name="no_perpanjangan" placeholder="Nomor Surat Perpanjangan Penahanan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_perpanjangan">Tanggal</label>
                    <input readonly="readonly" type="text" value="<?php echo $tgl_perpanjangan; ?>" class="form-control datepicker" id="tgl_perpanjangan" name="tgl_perpanjangan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>                                  
              </div>

              <div class="tab-pane" id="tab5">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_tuntutan">No Surat Tuntutan</label>
                  <input type="text" value="<?php echo $no_tuntutan; ?>" class="form-control" id="no_tuntutan" name="no_tuntutan" placeholder="No Surat Tuntutan">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_tuntutan">Tanggal Surat Tuntutan</label>
                  <input type="text" value="<?php echo $tgl_tuntutan; ?>" class="form-control datepicker" id="tgl_tuntutan" name="tgl_tuntutan" placeholder="DD/MM/YYYY">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="isi_tuntutan">Isi Tuntutan</label>
                  <textarea class="form-control" id="isi_tuntutan" name="isi_tuntutan" placeholder="Keterangan"><?php echo $isi_tuntutan; ?></textarea>
                </div>                  
              </div>

              <div class="tab-pane" id="tab6">            
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_putusan_pn">No Putusan PN</label>
                    <input type="text" value="<?php echo $no_putusan_pn; ?>" class="form-control" id="no_putusan_pn" name="no_putusan_pn" placeholder="Nomor Putusan PN">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_putusan_pn">Tanggal Putusan PN</label>
                    <input type="text" value="<?php echo $tgl_putusan_pn; ?>" class="form-control datepicker" id="tgl_putusan_pn" name="tgl_putusan_pn" placeholder="DD/MM/YYYY">
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="putusan_pn">Amar Putusan PN</label>
                      <textarea class="form-control" id="putusan_pn" name="putusan_pn" placeholder="Keterangan"><?php echo $putusan_pn; ?></textarea>
                  </div>               
              </div>
			
              <div class="tab-pane" id="tab7">
                
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="jenis_upaya_hukum">Jenis Upaya Hukum</label>
                    <input type="text" value="<?php echo $jenis_upaya_hukum; ?>" class="form-control" id="jenis_upaya_hukum" name="jenis_upaya_hukum" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_upaya_hukum">Tanggal Upaya Hukum</label>
                    <input type="text" value="<?php echo $tgl_upaya_hukum; ?>" class="form-control datepicker" id="tgl_upaya_hukum" name="tgl_upaya_hukum" placeholder="DD/MM/YYYY">
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="putusan_pt_ma">Amar Putusan PT/MA</label>
                      <textarea class="form-control" id="putusan_pt_ma" name="putusan_pt_ma" placeholder="Amar Putusan PT/MA"><?php echo $putusan_pt_ma; ?></textarea>
                  </div>             
              </div>
              
              <div class="tab-pane" id="tab8">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="keterangan_rpa2">Keterangan</label>
                  <textarea class="form-control" id="keterangan_rpa2" name="keterangan_rpa2" placeholder="Keterangan"><?php echo $keterangan_rpa2; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitrpa2" id="submitrpa2" value="Simpan Data" />                                  
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

