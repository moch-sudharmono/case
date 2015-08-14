<script type="text/javascript">
$(document).ready(function(){
 		$('#FormRp9')
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
			//alert($row);
        })

});
</script>
<?php
  //Data RP-6
  $data                   = isset( $rp7[0])?$rp7[0]:array();
  $id_rp7                 = isset( $data["id_rp7"])?$data["id_rp7"]:"";
  $TglP21                 = (isset( $data["tgl_lengkap"]) && $data["tgl_lengkap"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_lengkap"])):"";
  $Pasal                  = isset( $data["pasal"])?$data["pasal"]:"";
  $TglPenyerahan          = (isset($data["date"]) && $data["date"]!='0000-00-00')?date("d/m/Y", strtotime($data["date"])):"";
  $JenisPenahanan         = isset( $data["jenis_penahanan"])?$data["jenis_penahanan"]:"";
  $TglTerimaKejaksaan     = (isset( $data["lama_sp3"]) && $data["lama_sp3"]!='0000-00-00')?date("d/m/Y", strtotime($data["lama_sp3"])):"";
  $Instansi               = isset( $data["institution"])?$data["institution"]:"";
  $RegisterTahanan        = isset( $data["register_rt2"])?$data["register_rt2"]:"";

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

  //Data RP 9
  $data_rp9       = isset($rp9[0])?$rp9[0]:array();
  $id_rp9         = isset( $data_rp9["id_rp9"])?$data_rp9["id_rp9"]:"";
  $RegisterRP9    = isset( $data_rp9["register_rp9"])?$data_rp9["register_rp9"]:"";
  $tgl_rp9        = (isset($data_rp9["tgl_rp9"]) && $data_rp9["tgl_rp9"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_rp9"])):"";
  $Jaksa1         = isset( $data_rp9["jpu1"])?$data_rp9["jpu1"]:"";
  $Jaksa2         = isset( $data_rp9["jpu2"])?$data_rp9["jpu2"]:"";
  $PasalDakwaan   = isset( $data_rp9["pasal_dakwaan"])?$data_rp9["pasal_dakwaan"]:"";
  $TglKU          = ( isset($data_rp9["tgl_penyampingan_umum"]) && $data_rp9["tgl_penyampingan_umum"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_penyampingan_umum"])):"";
  $NoKU           = isset( $data_rp9["no_sk_penyampingan_umum"])?$data_rp9["no_sk_penyampingan_umum"]:"";
  $TglApbs        = ( isset($data_rp9["tgl_perkara_absaps"]) && $data_rp9["tgl_perkara_absaps"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_perkara_absaps"])):"";
  $NoApbs         = isset( $data_rp9["no_perkara_absaps"])?$data_rp9["no_perkara_absaps"]:"";
  $TglKeLain      = ( isset($data_rp9["tgl_kirim_instansi_lain"]) && $data_rp9["tgl_kirim_instansi_lain"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_kirim_instansi_lain"])):"";
  $NoKeLain       = isset( $data_rp9["no_kirim_instansi_lain"])?$data_rp9["no_kirim_instansi_lain"]:"";
  $TglJPU         = ( isset($data_rp9["tgl_tuntutan_jpu"]) && $data_rp9["tgl_tuntutan_jpu"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_tuntutan_jpu"])):"";
  $IsiJPU         = isset($data_rp9["tuntutan_jpu"])?$data_rp9["tuntutan_jpu"]:"";
  $TglApbs        = ( isset($data_rp9["tgl_perkara_absaps"]) && $data_rp9["tgl_perkara_absaps"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_perkara_absaps"])):"";
  $NoApbs         = isset( $data_rp9["no_perkara_absaps"])?$data_rp9["no_perkara_absaps"]:"";
  $TglAmarPutusan = ( isset($data_rp9["tgl_amar_putusan"]) && $data_rp9["tgl_amar_putusan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_amar_putusan"])):"";
  $NoAmarPutusan  = isset( $data_rp9["no_amar_putusan"])?$data_rp9["no_amar_putusan"]:"";
  $TglPenetapan   = ( isset($data_rp9["tgl_amar_pt"]) && $data_rp9["tgl_amar_pt"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_amar_pt"])):"";
  $NoPenetapan    = isset( $data_rp9["no_amar_pt"])?$data_rp9["no_amar_pt"]:"";
  $TglBanding     = ( isset($data_rp9["tgl_amar_banding"]) && $data_rp9["tgl_amar_banding"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_amar_banding"])):"";
  $NoBanding      = isset( $data_rp9["no_amar_banding"])?$data_rp9["no_amar_banding"]:"";
  $TglKasasi      = ( isset($data_rp9["tgl_amar_ma"]) && $data_rp9["tgl_amar_ma"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_amar_ma"])):"";
  $NoKasasi       = isset( $data_rp9["no_amar_ma"])?$data_rp9["no_amar_ma"]:"";
  $TglKasasiKU    = ( isset($data_rp9["tgl_kasasi"]) && $data_rp9["tgl_kasasi"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_kasasi"])):"";
  $NoKasasiKU     = isset( $data_rp9["no_kasasi"])?$data_rp9["no_kasasi"]:"";
  $TglPK          = ( isset($data_rp9["tgl_amar_pk_ma"]) && $data_rp9["tgl_amar_pk_ma"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_amar_pk_ma"])):"";
  $NoPK           = isset( $data_rp9["no_amar_pk_ma"])?$data_rp9["no_amar_pk_ma"]:"";
  $TglGrasi       = ( isset($data_rp9["tgl_grasi"]) && $data_rp9["tgl_grasi"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_grasi"])):"";
  $NoGrasi        = isset( $data_rp9["no_grasi"])?$data_rp9["no_grasi"]:"";
  
  $TglPelaksanaan = ( isset($data_rp9["tgl_pelaksanaan"]) && $data_rp9["tgl_pelaksanaan"]!='0000-00-00')?date("d/m/Y", strtotime($data_rp9["tgl_pelaksanaan"])):"";
  $keterangan_rp9 = isset( $data_rp9["keterangan_rp9"])?$data_rp9["keterangan_rp9"]:"";

?>

<h3 class="page-header">Form Register Perkara 9 (RP 9)</h3>
<div class="row">
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
            <ul>
                <li><a href="#tab1" data-toggle="tab">Register</a></li>
                <li><a href="#tab2" data-toggle="tab">Tahanan</a></li>
                <li><a href="#tab3" data-toggle="tab">Tersangka</a></li>
                <li><a href="#tab4" data-toggle="tab">Jaksa</a></li>
                <li><a href="#tab5" data-toggle="tab">Pasal &amp; Pemeriksaan</a></li>
                <li><a href="#tab6" data-toggle="tab">Amar Putusan</a></li>
                <li><a href="#tab7" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form id="FormRp9" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/rp9/save">
            <input type="hidden" name="rp7_id" value="<?php echo $id_rp7;?>" />
            <input type="hidden" name="id_rp9" value="<?php echo $id_rp9;?>" />
	<div class="tab-content">
    	<div class="tab-pane" id="tab1">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterRP9">No Register RP9</label>
              <input  type="text" value="<?php echo $RegisterRP9; ?>" class="form-control" id="RegisterRP9" name="RegisterRP9">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="tgl_rp9">Tanggal Register RP9</label>
              <input type="text" value="<?php echo $tgl_rp9; ?>" class="form-control datepicker" id="tgl_rp9" name="tgl_rp9">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglP21">Tanggal terima Berkas Perkara Lengkap P-21</label>
              <input readonly="readonly"  type="text" value="<?php echo $TglP21; ?>" class="form-control datepicker" id="TglP21" name="TglP21">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="Instansi">Instansi Asal</label>
              <input readonly="readonly"  type="text" value="<?php echo $Instansi; ?>" class="form-control" id="Instansi" name="Instansi">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoSuratPenyerahan">No Register Barang Bukti</label>
              <input readonly="readonly"  type="text" value="<?php echo ''; ?>" class="form-control" id="NoSuratPenyerahan" name="NoSuratPenyerahan">
            </div>
         </div>
         <div class="tab-pane" id="tab2">
            <fieldset>
              <legend>Tahanan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="RegisterTahanan">No Registrasi</label>
              <input readonly="readonly"  type="text" value="<?php echo $RegisterTahanan; ?>" class="form-control" id="RegisterTahanan" name="RegisterTahanan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="JenisPenahanan">Jenis</label>
              <input readonly="readonly"  type="text" value="<?php echo $JenisPenahanan; ?>" class="form-control datepicker" id="JenisPenahanan" name="JenisPenahanan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglTerimaKejaksaan">Ditahan sejak</label>
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
              <?php if(!isset($jaksa)){ ?>
                <div class="form-group">                
                  <label class="col-xs-3 control-label" for="Jaksa">Jaksa Penuntut Umum</label>
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
                              <label class="col-xs-3 control-label" for="Jaksa">Jaksa Penuntut Umum</label>
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
                  <label class="col-xs-3 control-label" for="Jaksa">Jaksa Penuntut Umum</label>
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
        	<div class="form-group">
              <label class="col-sm-3 control-label" for="PasalDakwaan">Tindak Pidana yang didakwakan</label>
              <textarea class="form-control" id="PasalDakwaan" name="PasalDakwaan"><?php echo $PasalDakwaan; ?></textarea>
            </div>
            

            <div class="form-group">
              <label class="col-sm-3 control-label" for="Pasal">Pasal yang disangkakan</label>
              <input readonly="readonly" type="text" value="<?php echo $Pasal; ?>" class="form-control" id="Pasal" name="Pasal">
            </div>
            <fieldset>
              <legend>Penyampingan Demi Kepentingan Umum</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglKU">Tanggal</label>
              <input  type="text" value="<?php echo $TglKU; ?>" class="form-control datepicker" id="TglKU" name="TglKU">
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoKU">No SK</label>
              <input  type="text" value="<?php echo $NoKU; ?>" class="form-control" id="NoKU" name="NoKU">
            </div>
            </fieldset>

            <!-- ================================================== -->  

            <fieldset>
              <legend>Acara Pemeriksaan Biasa / Singkat</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglApbs">Tanggal</label>
              <input type="text" value="<?php echo $TglApbs; ?>" class="form-control datepicker" id="TglApbs" name="TglApbs">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoApbs">No Perkara</label>
              <input type="text" value="<?php echo $NoApbs; ?>" class="form-control" id="NoApbs" name="NoApbs">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Pemeriksaan Berkas ke Kejaksaan / Instansi Lain</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglKeLain">Tanggal</label>
              <input type="text" value="<?php echo $TglKeLain; ?>" class="form-control datepicker" id="TglKeLain" name="TglKeLain">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoKeLain">Nomor</label>
              <input type="text" value="<?php echo $NoKeLain; ?>" class="form-control" id="NoKeLain" name="NoKeLain">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Isi Tuntutan Pidana Jaksa Penuntut Umum</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglJPU">Tanggal</label>
              <input type="text" value="<?php echo $TglJPU; ?>" class="form-control datepicker" id="TglJPU" name="TglJPU">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="IsiJPU">Isi</label>
              <textarea  class="form-control" id="IsiJPU" name="IsiJPU"><?php echo $IsiJPU; ?></textarea>
            </div>
            </fieldset>
		</div>
            <!-- ================================================== -->
        <div class="tab-pane" id="tab6">    
            <fieldset>
              <legend>Amar Putusan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglAmarPutusan">Tanggal</label>
              <input type="text" value="<?php echo $TglAmarPutusan; ?>" class="form-control datepicker" id="TglAmarPutusan" name="TglAmarPutusan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoAmarPutusan">Nomor</label>
              <input type="text" value="<?php echo $NoAmarPutusan; ?>" class="form-control" id="NoAmarPutusan" name="NoAmarPutusan">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Penetapan PT atas Perlawanan</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPenetapan">Tanggal</label>
              <input type="text" value="<?php echo $TglPenetapan; ?>" class="form-control datepicker" id="TglPenetapan" name="TglPenetapan">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPenetapan">Nomor</label>
              <input type="text" value="<?php echo $NoPenetapan; ?>" class="form-control" id="NoPenetapan" name="NoPenetapan">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan Banding (PT)</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglBanding">Tanggal</label>
              <input type="text" value="<?php echo $TglBanding; ?>" class="form-control datepicker" id="TglBanding" name="TglBanding">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoBanding">Nomor</label>
              <input type="text" value="<?php echo $NoBanding; ?>" class="form-control" id="NoBanding" name="NoBanding">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan Kasasi (MA)</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglKasasi">Tanggal</label>
              <input type="text" value="<?php echo $TglKasasi; ?>" class="form-control datepicker" id="TglKasasi" name="TglKasasi">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoKasasi">Nomor</label>
              <input type="text" value="<?php echo $NoKasasi; ?>" class="form-control" id="NoKasasi" name="NoKasasi">
            </div>
            </fieldset>

            <!-- ================================================== -->
            
            <fieldset>
              <legend>Amar Putusan Kasasi Demi Kepentingan Hukum</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglKasasiKU">Tanggal</label>
              <input type="text" value="<?php echo $TglKasasiKU; ?>" class="form-control datepicker" id="TglKasasiKU" name="TglKasasiKU">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoKasasiKU">Nomor</label>
              <input type="text" value="<?php echo $NoKasasiKU; ?>" class="form-control" id="NoKasasiKU" name="NoKasasiKU">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan Peninjauan Kembali (MA)</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPK">Tanggal</label>
              <input type="text" value="<?php echo $TglPK; ?>" class="form-control datepicker" id="TglPK" name="TglPK">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoPK">Nomor</label>
              <input type="text" value="<?php echo $NoPK; ?>" class="form-control" id="NoPK" name="NoPK">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <fieldset>
              <legend>Amar Putusan KEPPRES Grasi</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglGrasi">Tanggal</label>
              <input type="text" value="<?php echo $TglGrasi; ?>" class="form-control datepicker" id="TglGrasi" name="TglGrasi">
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="NoGrasi">Nomor</label>
              <input type="text" value="<?php echo $NoGrasi; ?>" class="form-control" id="NoGrasi" name="NoGrasi">
            </div>
            </fieldset>

            <!-- ================================================== -->

            <div class="form-group">
              <label class="col-sm-3 control-label" for="TglPelaksanaan">Tanggal Pelaksanaan Putusan</label>
              <input type="text" value="<?php echo $TglPelaksanaan; ?>" class="form-control datepicker" id="TglPelaksanaan" name="TglPelaksanaan">
            </div>
		</div>
            <!-- ============================== -->
        <div class="tab-pane" id="tab7">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="keterangan_rp9">Keterangan</label>
              <textarea  class="form-control" id="keterangan_rp9" name="keterangan_rp9"><?php echo $keterangan_rp9; ?></textarea>
            </div>
            <!-- ============================== -->

            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-10">
              <input type="submit" class="btn btn-primary" name="submitrp9" id="submitrp9" value="Simpan Data" />                                  
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
