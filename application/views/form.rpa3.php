<?php
  //Data RPA3
  $data                   		= isset($value[0])?$value[0]:array();
  $id_rpa3                		= isset($data["id_rpa3"])?$data["id_rpa3"]:"";
  $register_rpa3          		= isset( $data["register_rpa3"])?$data["register_rpa3"]:"";
  $tgl_rpa3			         	= (isset( $data["tgl_rpa3"] ) && $data["tgl_rpa3"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_rpa3"])):"";
  $no_eksekusi_anak          	= isset( $data["no_eksekusi_anak"])?$data["no_eksekusi_anak"]:"";
  $tgl_eksekusi_anak         	= (isset( $data["tgl_eksekusi_anak"] ) && $data["tgl_eksekusi_anak"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_eksekusi_anak"])):"";
  $no_eksekusi_bukti          	= isset( $data["no_eksekusi_bukti"])?$data["no_eksekusi_bukti"]:"";
  $tgl_eksekusi_bukti         	= (isset( $data["tgl_eksekusi_bukti"] ) && $data["tgl_eksekusi_bukti"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_eksekusi_bukti"])):"";
  $no_eksekusi_biaya          	= isset( $data["no_eksekusi_biaya"])?$data["no_eksekusi_biaya"]:"";
  $tgl_eksekusi_biaya         	= (isset( $data["tgl_eksekusi_biaya"] ) && $data["tgl_eksekusi_biaya"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_eksekusi_biaya"])):"";
  $keterangan_rpa3          	= isset( $data["no_p16"])?$data["keterangan_rpa3"]:"";
 
  //Data RPA1
  $data                   = isset($rpa1[0])?$rpa1[0]:array();
  $id_rpa1                = isset($data["id_rpa1"])?$data["id_rpa1"]:"";
  $register_rpa1          = isset( $data["register_rpa1"])?$data["register_rpa1"]:"";
  $suspect_id             = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $no_p16          		  = isset( $data["no_p16"])?$data["no_p16"]:"";
  $tgl_p16         		  = (isset( $data["tgl_p16"] ) && $data["tgl_p16"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_p16"])):"";

  //Data RPA2
  $data                   = isset($rpa2[0])?$rpa2[0]:array();
  $id_rpa2                = isset($data["id_rpa2"])?$data["id_rpa2"]:"";
  $register_rpa2          = isset( $data["register_rpa2"])?$data["register_rpa2"]:"";
  $no_putusan_pn          = isset( $data["no_putusan_pn"])?$data["no_putusan_pn"]:"";
  $tgl_putusan_pn         = (isset( $data["tgl_putusan_pn"] ) && $data["tgl_putusan_pn"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_putusan_pn"])):"";
  $putusan_pn          	  = isset( $data["putusan_pn"])?$data["putusan_pn"]:"";
  $putusan_pt_ma          = isset( $data["putusan_pt_ma"])?$data["putusan_pt_ma"]:"";
  $keterangan_rpa2        = isset( $data["keterangan_rpa2"])?$data["keterangan_rpa2"]:"";
  
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

<h3 class="page-header">Form RPA 3</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab4" data-toggle="tab">Putusan</a></li>
                <li><a href="#tab5" data-toggle="tab">Eksekusi</a></li>
                <li><a href="#tab6" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" action="<?php echo base_url(); ?>index.php/rpa3/save">
            <input type="hidden" name="rpa2_id" value="<?php echo $id_rpa2;?>" />
            <input type="hidden" name="id_rpa3" value="<?php echo $id_rpa3;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa1">Register RPA 1</label>
                  <input type="text" value="<?php echo $register_rpa1; ?>" class="form-control" readonly="readonly" id="register_rpa1" name="register_rpa1">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa2">Register RPA 2</label>
                  <input type="text" value="<?php echo $register_rpa2; ?>" class="form-control" id="register_rpa2" name="register_rpa2" readonly>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa2">Register RPA 3</label>
                  <input type="text" value="<?php echo $register_rpa3; ?>" class="form-control" id="register_rpa3" name="register_rpa3" placeholder="No Register RPA 3">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_rpa3">Tanggal </label>
                  <input type="text" value="<?php echo $tgl_rpa3; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_rpa3" id="tgl_rpa3" placeholder="DD/MM/YYYY">
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
                
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_putusan_pn">Nomor</label>
                    <input readonly="readonly" type="text" value="<?php echo $no_putusan_pn; ?>" class="form-control" id="no_putusan_pn" name="no_putusan_pn">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_putusan_pn">Tanggal</label>
                    <input readonly="readonly" type="text" value="<?php echo $tgl_putusan_pn; ?>" class="form-control datepicker" id="tgl_putusan_pn" name="tgl_putusan_pn" placeholder="DD/MM/YYYY">
                  </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label" for="putusan_pn">Amar Putusan</label>
                  <textarea readonly class="form-control" id="putusan_pn" name="putusan_pn" placeholder="Keterangan"><?php echo $putusan_pn; ?></textarea>
                </div>                 
              </div>

              <div class="tab-pane" id="tab5">                                
                <fieldset>
                  <legend>Eksekusi Anak</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_eksekusi_anak">Nomor</label>
                    <input type="text" value="<?php echo $no_eksekusi_anak; ?>" class="form-control" id="no_eksekusi_anak" name="no_eksekusi_anak" placeholder="Nomor Surat">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_eksekusi_anak">Tanggal</label>
                    <input type="text" value="<?php echo $tgl_eksekusi_anak; ?>" class="form-control datepicker" id="tgl_eksekusi_anak" name="tgl_eksekusi_anak" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>
                
                <fieldset>
                  <legend>Eksekusi Barang Bukti</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_eksekusi_bukti">Nomor</label>
                    <input type="text" value="<?php echo $no_eksekusi_bukti; ?>" class="form-control" id="no_eksekusi_bukti" name="no_eksekusi_bukti" placeholder="Nomor Surat">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_eksekusi_bukti">Tanggal</label>
                    <input type="text" value="<?php echo $tgl_eksekusi_bukti; ?>" class="form-control datepicker" id="tgl_eksekusi_bukti" name="tgl_eksekusi_bukti" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>     
                <fieldset>
                  <legend>Eksekusi Biaya Perkara</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_eksekusi_biaya">Nomor</label>
                    <input type="text" value="<?php echo $no_eksekusi_biaya; ?>" class="form-control" id="no_eksekusi_biaya" name="no_eksekusi_biaya" placeholder="Nomor Surat ">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_eksekusi_biaya">Tanggal</label>
                    <input type="text" value="<?php echo $tgl_eksekusi_biaya; ?>" class="form-control datepicker" id="tgl_eksekusi_biaya" name="tgl_eksekusi_biaya" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>           
              </div>
              
              <div class="tab-pane" id="tab6">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="keterangan_rpa3">Keterangan</label>
                  <textarea class="form-control" id="keterangan_rpa3" name="keterangan_rpa3" placeholder="Keterangan"><?php echo $keterangan_rpa3; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitrpa3" id="submitrpa3" value="Simpan Data" />                                  
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

