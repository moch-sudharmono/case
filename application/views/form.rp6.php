<script type="text/javascript">
$(document).ready(function() {
		$('#FormRp6')
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
 
  //Data RP-6
  $data                   = isset($value[0])?$value[0]:array();
  $Id_Rp6                 = isset($data["id_rp6"])?$data["id_rp6"]:"";
  $kategori_id			  = isset($data["kategori_id"])?$data["kategori_id"]:"";
  $RegisterRp6            = isset( $data["register_rp6"])?$data["register_rp6"]:"";
  $TanggalSaatIni         = (isset( $data["date"] ) && $data["date"]!='0000-00-00')?date("d/m/Y", strtotime($data["date"])):"";
  $NoRegistrasi           = isset( $data["registration_no"])?$data["registration_no"]:"";
  $Instansi               = isset( $data["institution"])?$data["institution"]:"";
  $TanggalTerima          = (isset( $data["date_received"]) && $data["date_received"]!='0000-00-00' )?date("d/m/Y", strtotime($data["date_received"])):"";
  $SuspectId              = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $WaktuKejadian          = isset( $data["case_time"])?$data["case_time"]:"";
  $TempatKejadian         = isset( $data["case_place"])?$data["case_place"]:"";
  $Pasal                  = isset( $data["pasal"])?$data["pasal"]:"";
  $Jaksa1                 = isset( $data["attorney1"])?$data["attorney1"]:"";
  $Jaksa2                 = isset( $data["attorney2"])?$data["attorney2"]:"";
  $NoPenangkapan          = isset( $data["no_penangkapan"])?$data["no_penangkapan"]:"";
  $TglPenangkapan         = (isset( $data["tgl_penangkapan"] ) && $data["tgl_penangkapan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_penangkapan"])):"";
  $NoPenahanan            = isset( $data["no_penahanan"])?$data["no_penahanan"]:"";
  $TglPenahanan           = (isset( $data["tgl_penahanan"] ) && $data["tgl_penahanan"]!='0000-00-00')?date("d/m/Y", strtotime($data["tgl_penahanan"])):"";
  $JenisPenahanan         = isset( $data["jenis_penahanan"])?$data["jenis_penahanan"]:"";
  $PerpanjangPenahanan    = isset( $data["perpanjang_penahanan"])?$data["perpanjang_penahanan"]:"";
  $PenangguhanPenahanan   = isset( $data["penangguhan_penahanan"])?$data["penangguhan_penahanan"]:"";
  $TanggalPenghentian     = (isset( $data["tanggal_penghentian"] ) && $data["tanggal_penghentian"]!='0000-00-00') ?date("d/m/Y", strtotime($data["tanggal_penghentian"])):"";
  $NoPenghentian          = isset( $data["no_penghentian"])?$data["no_penghentian"]:"";
  $TanpaSpdp              = isset( $data["tanpa_spdp"])?$data["tanpa_spdp"]:"";
  $AlasanPenghentian      = isset( $data["alasan"])?$data["alasan"]:"";
  $PendapatJaksaPeneliti  = isset( $data["pendapat_jaksa"])?$data["pendapat_jaksa"]:"";
  $PPYangMengajukan       = isset( $data["pp_mengajukan"])?$data["pp_mengajukan"]:"";
  $PPPutusanPN            = isset( $data["pp_putusan_pn"])?$data["pp_putusan_pn"]:"";
  $PPPutusanPT            = isset( $data["pp_putusan_pt"])?$data["pp_putusan_pt"]:"";
  $TglTerimaTahap1        = (isset( $data["tahapsatu_tanggal"] ) && $data["tahapsatu_tanggal"]!='0000-00-00')?date("d/m/Y", strtotime($data["tahapsatu_tanggal"])):"";
  $DenganSPDP             = isset( $data["tahapsatu_spdp"])?$data["tahapsatu_spdp"]:"";
  $SPDPBerkas             = isset( $data["tahapsatu_spdp_berkas"])?$data["tahapsatu_spdp_berkas"]:"";
  $Keterangan             = isset( $data["keterangan"])?$data["keterangan"]:"";

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
  $("#kategori").val(["<?php echo $kategori_id;?>"]);
  
});
</script>

