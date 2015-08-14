<?php
  //Data RPA4
  $data                   			= isset($value[0])?$value[0]:array();
  $id_rpa4                			= isset($data["id_rpa4"])?$data["id_rpa4"]:"";
  $register_rpa4          			= isset( $data["register_rpa4"])?$data["register_rpa4"]:"";
  $tgl_rpa4	         	  			= (isset( $data["tgl_rpa4"] ) && $data["tgl_rpa4"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_rpa4"])):"";
  $diversi_kesepakatan_penyidik	  	= isset( $data["diversi_kesepakatan_penyidik"])?$data["diversi_kesepakatan_penyidik"]:"";
  $no_tap_ketua_pn_penyidik    	  	= isset( $data["no_tap_ketua_pn_penyidik"])?$data["no_tap_ketua_pn_penyidik"]:"";
  $tgl_tap_ketua_pn_penyidik   	  	= (isset( $data["tgl_tap_ketua_pn_penyidik"] ) && $data["tgl_tap_ketua_pn_penyidik"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_tap_ketua_pn_penyidik"])):"";
  $no_sp3          		  			= isset( $data["no_sp3"])?$data["no_sp3"]:"";
  $tgl_sp3         		  			= (isset( $data["tgl_sp3"] ) && $data["tgl_sp3"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_sp3"])):"";
  $lap_penelitian_kemasyarakatan    = isset( $data["lap_penelitian_kemasyarakatan"])?$data["lap_penelitian_kemasyarakatan"]:"";
  $tgl_terima_berkas         		= (isset( $data["tgl_terima_berkas"] ) && $data["tgl_terima_berkas"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_terima_berkas"])):"";
  $pihak_diversi_pu          		= isset( $data["pihak_diversi_pu"])?$data["pihak_diversi_pu"]:"";
  $tgl_diversi_pu         		  	= (isset( $data["tgl_diversi_pu"] ) && $data["tgl_diversi_pu"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_diversi_pu"])):"";
  $no_kesepakatan_pu          		= isset( $data["no_kesepakatan_pu"])?$data["no_kesepakatan_pu"]:"";
  $tgl_kesepakatan_pu         		= (isset( $data["tgl_kesepakatan_pu"] ) && $data["tgl_kesepakatan_pu"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_kesepakatan_pu"])):"";
  $no_tap_ketua_pn_pu          		= isset( $data["no_tap_ketua_pn_pu"])?$data["no_tap_ketua_pn_pu"]:"";
  $tgl_tap_ketua_pn_pu         		= (isset( $data["tgl_tap_ketua_pn_pu"] ) && $data["tgl_tap_ketua_pn_pu"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_tap_ketua_pn_pu"])):"";
  $no_skpp_pu          		  		= isset( $data["no_skpp_pu"])?$data["no_skpp_pu"]:"";
  $tgl_skpp_pu         		  		= (isset( $data["tgl_skpp_pu"] ) && $data["tgl_skpp_pu"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_skpp_pu"])):"";
  $no_pelimpahan_pn          		= isset( $data["no_pelimpahan_pn"])?$data["no_pelimpahan_pn"]:"";
  $tgl_pelimpahan_pn         		= (isset( $data["tgl_pelimpahan_pn"] ) && $data["tgl_pelimpahan_pn"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_pelimpahan_pn"])):"";
  $diversi_kesepakatan_hakim        = isset( $data["diversi_kesepakatan_hakim"])?$data["diversi_kesepakatan_hakim"]:"";
  $no_tap_ketua_pn_hakim          	= isset( $data["no_tap_ketua_pn_hakim"])?$data["no_tap_ketua_pn_hakim"]:"";
  $tgl_tap_ketua_pn_hakim         	= (isset( $data["tgl_tap_ketua_pn_hakim"] ) && $data["tgl_tap_ketua_pn_hakim"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_tap_ketua_pn_hakim"])):"";
  $no_skpp_hakim          		  	= isset( $data["no_skpp_hakim"])?$data["no_skpp_hakim"]:"";
  $tgl_skpp_hakim         		  	= (isset( $data["tgl_skpp_hakim"] ) && $data["tgl_skpp_hakim"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_skpp_hakim"])):"";
  $keterangan_rpa4          		= isset( $data["keterangan_rpa4"])?$data["keterangan_rpa4"]:"";
  
  //Data RPA3
  $data                   		= isset($rpa3[0])?$rpa3[0]:array();
  $id_rpa3                		= isset($data["id_rpa3"])?$data["id_rpa3"]:"";
  $register_rpa3          		= isset( $data["register_rpa3"])?$data["register_rpa3"]:"";
 
  //Data RPA2
  $data                   = isset($rpa2[0])?$rpa2[0]:array();
  $id_rpa2                = isset($data["id_rpa2"])?$data["id_rpa2"]:"";
  $register_rpa2          = isset( $data["register_rpa2"])?$data["register_rpa2"]:"";
  
  //Data RPA1
  $data                   = isset($rpa1[0])?$rpa1[0]:array();
  $id_rpa1                = isset($data["id_rpa1"])?$data["id_rpa1"]:"";
  $register_rpa1          = isset( $data["register_rpa1"])?$data["register_rpa1"]:"";
  $suspect_id             = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $no_p16          		  = isset( $data["no_p16"])?$data["no_p16"]:"";
  $tgl_p16         		  = (isset( $data["tgl_p16"] ) && $data["tgl_p16"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_p16"])):"";
  $tgl_spdp         	  = (isset( $data["tgl_spdp"] ) && $data["tgl_spdp"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_spdp"])):"";
  $no_spdp           	  = isset( $data["no_spdp"])?$data["no_spdp"]:"";
  $tgl_spdp_diterima      = (isset( $data["tgl_spdp_diterima"]) && $data["tgl_spdp_diterima"]!='0000-00-00' )?date("d/m/Y", strtotime($data["tgl_spdp_diterima"])):"";
  $pasal_tindak_pidana    = isset( $data["pasal_tindak_pidana"])?$data["pasal_tindak_pidana"]:"";
  $kasus_posisi         = isset( $data["kasus_posisi"])?$data["kasus_posisi"]:"";
  $jenis_jumlah_bukti   = isset( $data["jenis_jumlah_bukti"])?$data["jenis_jumlah_bukti"]:"";
  
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

<h3 class="page-header">Form RPA 4</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab4" data-toggle="tab">Kasus</a></li>
                <li><a href="#tab5" data-toggle="tab">Diversi Penyidik</a></li>
                <li><a href="#tab6" data-toggle="tab">Diversi Penuntut Umum</a></li>
                <li><a href="#tab7" data-toggle="tab">Diversi Hakim</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form method="post" action="<?php echo base_url(); ?>index.php/rpa4/save">
            <input type="hidden" name="rpa3_id" value="<?php echo $id_rpa3;?>" />
            <input type="hidden" name="id_rpa4" value="<?php echo $id_rpa4;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa1">Register RPA 1</label>
                  <input readonly type="text" value="<?php echo $register_rpa1; ?>" class="form-control" readonly="readonly" id="register_rpa1" name="register_rpa1">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa2">Register RPA 2</label>
                  <input readonly type="text" value="<?php echo $register_rpa2; ?>" class="form-control" id="register_rpa2" name="register_rpa2" placeholder="No Register RPA 2">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa3">Register RPA 3</label>
                  <input readonly type="text" value="<?php echo $register_rpa3; ?>" class="form-control" id="register_rpa3" name="register_rpa3" placeholder="No Register RPA 3">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa4">Register RPA 4</label>
                  <input type="text" value="<?php echo $register_rpa4; ?>" class="form-control" id="register_rpa4" name="register_rpa4" placeholder="No Register RPA 2">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_rpa4">Tanggal </label>
                  <input type="text" value="<?php echo $tgl_rpa4; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_rpa4" id="tgl_rpa4" placeholder="DD/MM/YYYY">
                </div>
               	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_spdp">No SPDP</label>
                  <input readonly type="text" value="<?php echo $no_spdp; ?>" class="form-control" id="no_spdp" name="no_spdp">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_spdp">Tanggal SPDP </label>
                  <input readonly type="text" value="<?php echo $tgl_spdp; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_spdp" id="tgl_spdp" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_spdp_diterima">Tanggal SPDP Diterima</label>
                  <input readonly type="text" value="<?php echo $tgl_spdp_diterima; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_spdp_diterima" id="tgl_spdp_diterima" placeholder="DD/MM/YYYY">
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
                  <label class="col-sm-3 control-label" for="kasus_posisi">Kasus Posisi</label>
                  <textarea readonly class="form-control" id="kasus_posisi" name="kasus_posisi" placeholder="Waktu Kejadian"><?php echo $kasus_posisi; ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="pasal_tindak_pidana">Pasal Tindak Pidana</label>
                  <textarea readonly class="form-control" id="pasal_tindak_pidana" name="pasal_tindak_pidana" placeholder="Pasal"><?php echo $pasal_tindak_pidana; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="jenis_jumlah_bukti">Jenis & Jumlah Barang Bukti</label>
                  <textarea readonly class="form-control" id="jenis_jumlah_bukti" name="jenis_jumlah_bukti" placeholder="Jenis & Jumlah Barang Bukti"><?php echo $jenis_jumlah_bukti; ?></textarea>
                </div>                    
              </div>

              <div class="tab-pane" id="tab5">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="diversi_kesepakatan_penyidik">Hasil Kesepakatan</label>
                  <textarea class="form-control" id="diversi_kesepakatan_penyidik" name="diversi_kesepakatan_penyidik" placeholder="Keterangan"><?php echo $diversi_kesepakatan_penyidik; ?></textarea>
                </div> 
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_tap_ketua_pn_penyidik">No TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $no_tap_ketua_pn_penyidik; ?>" class="form-control" id="no_tap_ketua_pn_penyidik" name="no_tap_ketua_pn_penyidik" placeholder="No Surat Tuntutan">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_tap_ketua_pn_penyidik">Tanggal TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $tgl_tap_ketua_pn_penyidik; ?>" class="form-control datepicker" id="tgl_tap_ketua_pn_penyidik" name="tgl_tap_ketua_pn_penyidik" placeholder="DD/MM/YYYY">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_sp3">No SP3</label>
                  <input type="text" value="<?php echo $no_sp3; ?>" class="form-control" id="no_sp3" name="no_sp3" placeholder="No SP3">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_sp3">Tanggal SP3</label>
                  <input type="text" value="<?php echo $tgl_sp3; ?>" class="form-control datepicker" id="tgl_sp3" name="tgl_sp3" placeholder="DD/MM/YYYY">
                </div>  
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_terima_berkas">Tanggal Terima Berkas</label>
                  <input type="text" value="<?php echo $tgl_terima_berkas; ?>" class="form-control datepicker" id="tgl_terima_berkas" name="tgl_terima_berkas" placeholder="DD/MM/YYYY">
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lap_penelitian_kemasyarakatan">Laporan Penelitian Masyarakat</label>
                  <textarea class="form-control" id="lap_penelitian_kemasyarakatan" name="lap_penelitian_kemasyarakatan" placeholder="Keterangan"><?php echo $lap_penelitian_kemasyarakatan; ?></textarea>
                </div>                    
              </div>

              <div class="tab-pane" id="tab6">     
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_diversi_pu">Tanggal Diversi</label>
                  <input type="text" value="<?php echo $tgl_diversi_pu; ?>" class="form-control datepicker" id="tgl_diversi_pu" name="tgl_diversi_pu" placeholder="DD/MM/YYYY">
                </div>     
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="pihak_diversi_pu">Pihak Diversi</label>
                  <textarea class="form-control" id="pihak_diversi_pu" name="pihak_diversi_pu" placeholder="Keterangan"><?php echo $pihak_diversi_pu; ?></textarea>
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_kesepakatan_pu">No Hasil Kesepakatan</label>
                  <input type="text" value="<?php echo $no_kesepakatan_pu; ?>" class="form-control" id="no_kesepakatan_pu" name="no_kesepakatan_pu" placeholder="No Surat Tuntutan">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_kesepakatan_pu">Tanggal Hasil Kesepakatan</label>
                  <input type="text" value="<?php echo $tgl_kesepakatan_pu; ?>" class="form-control datepicker" id="tgl_kesepakatan_pu" name="tgl_kesepakatan_pu" placeholder="DD/MM/YYYY">
                </div>   
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_tap_ketua_pn_pu">No TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $no_tap_ketua_pn_pu; ?>" class="form-control" id="no_tap_ketua_pn_pu" name="no_tap_ketua_pn_pu" placeholder="No TAP">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_tap_ketua_pn_pu">Tanggal TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $tgl_tap_ketua_pn_pu; ?>" class="form-control datepicker" id="tgl_tap_ketua_pn_pu" name="tgl_tap_ketua_pn_pu" placeholder="DD/MM/YYYY">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_skpp_pu">No SKPP</label>
                  <input type="text" value="<?php echo $no_sp3; ?>" class="form-control" id="no_skpp_pu" name="no_skpp_pu" placeholder="No SKPP">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_skpp_pu">Tanggal SKPP</label>
                  <input type="text" value="<?php echo $tgl_skpp_pu; ?>" class="form-control datepicker" id="tgl_skpp_pu" name="tgl_skpp_pu" placeholder="DD/MM/YYYY">
                </div>  
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_pelimpahan_pn">No Pelimpahan ke PN</label>
                  <input type="text" value="<?php echo $no_pelimpahan_pn; ?>" class="form-control" id="no_pelimpahan_pn" name="no_pelimpahan_pn" placeholder="No Pelimpahan ke PN">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_pelimpahan_pn">Tanggal Pelimpahan ke PN</label>
                  <input type="text" value="<?php echo $tgl_pelimpahan_pn; ?>" class="form-control datepicker" id="tgl_pelimpahan_pn" name="tgl_pelimpahan_pn" placeholder="DD/MM/YYYY">
                </div>  
                
              </div>
			
              <div class="tab-pane" id="tab7">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="diversi_kesepakatan_hakim">Hasil Kesepakatan</label>
                  <textarea class="form-control" id="diversi_kesepakatan_hakim" name="diversi_kesepakatan_hakim" placeholder="Keterangan"><?php echo $diversi_kesepakatan_hakim; ?></textarea>
                </div> 
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="no_tap_ketua_pn_hakim">No TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $no_tap_ketua_pn_hakim; ?>" class="form-control" id="no_tap_ketua_pn_hakim" name="no_tap_ketua_pn_hakim" placeholder="No Surat TAP">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_tap_ketua_pn_hakim">Tanggal TAP Ketua P.N.</label>
                  <input type="text" value="<?php echo $tgl_tap_ketua_pn_hakim; ?>" class="form-control datepicker" id="tgl_tap_ketua_pn_hakim" name="tgl_tap_ketua_pn_hakim" placeholder="DD/MM/YYYY">
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_skpp_hakim">No SKPP</label>
                  <input type="text" value="<?php echo $no_skpp_hakim; ?>" class="form-control" id="no_skpp_hakim" name="no_skpp_hakim" placeholder="No SKPP">
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_skpp_hakim">Tanggal SKPP</label>
                  <input type="text" value="<?php echo $tgl_skpp_hakim; ?>" class="form-control datepicker" id="tgl_skpp_hakim" name="tgl_skpp_hakim" placeholder="DD/MM/YYYY">
                </div>      
              </div>
              
              <div class="tab-pane" id="tab8">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="keterangan_rpa4">Keterangan</label>
                  <textarea class="form-control" id="keterangan_rpa4" name="keterangan_rpa4" placeholder="Keterangan"><?php echo $keterangan_rpa4; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitrpa4" id="submitrpa4" value="Simpan Data" />                                  
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

