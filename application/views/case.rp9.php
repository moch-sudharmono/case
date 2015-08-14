<?php
  //Data RP-6
  $data                   = isset($value[0])?$value[0]:array();
  $Id_Rp6                 = isset( $data["id"])?$data["id"]:"";
  $TanggalSaatIni         = isset( $data["date"] )?date("d/m/Y", strtotime($data["date"])):"";
  $NoRegistrasi           = isset( $data["registration_no"])?$data["registration_no"]:"";
  $Instansi               = isset( $data["institution"])?$data["institution"]:"";
  $TanggalTerima          = isset( $data["date_received"] )?date("d/m/Y", strtotime($data["date_received"])):"";
  $SuspectId              = isset( $data["suspect_id"])?$data["suspect_id"]:"";
  $WaktuKejadian          = isset( $data["case_time"])?$data["case_time"]:"";
  $TempatKejadian         = isset( $data["case_place"])?$data["case_place"]:"";
  $Pasal                  = isset( $data["pasal"])?$data["pasal"]:"";
  $Jaksa1                 = isset( $data["attorney1"])?$data["attorney1"]:"";
  $Jaksa2                 = isset( $data["attorney2"])?$data["attorney2"]:"";
  $NoPenangkapan          = isset( $data["no_penangkapan"])?$data["no_penangkapan"]:"";
  $TglPenangkapan         = isset( $data["tgl_penangkapan"] )?date("d/m/Y", strtotime($data["tgl_penangkapan"])):"";
  $NoPenahanan            = isset( $data["no_penahanan"])?$data["no_penahanan"]:"";
  $TglPenahanan           = isset( $data["tgl_penahanan"] )?date("d/m/Y", strtotime($data["tgl_penahanan"])):"";
  $JenisPenahanan         = isset( $data["jenis_penahanan"])?$data["jenis_penahanan"]:"";
  $PerpanjangPenahanan    = isset( $data["perpanjang_penahanan"])?$data["perpanjang_penahanan"]:"";
  $PenangguhanPenahanan   = isset( $data["penangguhan_penahanan"])?$data["penangguhan_penahanan"]:"";
  $TanggalPenghentian     = isset( $data["tanggal_penghentian"] )?date("d/m/Y", strtotime($data["tanggal_penghentian"])):"";
  $NoPenghentian          = isset( $data["no_penghentian"])?$data["no_penghentian"]:"";
  $TanpaSpdp              = isset( $data["tanpa_spdp"])?$data["tanpa_spdp"]:"";
  $AlasanPenghentian      = isset( $data["alasan"])?$data["alasan"]:"";
  $PendapatJaksaPeneliti  = isset( $data["pendapat_jaksa"])?$data["pendapat_jaksa"]:"";
  $PPYangMengajukan       = isset( $data["pp_mengajukan"])?$data["pp_mengajukan"]:"";
  $PPPutusanPN            = isset( $data["pp_putusan_pn"])?$data["pp_putusan_pn"]:"";
  $PPPutusanPT            = isset( $data["pp_putusan_pt"])?$data["pp_putusan_pt"]:"";
  $TglTerimaTahap1        = isset( $data["tahapsatu_tanggal"] )?date("d/m/Y", strtotime($data["tahapsatu_tanggal"])):"";
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
  $("#Jaksa1").val(<?php echo $Jaksa1;?>);
  $("#Jaksa2").val(<?php echo $Jaksa2;?>);
  $("#JenisKelamin").val(<?php echo $JenisKelamin;?>);
  $("#Agama").val(<?php echo $Agama;?>);


});
});
</script>

