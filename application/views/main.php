
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>inc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>inc/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>inc/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>inc/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Case Notification</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>            
            <li><a href="#">Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo base_url(); ?>index.php/rp6/">RP-6 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">RT-2</a></li>
            <li><a href="#">RP-7</a></li>
            <li><a href="#">RB-2</a></li>
            <li><a href="#">RP-3</a></li>
            <li><a href="#">RP-9</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Form RP-6</h1>
          <div class="row">
            <form method="post" action="<?php echo base_url(); ?>index.php/rp6/form/save">
            <div id="myTab">
              <ul>
                <li><a href="#tab-1">SPDP</a></li>
                <li><a href="#tab-2">Tersangka</a></li>
                <li><a href="#tab-3">Keterangan Tindak Pidana</a></li>
                <li><a href="#tab-4">Jaksa</a></li>
                <li><a href="#tab-5">Penahanan</a></li>
                <li><a href="#tab-6">Penghentian Penyidikan</a></li>
                <li><a href="#tab-7">Penerimaan Berkas Tahap I</a></li>
                <li><a href="#tab-8">Keterangan</a></li>
              </ul>
              <div id="tab-1">
                <div class="form-group">
                  <label for="TanggalSaatIni">Tanggal</label>
                  <input type="text" data-date-format="mm/dd/yyyy" class="form-control datepicker" name="TanggalSaatIni" id="TanggalSaatIni" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label for="NoRegistrasi">Nomor Surat</label>
                  <input type="text" class="form-control" id="NoRegistrasi" name="NoRegistrasi" placeholder="Masukkan nomor Registrasi">
                </div>
                <div class="form-group">
                  <label for="Instansi">Instansi</label>
                  <input type="text" class="form-control" id="Instansi" name="Instansi" placeholder="Instansi Penyidik">
                </div>
                <div class="form-group">
                  <label for="TanggalTerima">Tanggal Diterima Kejaksaan</label>
                  <input type="text" data-date-format="mm/dd/yyyy" class="form-control datepicker" id="TanggalTerima" name="TanggalTerima" placeholder="DD/MM/YYYY">
                </div>         
              </div>

              <div id="tab-2">
                <div class="form-group">
                  <label for="NamaTersangka">Nama</label>
                  <input type="text" class="form-control" id="NamaTersangka" name="NamaTersangka" placeholder="Nama Tersangka">
                </div>
                <div class="form-group">
                  <label for="TempatLahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="TempatLahir" name="TempatLahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label for="TanggalLahir">Tanggal Lahir</label>
                  <input type="text" class="form-control datepicker" id="TanggalLahir" name="TanggalLahir" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label for="JenisKelamin">Jenis Kelamin</label>                  
                  <select class="form-control" id="JenisKelamin" name="JenisKelamin"> 
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="WargaNegara">Warga Negara / Kebangsaan</label>
                  <input type="text" class="form-control" id="WargaNegara" name="WargaNegara" placeholder="Warga Negara ">
                </div>                                         
                <div class="form-group">
                  <label for="Alamat">Alamat</label>
                  <textarea class="form-control" id="Alamat" name="Alamat" placeholder="Alamat"></textarea>
                </div>                
                <div class="form-group">
                  <label for="Agama">Agama</label>
                  <select class="form-control" id="Agama" name="Agama">
                    <option>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="Pekerjaan" name="Pekerjaan" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                  <label for="Pendidikan">Pendidikan</label>
                  <input type="text" class="form-control" id="Pendidikan" name="Pendidikan" placeholder="SD/SMP/SMA/Sarjana">
                </div>                                                
              </div>

              <div id="tab-3">
                <div class="form-group">
                  <label for="WaktuKejadian">Waktu Kejadian</label>
                  <textarea class="form-control" id="WaktuKejadian" name="WaktuKejadian" placeholder="Waktu Kejadian"></textarea>
                </div>
                <div class="form-group">
                  <label for="TempatKejadian">Tempat</label>
                  <textarea class="form-control" id="TempatKejadian" name="TempatKejadian" placeholder="Tempat Kejadian"></textarea>
                </div>
                <div class="form-group">
                  <label for="Pasal">Pasal</label>
                  <textarea class="form-control" id="Pasal" name="Pasal" placeholder="Pasal"></textarea>
                </div>                        
              </div>

              <div id="tab-4">
                <div class="form-group">
                  <label for="Jaksa1">Jaksa Peneliti 1</label>
                  <select class="form-control" id="Jaksa1" name="Jaksa1">
                    <option>--Pilih Jaksa--</option>
                    <option>Jaksa 1</option>
                    <option>Jaksa 2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Jaksa2">Jaksa Peneliti 2</label>
                  <select class="form-control" id="Jaksa2" name="Jaksa2">
                    <option>--Pilih Jaksa--</option>
                    <option>Jaksa 1</option>
                    <option>Jaksa 2</option>
                  </select>
                </div>                                        
              </div>

              <div id="tab-5">
                <fieldset>
                  <legend>Penangkapan</legend>
                  <div class="form-group">
                    <label for="NoPenangkapan">Nomor</label>
                    <input type="text" class="form-control" id="NoPenangkapan" name="NoPenangkapan" placeholder="Nomor Surat Penangkapan">
                  </div>
                  <div class="form-group">
                    <label for="TglPenangkapan">Tanggal</label>
                    <input type="text" class="form-control datepicker" id="TglPenangkapan" name="TglPenangkapan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>

                <fieldset>
                  <legend>Penahanan</legend>
                  <div class="form-group">
                    <label for="NoPenahanan">Nomor</label>
                    <input type="text" class="form-control" id="NoPenahanan" name="NoPenahanan" placeholder="Nomor Surat Penahanan">
                  </div>
                  <div class="form-group">
                    <label for="TglPenahanan">Tanggal</label>
                    <input type="text" class="form-control datepicker" id="TglPenahanan" name="TglPenahanan" placeholder="DD/MM/YYYY">
                  </div>
                </fieldset>
                
                <div class="form-group">
                  <label for="JenisPenahanan">Jenis</label>
                  <input type="text" class="form-control" id="JenisPenahanan" name="JenisPenahanan" placeholder="Jenis Penahanan">
                </div>
                <div class="form-group">
                  <label for="PerpanjangPenahanan">Perpanjangan</label>
                  <textarea class="form-control" id="PerpanjangPenahanan" name="PerpanjangPenahanan" placeholder="No Surat / Tanggal"></textarea>
                </div>
                <div class="form-group">
                  <label for="PenangguhanPenahanan">Penangguhan</label>
                  <textarea class="form-control" id="PenangguhanPenahanan" name="PenangguhanPenahanan" placeholder="No Surat / Tanggal "></textarea>
                </div>                                         
              </div>

              <div id="tab-6">
                <div class="form-group">
                  <label for="TanggalPenghentian">Tanggal</label>
                  <input type="text" class="form-control datepicker" id="TanggalPenghentian" name="TanggalPenghentian" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label for="NoPenghentian">Nomor</label>
                  <input type="text" class="form-control datepicker" id="NoPenghentian" name="NoPenghentian" placeholder="Nomor Surat">
                </div>
                <div class="form-group">
                  <label for="TanpaSpdp">Tidak Didahului SPDP</label>
                  <textarea class="form-control" id="TanpaSpdp" name="TanpaSpdp" placeholder=""></textarea>
                </div>
                <div class="form-group">
                  <label for="AlasanPenghentian">Alasan</label>
                  <textarea class="form-control" id="AlasanPenghentian" name="AlasanPenghentian" placeholder="Alasan Penghentian Penyidikan"></textarea>
                </div>
                <div class="form-group">
                  <label for="PendapatJaksaPeneliti">Pendapat Jaksa Peneliti</label>
                  <textarea class="form-control" id="PendapatJaksaPeneliti" name="PendapatJaksaPeneliti" placeholder="Pendapat Jaksa"></textarea>
                </div>

                <fieldset>
                  <legend>Pra Peradilan</legend>
                  <div class="form-group">
                    <label for="PPYangMengajukan">Yang Mengajukan</label>
                    <input type="text" class="form-control" id="PPYangMengajukan" name="PPYangMengajukan" placeholder="Pihak yang mengajukan">
                  </div>
                  <div class="form-group">
                    <label for="PPPutusanPN">Putusan Pengadilan Negeri</label>
                    <input type="text" class="form-control" id="PPPutusanPN" name="PPPutusanPN" placeholder="Putusan Pengadilan Negeri">
                  </div>
                  <div class="form-group">
                    <label for="PPPutusanPT">Putusan Pengadilan Tinggi</label>
                    <input type="text" class="form-control" id="PPPutusanPT" name="PPPutusanPT" placeholder="Putusan Pengadilan Tinggi">
                  </div>
                </fieldset>                                                      
              </div>

              <div id="tab-7">
                <div class="form-group">
                  <label for="TglTerimaTahap1">Tanggal Terima</label>
                  <input type="text" class="form-control datepicker" id="TglTerimaTahap1" name="TglTerimaTahap1" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                  <label for="DenganSPDP">Didahului SPDP</label>
                  <textarea class="form-control" id="DenganSPDP" name="DenganSPDP" placeholder="Didahului SPDP"></textarea>
                </div>
                <div class="form-group">
                  <label for="SPDPBerkas">SPDP bersama berkas</label>
                  <textarea class="form-control" id="SPDPBerkas" name="SPDPBerkas" placeholder="Berkas"></textarea>
                </div>                        
              </div>

              <div id="tab-8">
                <div class="form-group">
                  <label for="Keterangan">Keterangan</label>
                  <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Keterangan"></textarea>
                </div> 

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submitRp6" id="submitRp6" value="Simpan Data" />                                  
                </div>
                
              </div>

            </div>   
            </form>
          </div>  
        </div>
      </div>
    </div>

    <style type="text/css">
      body 
      {
        font-size: 8pt;
      }
    </style>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>inc/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/docs.min.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url(); ?>inc/js/jquery-ui.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>inc/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $( ".datepicker" ).datepicker();

        var $tabs = $('#myTab').tabs();
  
        $(".ui-tabs-panel").each(function(i){
        
          var totalSize = $(".ui-tabs-panel").size() - 1;                    
          
          if (i != 0) {
              prev = i;
              $(this).append("<a align='left' href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Langkah sebelumnya &nbsp;</a>");
          }

          if (i != totalSize) {
              next = i + 2;
              $(this).append("<a align='right' href='#' class='next-tab mover' rel='" + next + "'>&nbsp; Langkah berikutnya &#187;</a>");
          }
            
        });
  
        $('.next-tab, .prev-tab').click(function() { 
           $tabs.tabs('select', $(this).attr("rel"));
           return false;
        });
       
      });
    </script>
  </body>
</html>
