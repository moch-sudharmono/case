<script type="text/javascript">
$(document).ready(function() {
		$('#FormRpa1')
		// Add button click handler
        .on('click', '.addAttorney', function() {
            var $template = $('#optionTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $option   = $clone.find('[name="Jaksa[]"]');

        })

        // Remove button click handler
        .on('click', '.removeAttorney', function() {
            var $row    = $(this).parents('.form-group'),
                $option = $row.find('[name="Jaksa[]"]');

            // Remove element containing the option
            $row.remove();

        })
		
});
</script>


<?php
 
  //Data RPA1
  $data                   = isset($value[0])?$value[0]:array();
  $id_rpa1                = isset($data["id_rpa1"])?$data["id_rpa1"]:"";
  $register_rpa1          = isset( $data["register_rpa1"])?$data["register_rpa1"]:"";
  $tgl_spdp         	  = (isset( $data["tgl_spdp"] ) && $data["tgl_spdp"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_spdp"])):"";
  $no_spdp           	  = isset( $data["no_spdp"])?$data["no_spdp"]:"";
  $tgl_spdp_diterima      = (isset( $data["tgl_spdp_diterima"]) && $data["tgl_spdp_diterima"]!='0000-00-00' )?date("d/m/Y", strtotime($data["tgl_spdp_diterima"])):"";
  $suspect_id             = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $pasal_tindak_pidana    = isset( $data["pasal_tindak_pidana"])?$data["pasal_tindak_pidana"]:"";
  $kasus_posisi         = isset( $data["kasus_posisi"])?$data["kasus_posisi"]:"";
  $no_p16          = isset( $data["no_p16"])?$data["no_p16"]:"";
  $tgl_p16         = (isset( $data["tgl_p16"] ) && $data["tgl_p16"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_p16"])):"";
  $no_penahanan            = isset( $data["no_penahanan"])?$data["no_penahanan"]:"";
  $tgl_penahanan           = (isset( $data["tgl_penahanan"] ) && $data["tgl_penahanan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_penahanan"])):"";
  $no_perpanjangan         = isset( $data["no_perpanjangan"])?$data["no_perpanjangan"]:"";
  $tgl_perpanjangan        = (isset( $data["tgl_perpanjangan"] ) && $data["tgl_perpanjangan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_perpanjangan"])):"";
  
  $jenis_jumlah_bukti   = isset( $data["jenis_jumlah_bukti"])?$data["jenis_jumlah_bukti"]:"";
  $tgl_terima_berkas_perkara     = (isset( $data["tgl_terima_berkas_perkara"] ) && $data["tgl_terima_berkas_perkara"]!='0000-00-00') ?date("d/m/Y", strtotime($data["tgl_terima_berkas_perkara"])):"";
  $p18_no          = isset( $data["p18_no"])?$data["p18_no"]:"";
  $p18_tgl        = (isset( $data["p18_tgl"] ) && $data["p18_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data["p18_tgl"])):"";
  $p19_no          = isset( $data["p19_no"])?$data["p19_no"]:"";
  $p19_tgl        = (isset( $data["p19_tgl"] ) && $data["p19_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data["p19_tgl"])):"";
  $p21_no          = isset( $data["p21_no"])?$data["p21_no"]:"";
  $p21_tgl        = (isset( $data["p21_tgl"] ) && $data["p21_tgl"]!='0000-00-00')?date("d/m/Y", strtotime($data["p21_tgl"])):"";
  $keterangan_rpa1             = isset( $data["keterangan_rpa1"])?$data["keterangan_rpa1"]:"";

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

<script type="text/javascript">
$(document).ready(function(){
  $("#JenisKelamin").val(["<?php echo $JenisKelamin;?>"]);
  $("#Agama").val(["<?php echo $Agama;?>"]);
});
</script>

<h3 class="page-header">Form RPA 1</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Identitas Tersangka</a></li>
                <li><a href="#tab3" data-toggle="tab">Tindak Pidana</a></li>
                <li><a href="#tab4" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab5" data-toggle="tab">Penahanan</a></li>
                <li><a href="#tab6" data-toggle="tab">Barang Bukti</a></li>
                <li><a href="#tab7" data-toggle="tab">Status Perkara</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form id="FormRpa1" method="post" action="<?php echo base_url(); ?>index.php/rpa1/save">
            <input type="hidden" name="suspect_id" value="<?php echo $suspect_id;?>" />
            <input type="hidden" name="id_rpa1" value="<?php echo $id_rpa1;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa1">Register RPA 1</label>
                  <input type="text" value="<?php echo $register_rpa1; ?>" class="form-control" id="register_rpa1" name="register_rpa1" placeholder="No Register RPA 1">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_spdp">Tanggal SPDP</label>
                  <input type="text" value="<?php echo $tgl_spdp; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_spdp" id="tgl_spdp" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="no_spdp">Nomor SPDP</label>
                  <input type="text" value="<?php echo $no_spdp; ?>" class="form-control" id="no_spdp" name="no_spdp" placeholder="Masukkan nomor Registrasi">
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_spdp_diterima">Tanggal Diterima Kejaksaan</label>
                  <input type="text" value="<?php echo $tgl_spdp_diterima; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" id="tgl_spdp_diterima" name="tgl_spdp_diterima" placeholder="DD/MM/YYYY">
                </div>                       
              </div>

              <div class="tab-pane" id="tab2">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NamaTersangka">Nama</label>
                  <input type="text" value="<?php echo $NamaTersangka; ?>" class="form-control" id="NamaTersangka" name="NamaTersangka" placeholder="Nama Tersangka">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TempatLahir">Tempat Lahir</label>
                  <input type="text" value="<?php echo $TempatLahir; ?>" class="form-control" id="TempatLahir" name="TempatLahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalLahir">Tanggal Lahir</label>
                  <input type="text" value="<?php echo $TanggalLahir; ?>" class="form-control datepicker" id="TanggalLahir" name="TanggalLahir" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="JenisKelamin">Jenis Kelamin</label>                  
                  <select class="form-control" id="JenisKelamin" name="JenisKelamin"> 
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="WargaNegara">Warga Negara / Kebangsaan</label>
                  <input type="text" value="<?php echo $WargaNegara; ?>" class="form-control" id="WargaNegara" name="WargaNegara" placeholder="Warga Negara ">
                </div>                                         
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Alamat">Alamat</label>
                  <textarea class="form-control" id="Alamat" name="Alamat" placeholder="Alamat"><?php echo $Alamat ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Agama">Agama</label>
                  <select class="form-control" id="Agama" name="Agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Pekerjaan">Pekerjaan</label>
                  <input type="text" value="<?php echo $Pekerjaan; ?>" class="form-control" id="Pekerjaan" name="Pekerjaan" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Pendidikan">Pendidikan</label>
                  <input type="text" value="<?php echo $Pendidikan; ?>" class="form-control" id="Pendidikan" name="Pendidikan" placeholder="SD/SMP/SMA/Sarjana">
                </div>                                                
              </div>

              <div class="tab-pane" id="tab3">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="kasus_posisi">Kasus Posisi</label>
                  <textarea class="form-control" id="kasus_posisi" name="kasus_posisi" placeholder="Waktu Kejadian"><?php echo $kasus_posisi; ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="pasal_tindak_pidana">Pasal Tindak Pidana</label>
                  <textarea class="form-control" id="pasal_tindak_pidana" name="pasal_tindak_pidana" placeholder="Pasal"><?php echo $pasal_tindak_pidana; ?></textarea>
                </div>                        
              </div>

              <div class="tab-pane" id="tab4">
               	<div class="form-group">
                    <label class="col-sm-3 control-label" for="no_p16">Nomor P16</label>
                    <input type="text" value="<?php echo $no_p16; ?>" class="form-control" id="no_p16" name="no_p16" placeholder="Nomor Surat P16">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_p16">Tanggal P16</label>
                    <input type="text" value="<?php echo $tgl_p16; ?>" class="form-control datepicker" id="tgl_p16" name="tgl_p16" placeholder="DD/MM/YYYY">
                </div>
                
                <?php if(!isset($jaksa)){ ?>
                <div class="form-group">                
                  <label class="col-xs-3 control-label" for="Jaksa">Jaksa Peneliti</label>
                  <div class="col-xs-5">
                  <select class="form-control" name="Jaksa[]">
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
                  <div class="col-xs-4">
                  <a class="addAttorney btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Jaksa</a>
                  </div>
                </div>
                <?php } ?>
                
                <!--BEGIN Conditional for edit mode -->
                <?php
					if(isset($jaksa)){
						foreach($jaksa as $no=>$value){
				?>
                            <div class="form-group" >
                              <label class="col-xs-3 control-label" for="Jaksa">Jaksa Peneliti</label>
                              <div class="col-xs-5">
                                  <select class="form-control" name="Jaksa[]">
                                    <option>--Pilih Jaksa--</option>
                                    <?php
                                      if( isset($attorney) and !empty($attorney) ): 
                                      foreach( $attorney as $val ):
									  	$selected = '';
									  	if($value['attorney_id'] == $val['id_attorney']){$selected = 'selected';}
                                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $val['id_attorney']; ?>"><?php echo $val['name_attorney']; ?></option>
                                    <?php 
                                      endforeach;
                                      endif; 
                                    ?>
                                  </select>
                              </div>
                              <div class="col-xs-4">
                              <a class="removeAttorney btn btn-danger"><span class="glyphicon glyphicon-minus"></span> Hapus Jaksa</a>
                              </div>
                            </div>                	
                <?php }      
					}
				?>
                <!--END Conditional for edit mode -->
                
                <!-- The option field template containing an option field and a Remove button -->
                <div class="form-group hide" id="optionTemplate">
                  <label class="col-xs-3 control-label" for="Jaksa">Jaksa Peneliti</label>
                  <div class="col-xs-5">
                      <select class="form-control" name="Jaksa[]">
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
                  <div class="col-xs-4">
                  <a class="removeAttorney btn btn-danger"><span class="glyphicon glyphicon-minus"></span> Hapus Jaksa</a>
                  </div>
                </div>
                
                <?php if(isset($jaksa)){ ?>
                <div class="form-group">                
	                  <a class="addAttorney btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Jaksa</a>
                </div>
                <?php } ?>
                                                
              </div>

              <div class="tab-pane" id="tab5">                
                <fieldset>
                  <legend>Penahanan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_penahanan">Nomor</label>
                    <input type="text" value="<?php echo $no_penahanan; ?>" class="form-control" id="no_penahanan" name="no_penahanan" placeholder="Nomor Surat Penahanan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_penahanan">Tanggal</label>
                    <input type="text" value="<?php echo $tgl_penahanan; ?>" class="form-control datepicker" id="tgl_penahanan" name="tgl_penahanan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>
                
                <fieldset>
                  <legend>Perpanjangan Penahanan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_perpanjangan">Nomor</label>
                    <input type="text" value="<?php echo $no_perpanjangan; ?>" class="form-control" id="no_perpanjangan" name="no_perpanjangan" placeholder="Nomor Surat Perpanjangan Penahanan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tgl_perpanjangan">Tanggal</label>
                    <input type="text" value="<?php echo $tgl_perpanjangan; ?>" class="form-control datepicker" id="tgl_perpanjangan" name="tgl_perpanjangan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>                                  
              </div>

              <div class="tab-pane" id="tab6">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="jenis_jumlah_bukti">Jenis & Jumlah Barang Bukti</label>
                  <textarea class="form-control" id="jenis_jumlah_bukti" name="jenis_jumlah_bukti" placeholder="Jenis & Jumlah Barang Bukti"><?php echo $jenis_jumlah_bukti; ?></textarea>
                </div>   
              </div>

              <div class="tab-pane" id="tab7">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_terima_berkas_perkara">Tanggal Terima Berkas Perkara</label>
                  <input type="text" value="<?php echo $tgl_terima_berkas_perkara; ?>" class="form-control datepicker" id="tgl_terima_berkas_perkara" name="tgl_terima_berkas_perkara" placeholder="DD/MM/YYYY">
                </div>                    
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="p18_no">No P18</label>
                    <input type="text" value="<?php echo $p18_no; ?>" class="form-control" id="p18_no" name="p18_no" placeholder="Nomor P18">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="p18_tgl">Tanggal P18</label>
                    <input type="text" value="<?php echo $p18_tgl; ?>" class="form-control datepicker" id="p18_tgl" name="p18_tgl" placeholder="DD/MM/YYYY">
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="p19_no">No P19</label>
                    <input type="text" value="<?php echo $p19_no; ?>" class="form-control" id="p19_no" name="p19_no" placeholder="Nomor P19">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="p19_tgl">Tanggal P19</label>
                    <input type="text" value="<?php echo $p19_tgl; ?>" class="form-control datepicker" id="p19_tgl" name="p19_tgl" placeholder="DD/MM/YYYY">
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="p21_no">No P21</label>
                    <input type="text" value="<?php echo $p21_no; ?>" class="form-control" id="p21_no" name="p21_no" placeholder="Nomor P21">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="p21_tgl">Tanggal P21</label>
                    <input type="text" value="<?php echo $p21_tgl; ?>" class="form-control datepicker" id="p21_tgl" name="p21_tgl" placeholder="DD/MM/YYYY">
                  </div>
              </div>

              <div class="tab-pane" id="tab8">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="keterangan_rpa1">Keterangan</label>
                  <textarea class="form-control" id="keterangan_rpa1" name="keterangan_rpa1" placeholder="Keterangan"><?php echo $keterangan_rpa1; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitrpa1" id="submitrpa1" value="Simpan Data" />                                  
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

