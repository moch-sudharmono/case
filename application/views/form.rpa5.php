<script type="text/javascript">
$(document).ready(function() {
		$('#FormRpa5')
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
 
  //Data RPA5
  $data                   = isset($value[0])?$value[0]:array();
  $id_rpa5                = isset($data["id_rpa5"])?$data["id_rpa5"]:"";
  $register_rpa5          = isset( $data["register_rpa5"])?$data["register_rpa5"]:"";
  $tgl_rpa5         	  = (isset( $data["tgl_rpa5"] ) && $data["tgl_rpa5"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_rpa5"])):"";
  $tgl_spdp         	  = (isset( $data["tgl_spdp"] ) && $data["tgl_spdp"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_spdp"])):"";
  $no_spdp           	  = isset( $data["no_spdp"])?$data["no_spdp"]:"";
  $tgl_spdp_diterima      = (isset( $data["tgl_spdp_diterima"]) && $data["tgl_spdp_diterima"]!='0000-00-00' )?date("d/m/Y", strtotime($data["tgl_spdp_diterima"])):"";
  $suspect_id             = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $victim_id              = isset( $data["victim_id"])?$data["victim_id"]:"";
  $pasal_rpa5			  = isset( $data["pasal_rpa5"])?$data["pasal_rpa5"]:"";
  $kasus_posisi           = isset( $data["kasus_posisi"])?$data["kasus_posisi"]:"";
  $no_p16                 = isset( $data["no_p16"])?$data["no_p16"]:"";
  $tgl_p16                = (isset( $data["tgl_p16"] ) && $data["tgl_p16"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_p16"])):"";
  $jenis_jumlah_bukti     = isset( $data["jenis_jumlah_bukti"])?$data["jenis_jumlah_bukti"]:"";
  $tgl_terima_berkas      = (isset( $data["tgl_terima_berkas"] ) && $data["tgl_terima_berkas"]!='0000-00-00') ?date("d/m/Y", strtotime($data["tgl_terima_berkas"])):"";
  $keadaan_korban         = isset( $data["keadaan_korban"])?$data["keadaan_korban"]:"";
  $lap_peksos_teksos      = isset( $data["lap_peksos_teksos"])?$data["lap_peksos_teksos"]:"";
  $lembaga_rujukan        = isset( $data["lembaga_rujukan"])?$data["lembaga_rujukan"]:"";
  $keterangan_rpa5        = isset( $data["keterangan_rpa5"])?$data["keterangan_rpa5"]:"";

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
  
  //Data Victim
  $victims       		= isset($victim[0])?$victim[0]:array();
  $NamaKorban  			= isset( $victims["name_victim"])?$victims["name_victim"]:"";
  $TempatLahirKorban    = isset( $victims["tempat_lahir"])?$victims["tempat_lahir"]:"";
  $TanggalLahirKorban   = isset( $victims["tgl_lahir"] )?date("d/m/Y", strtotime($victims["tgl_lahir"])):"";
  $JenisKelaminKorban   = isset( $victims["kelamin"])?$victims["kelamin"]:"";
  $WargaNegaraKorban    = isset( $victims["kebangsaan"])?$victims["kebangsaan"]:"";
  $AlamatKorban         = isset( $victims["alamat"])?$victims["alamat"]:"";
  $PekerjaanKorban      = isset( $victims["pekerjaan"])?$victims["pekerjaan"]:"";
  $PendidikanKorban     = isset( $victims["pendidikan"])?$victims["pendidikan"]:"";
  $AgamaKorban          = isset( $victims["agama"])?$victims["agama"]:"";
?>

<script type="text/javascript">
$(document).ready(function(){
  $("#JenisKelamin").val(["<?php echo $JenisKelamin;?>"]);
  $("#Agama").val(["<?php echo $Agama;?>"]);
  
  $("#JenisKelaminKorban").val(["<?php echo $JenisKelaminKorban;?>"]);
  $("#AgamaKorban").val(["<?php echo $AgamaKorban;?>"]);
});
</script>

<h3 class="page-header">Form RPA 5</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Identitas Anak</a></li>
                <li><a href="#tab3" data-toggle="tab">Identitas Tersangka</a></li>
                <li><a href="#tab4" data-toggle="tab">Tindak Pidana</a></li>
                <li><a href="#tab5" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab6" data-toggle="tab">Data Lain-Lain</a></li>
                <li><a href="#tab7" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form id="FormRpa5" method="post" action="<?php echo base_url(); ?>index.php/rpa5/save">
            <input type="hidden" name="suspect_id" value="<?php echo $suspect_id;?>" />
            <input type="hidden" name="victim_id" value="<?php echo $victim_id;?>" />
            <input type="hidden" name="id_rpa5" value="<?php echo $id_rpa5;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="register_rpa5">Register RPA 5</label>
                  <input type="text" value="<?php echo $register_rpa5; ?>" class="form-control" id="register_rpa5" name="register_rpa5" placeholder="No Register RPA 5">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_rpa5">Tanggal</label>
                  <input type="text" value="<?php echo $tgl_rpa5; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="tgl_rpa5" id="tgl_rpa5" placeholder="DD/MM/YYYY">
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
                  <label class="col-sm-3 control-label" for="NamaKorban">Nama Anak</label>
                  <input type="text" value="<?php echo $NamaKorban; ?>" class="form-control" id="NamaKorban" name="NamaKorban" placeholder="Nama Anak">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TempatLahirKorban">Tempat Lahir</label>
                  <input type="text" value="<?php echo $TempatLahirKorban; ?>" class="form-control" id="TempatLahirKorban" name="TempatLahirKorban" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalLahirKorban">Tanggal Lahir</label>
                  <input type="text" value="<?php echo $TanggalLahirKorban; ?>" class="form-control datepicker" id="TanggalLahirKorban" name="TanggalLahirKorban" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="JenisKelaminKorban">Jenis Kelamin</label>                  
                  <select class="form-control" id="JenisKelaminKorban" name="JenisKelaminKorban"> 
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="WargaNegaraKorban">Warga Negara / Kebangsaan</label>
                  <input type="text" value="<?php echo $WargaNegaraKorban; ?>" class="form-control" id="WargaNegaraKorban" name="WargaNegaraKorban" placeholder="Warga Negara ">
                </div>                                         
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="AlamatKorban">Alamat</label>
                  <textarea class="form-control" id="AlamatKorban" name="AlamatKorban" placeholder="Alamat"><?php echo $AlamatKorban ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="AgamaKorban">Agama</label>
                  <select class="form-control" id="AgamaKorban" name="AgamaKorban">
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
                  <label class="col-sm-3 control-label" for="PekerjaanKorban">Pekerjaan</label>
                  <input type="text" value="<?php echo $PekerjaanKorban; ?>" class="form-control" id="PekerjaanKorban" name="PekerjaanKorban" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="PendidikanKorban">Pendidikan</label>
                  <input type="text" value="<?php echo $PendidikanKorban; ?>" class="form-control" id="PendidikanKorban" name="PendidikanKorban" placeholder="SD/SMP/SMA/Sarjana">
                </div>                                                
              </div>

              <div class="tab-pane" id="tab3">
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

              <div class="tab-pane" id="tab4">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="kasus_posisi">Kasus Posisi</label>
                  <textarea class="form-control" id="kasus_posisi" name="kasus_posisi" placeholder="Keterangan"><?php echo $kasus_posisi; ?></textarea>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="pasal_rpa5">Pasal Tindak Pidana</label>
                  <textarea class="form-control" id="pasal_rpa5" name="pasal_rpa5" placeholder="Pasal"><?php echo $pasal_rpa5; ?></textarea>
                </div>        
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tgl_terima_berkas">Tanggal Terima Berkas Perkara</label>
                  <input type="text" value="<?php echo $tgl_terima_berkas; ?>" class="form-control datepicker" id="tgl_terima_berkas" name="tgl_terima_berkas" placeholder="DD/MM/YYYY">
                </div>                 
              </div>

              <div class="tab-pane" id="tab5">
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

              <div class="tab-pane" id="tab6">                
                
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="keadaan_korban">Keadaan Korban</label>
                    <textarea class="form-control" id="keadaan_korban" name="keadaan_korban" placeholder="Keterangan"><?php echo $keadaan_korban; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="lap_peksos_teksos">Laporan PEKSOS dan TEKSOS</label>
                    <textarea class="form-control" id="lap_peksos_teksos" name="lap_peksos_teksos" placeholder="Keterangan"><?php echo $lap_peksos_teksos; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="lembaga_rujukan">Lembaga Rujukan</label>
                    <textarea class="form-control" id="lembaga_rujukan" name="lembaga_rujukan" placeholder="Keterangan"><?php echo $lembaga_rujukan; ?></textarea>
                  </div>
                                
              </div>

              <div class="tab-pane" id="tab7">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="keterangan_rpa5">Keterangan</label>
                  <textarea class="form-control" id="keterangan_rpa5" name="keterangan_rpa5" placeholder="Keterangan"><?php echo $keterangan_rpa5; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitrpa5" id="submitrpa5" value="Simpan Data" />                                  
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