<h3 class="page-header">Data Kasus : <i><?php echo $NamaTersangka; ?></i></h3>
<div class="row">
      <div class="form-group">
        <label for="TanggalSaatIni">Tanggal</label>
        <input readonly="readonly"  type="text" value="<?php echo $TanggalSaatIni; ?>" data-date-format="dd/mm/yyyy" class="form-control datepicker" name="TanggalSaatIni" id="TanggalSaatIni">
      </div>
      <div class="form-group">
        <label for="NoRegistrasi">Nomor Surat</label>
        <input readonly="readonly"  type="text" value="<?php echo $NoRegistrasi; ?>" class="form-control" id="NoRegistrasi" name="NoRegistrasi">
      </div>
      <div class="form-group">
        <label for="Instansi">Instansi</label>
        <input readonly="readonly"  type="text" value="<?php echo $Instansi; ?>" class="form-control" id="Instansi" name="Instansi">
      </div>
      <div class="form-group">
        <label for="TanggalTerima">Tanggal Diterima Kejaksaan</label>
        <input readonly="readonly"  type="text" value="<?php echo $TanggalTerima; ?>" data-date-format="mm/dd/yyyy" class="form-control datepicker" id="TanggalTerima" name="TanggalTerima">
      </div>                       
      <div class="form-group">
        <label for="NamaTersangka">Nama</label>
        <input readonly="readonly"  type="text" value="<?php echo $NamaTersangka; ?>" class="form-control" id="NamaTersangka" name="NamaTersangka">
      </div>
      <div class="form-group">
        <label for="TempatLahir">Tempat Lahir</label>
        <input readonly="readonly"  type="text" value="<?php echo $TempatLahir; ?>" class="form-control" id="TempatLahir" name="TempatLahir">
      </div>
      <div class="form-group">
        <label for="TanggalLahir">Tanggal Lahir</label>
        <input readonly="readonly"  type="text" value="<?php echo $TanggalLahir; ?>" class="form-control datepicker" id="TanggalLahir" name="TanggalLahir">
      </div>
      <div class="form-group">
        <label for="JenisKelamin">Jenis Kelamin</label>                  
        <select disabled="disabled" class="form-control" id="JenisKelamin" name="JenisKelamin"> 
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </div>
      <div class="form-group">
        <label for="WargaNegara">Warga Negara / Kebangsaan</label>
        <input readonly="readonly"  type="text" value="<?php echo $WargaNegara; ?>" class="form-control" id="WargaNegara" name="WargaNegara">
      </div>                                         
      <div class="form-group">
        <label for="Alamat">Alamat</label>
        <textarea readonly="readonly"  class="form-control" id="Alamat" name="Alamat"><?php echo $Alamat; ?></textarea>
      </div>                
      <div class="form-group">
        <label for="Agama">Agama</label>
        <input readonly="readonly"  type="text" value="<?php echo $Agama; ?>" class="form-control" id="Agama" name="Agama">
      </div>
      <div class="form-group">
        <label for="Pekerjaan">Pekerjaan</label>
        <input readonly="readonly"  type="text" value="<?php echo $Pekerjaan; ?>" class="form-control" id="Pekerjaan" name="Pekerjaan">
      </div>
      <div class="form-group">
        <label for="Pendidikan">Pendidikan</label>
        <input readonly="readonly"  type="text" value="<?php echo $Pendidikan; ?>" class="form-control" id="Pendidikan" name="Pendidikan">
      </div>                                                
      <div class="form-group">
        <label for="WaktuKejadian">Waktu Kejadian</label>
        <textarea readonly="readonly"  class="form-control" id="WaktuKejadian" name="WaktuKejadian"><?php echo $WaktuKejadian; ?></textarea>
      </div>
      <div class="form-group">
        <label for="TempatKejadian">Tempat</label>
        <textarea readonly="readonly"  class="form-control" id="TempatKejadian" name="TempatKejadian"><?php echo $TempatKejadian; ?></textarea>
      </div>
      <div class="form-group">
        <label for="Pasal">Pasal</label>
        <textarea readonly="readonly"  class="form-control" id="Pasal" name="Pasal"><?php echo $Pasal; ?></textarea>
      </div>                        
      <div class="form-group">
        <label for="Jaksa1">Jaksa Peneliti</label>
        <input readonly="readonly"  type="text" value="<?php echo $data["name_attorney"]; ?>" class="form-control" id="Pendidikan" name="Pendidikan">
      </div>
     <?php if($Jaksa2 != null){ ?>
      <div class="form-group">
        <label for="Jaksa2">Jaksa Peneliti 2</label>
        <select disabled="disabled" class="form-control" id="Jaksa2" name="Jaksa2">
          <option>--Pilih Jaksa--</option>
          <?php
            if( isset($attorney) and !empty($attorney) ): 
            foreach( $attorney as $val ):
          ?>
          <option value="<?php echo $val['id_attorney'] ?>"><?php echo $val['name_attorney']; ?></option>
          <?php 
            endforeach;
            endif; 
          ?>
        </select>
      </div>
      <?php } ?>                                        
      <fieldset>
        <legend>Penangkapan</legend>
        <div class="form-group">
          <label for="NoPenangkapan">Nomor</label>
          <input readonly="readonly"  type="text" value="<?php echo $NoPenangkapan; ?>" class="form-control" id="NoPenangkapan" name="NoPenangkapan">
        </div>
        <div class="form-group">
          <label for="TglPenangkapan">Tanggal</label>
          <input readonly="readonly"  type="text" value="<?php echo $TglPenangkapan; ?>" class="form-control datepicker" id="TglPenangkapan" name="TglPenangkapan">
        </div>
      </fieldset>

      <fieldset>
        <legend>Penahanan</legend>
        <div class="form-group">
          <label for="NoPenahanan">Nomor</label>
          <input readonly="readonly"  type="text" value="<?php echo $NoPenahanan; ?>" class="form-control" id="NoPenahanan" name="NoPenahanan">
        </div>
        <div class="form-group">
          <label for="TglPenahanan">Tanggal</label>
          <input readonly="readonly"  type="text" value="<?php echo $TglPenahanan; ?>" class="form-control datepicker" id="TglPenahanan" name="TglPenahanan">
        </div>
      </fieldset>
      
      <div class="form-group">
        <label for="JenisPenahanan">Jenis</label>
        <input readonly="readonly"  type="text" value="<?php echo $JenisPenahanan; ?>" class="form-control" id="JenisPenahanan" name="JenisPenahanan">
      </div>
      <div class="form-group">
        <label for="PerpanjangPenahanan">Perpanjangan</label>
        <textarea readonly="readonly"  class="form-control" id="PerpanjangPenahanan" name="PerpanjangPenahanan"><?php echo $PerpanjangPenahanan; ?></textarea>
      </div>
      <div class="form-group">
        <label for="PenangguhanPenahanan">Penangguhan</label>
        <textarea readonly="readonly"  class="form-control" id="PenangguhanPenahanan" name="PenangguhanPenahanan"><?php echo $PenangguhanPenahanan; ?></textarea>
      </div>                                         
      <div class="form-group">
        <label for="TanggalPenghentian">Tanggal</label>
        <input readonly="readonly"  type="text" value="<?php echo $TanggalPenghentian; ?>" class="form-control datepicker" id="TanggalPenghentian" name="TanggalPenghentian">
      </div>
      <div class="form-group">
        <label for="NoPenghentian">Nomor</label>
        <input readonly="readonly"  type="text" value="<?php echo $NoPenghentian; ?>" class="form-control datepicker" id="NoPenghentian" name="NoPenghentian">
      </div>
      <div class="form-group">
        <label for="TanpaSpdp">Tidak Didahului SPDP</label>
        <textarea readonly="readonly"  class="form-control" id="TanpaSpdp" name="TanpaSpdp"><?php echo $TanpaSpdp; ?></textarea>
      </div>
      <div class="form-group">
        <label for="AlasanPenghentian">Alasan</label>
        <textarea readonly="readonly"  class="form-control" id="AlasanPenghentian" name="AlasanPenghentian"><?php echo $AlasanPenghentian; ?></textarea>
      </div>
      <div class="form-group">
        <label for="PendapatJaksaPeneliti">Pendapat Jaksa Peneliti</label>
        <textarea readonly="readonly"  class="form-control" id="PendapatJaksaPeneliti" name="PendapatJaksaPeneliti"><?php echo $PendapatJaksaPeneliti; ?></textarea>
      </div>

      <fieldset>
        <legend>Pra Peradilan</legend>
        <div class="form-group">
          <label for="PPYangMengajukan">Yang Mengajukan</label>
          <input readonly="readonly"  type="text" value="<?php echo $PPYangMengajukan; ?>" class="form-control" id="PPYangMengajukan" name="PPYangMengajukan">
        </div>
        <div class="form-group">
          <label for="PPPutusanPN">Putusan Pengadilan Negeri</label>
          <input readonly="readonly"  type="text" value="<?php echo $PPPutusanPN; ?>" class="form-control" id="PPPutusanPN" name="PPPutusanPN">
        </div>
        <div class="form-group">
          <label for="PPPutusanPT">Putusan Pengadilan Tinggi</label>
          <input readonly="readonly"  type="text" value="<?php echo $PPPutusanPT; ?>" class="form-control" id="PPPutusanPT" name="PPPutusanPT">
        </div>
      </fieldset>                                                      
      <div class="form-group">
        <label for="TglTerimaTahap1">Tanggal Terima</label>
        <input readonly="readonly"  type="text" value="<?php echo $TglTerimaTahap1; ?>" class="form-control datepicker" id="TglTerimaTahap1" name="TglTerimaTahap1">
      </div>
      <div class="form-group">
        <label for="DenganSPDP">Didahului SPDP</label>
        <textarea readonly="readonly"  class="form-control" id="DenganSPDP" name="DenganSPDP"><?php echo $DenganSPDP; ?></textarea>
      </div>
      <div class="form-group">
        <label for="SPDPBerkas">SPDP bersama berkas</label>
        <textarea readonly="readonly"  class="form-control" id="SPDPBerkas" name="SPDPBerkas"><?php echo $SPDPBerkas; ?></textarea>
      </div>                        
      <div class="form-group">
        <label for="Keterangan">Keterangan</label>
        <textarea readonly="readonly"  class="form-control" id="Keterangan" name="Keterangan"><?php echo $Keterangan; ?></textarea>
      </div> 
      <div class="form-group">
        <a href="<?php echo base_url().'index.php/suspect'?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> <b>Daftar Tersangka</b> </a>                                  
      </div>
</div>