<h3 class="page-header">Form RP-6</h3>
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
                <li><a href="#tab6" data-toggle="tab">Penghentian Penyidikan</a></li>
                <li><a href="#tab7" data-toggle="tab">Penerimaan Berkas Tahap I</a></li>
                <li><a href="#tab8" data-toggle="tab">Keterangan &amp; Simpan Data</a></li>
            </ul>
	 	</div>
	  </div>
	</div>
            <form id="FormRp6" method="post" action="<?php echo base_url(); ?>index.php/rp6/save">
            <input type="hidden" name="SuspectId" value="<?php echo $SuspectId;?>" />
            <input type="hidden" name="Id_Rp6" value="<?php echo $Id_Rp6;?>" />
     <div class="tab-content">
              <div class="tab-pane" id="tab1">
              	<div class="form-group">
                  <label class="col-sm-3 control-label" for="kategori">Kategori Perkara</label>
                  <select class="form-control required" id="kategori" name="kategori">
                    <option value="">--Pilih Kategori Perkara--</option>
                    <?php
                      if( isset($kategori) and !empty($kategori) ): 
                      	foreach( $kategori as $val ):
                    ?>
                    <option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['kategori_perkara'] ?></option>
                    <?php 
                      	endforeach;
                      endif; 
                    ?>
                  </select>
                </div>   
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="RegisterRp6">Register RP 6</label>
                  <input type="text" value="<?php echo $RegisterRp6; ?>" class="form-control" id="RegisterRp6" name="RegisterRp6" placeholder="No Register RP 6">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalSaatIni">Tanggal Surat</label>
                  <input type="text" value="<?php echo $TanggalSaatIni; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="TanggalSaatIni" id="TanggalSaatIni" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NoRegistrasi">Nomor Surat</label>
                  <input type="text" value="<?php echo $NoRegistrasi; ?>" class="form-control" id="NoRegistrasi" name="NoRegistrasi" placeholder="Masukkan nomor Registrasi">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Instansi">Instansi</label>
                  <input type="text" value="<?php echo $Instansi; ?>" class="form-control" id="Instansi" name="Instansi" placeholder="Instansi Penyidik">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalTerima">Tanggal Diterima Kejaksaan</label>
                  <input type="text" value="<?php echo $TanggalTerima; ?>" data-date-format="mm/dd/yyyy" class="form-control datepicker" id="TanggalTerima" name="TanggalTerima" placeholder="DD/MM/YYYY">
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
                  <label class="col-sm-3 control-label" for="WaktuKejadian">Waktu Kejadian</label>
                  <textarea class="form-control" id="WaktuKejadian" name="WaktuKejadian" placeholder="Waktu Kejadian"><?php echo $WaktuKejadian; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TempatKejadian">Tempat</label>
                  <textarea class="form-control" id="TempatKejadian" name="TempatKejadian" placeholder="Tempat Kejadian"><?php echo $TempatKejadian; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Pasal">Pasal</label>
                  <textarea class="form-control" id="Pasal" name="Pasal" placeholder="Pasal"><?php echo $Pasal; ?></textarea>
                </div>                        
              </div>

              <div class="tab-pane" id="tab4">
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
                  <legend>Penangkapan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="NoPenangkapan">Nomor</label>
                    <input type="text" value="<?php echo $NoPenangkapan; ?>" class="form-control" id="NoPenangkapan" name="NoPenangkapan" placeholder="Nomor Surat Penangkapan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="TglPenangkapan">Tanggal</label>
                    <input type="text" value="<?php echo $TglPenangkapan; ?>" class="form-control datepicker" id="TglPenangkapan" name="TglPenangkapan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>

                <fieldset>
                  <legend>Penahanan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="NoPenahanan">Nomor</label>
                    <input type="text" value="<?php echo $NoPenahanan; ?>" class="form-control" id="NoPenahanan" name="NoPenahanan" placeholder="Nomor Surat Penahanan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="TglPenahanan">Tanggal</label>
                    <input type="text" value="<?php echo $TglPenahanan; ?>" class="form-control datepicker" id="TglPenahanan" name="TglPenahanan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="JenisPenahanan">Jenis</label>
                  <input type="text" value="<?php echo $JenisPenahanan; ?>" class="form-control" id="JenisPenahanan" name="JenisPenahanan" placeholder="Jenis Penahanan">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="PerpanjangPenahanan">Perpanjangan</label>
                  <textarea class="form-control" id="PerpanjangPenahanan" name="PerpanjangPenahanan" placeholder="No Surat / Tanggal"><?php echo $PerpanjangPenahanan; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="PenangguhanPenahanan">Penangguhan</label>
                  <textarea class="form-control" id="PenangguhanPenahanan" name="PenangguhanPenahanan" placeholder="No Surat / Tanggal "><?php echo $PenangguhanPenahanan; ?></textarea>
                </div>                                         
              </div>

              <div class="tab-pane" id="tab6">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanggalPenghentian">Tanggal</label>
                  <input type="text" value="<?php echo $TanggalPenghentian; ?>" class="form-control datepicker" id="TanggalPenghentian" name="TanggalPenghentian" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="NoPenghentian">Nomor</label>
                  <input type="text" value="<?php echo $NoPenghentian; ?>" class="form-control datepicker" id="NoPenghentian" name="NoPenghentian" placeholder="Nomor Surat">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TanpaSpdp">Tidak Didahului SPDP</label>
                  <textarea class="form-control" id="TanpaSpdp" name="TanpaSpdp" placeholder=""><?php echo $TanpaSpdp; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="AlasanPenghentian">Alasan</label>
                  <textarea class="form-control" id="AlasanPenghentian" name="AlasanPenghentian" placeholder="Alasan Penghentian Penyidikan"><?php echo $AlasanPenghentian; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="PendapatJaksaPeneliti">Pendapat Jaksa Peneliti</label>
                  <textarea class="form-control" id="PendapatJaksaPeneliti" name="PendapatJaksaPeneliti" placeholder="Pendapat Jaksa"><?php echo $PendapatJaksaPeneliti; ?></textarea>
                </div>

                <fieldset>
                  <legend>Pra Peradilan</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="PPYangMengajukan">Yang Mengajukan</label>
                    <input type="text" value="<?php echo $PPYangMengajukan; ?>" class="form-control" id="PPYangMengajukan" name="PPYangMengajukan" placeholder="Pihak yang mengajukan">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="PPPutusanPN">Putusan Pengadilan Negeri</label>
                    <input type="text" value="<?php echo $PPPutusanPN; ?>" class="form-control" id="PPPutusanPN" name="PPPutusanPN" placeholder="Putusan Pengadilan Negeri">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="PPPutusanPT">Putusan Pengadilan Tinggi</label>
                    <input type="text" value="<?php echo $PPPutusanPT; ?>" class="form-control" id="PPPutusanPT" name="PPPutusanPT" placeholder="Putusan Pengadilan Tinggi">
                  </div>
                </fieldset>                                                      
              </div>

              <div class="tab-pane" id="tab7">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="TglTerimaTahap1">Tanggal Terima</label>
                  <input type="text" value="<?php echo $TglTerimaTahap1; ?>" class="form-control datepicker" id="TglTerimaTahap1" name="TglTerimaTahap1" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="DenganSPDP">Didahului SPDP</label>
                  <textarea class="form-control" id="DenganSPDP" name="DenganSPDP" placeholder="Didahului SPDP"><?php echo $DenganSPDP; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="SPDPBerkas">SPDP bersama berkas</label>
                  <textarea class="form-control" id="SPDPBerkas" name="SPDPBerkas" placeholder="Berkas"><?php echo $SPDPBerkas; ?></textarea>
                </div>                        
              </div>

              <div class="tab-pane" id="tab8">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="Keterangan">Keterangan</label>
                  <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Keterangan"><?php echo $Keterangan; ?></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitRp6" id="submitRp6" value="Simpan Data" />                                  
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

