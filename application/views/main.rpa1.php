<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Register Perkara Anak 1 (RPA-1) </h3>

          <div class="row">            
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/rpa1/downloadExcel">
            
            Mulai Tanggal : <input type="text" class="form-control datepicker" id="MulaiTanggal" name="MulaiTanggal" placeholder="DD/MM/YYYY">
            Sampai  : <input type="text" class="form-control datepicker" id="SampaiTanggal" name="SampaiTanggal" placeholder="DD/MM/YYYY">
            <input type="submit" class="btn btn-primary" name="exportrpa1" id="exportrpa1" value="Export Data to Excel" /> 
            </form>
            <hr />
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/rpa1/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Terima SPDP</th>
                  <th>Register RPA 1</th>
                  <th>Tersangka</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
				  
                  if( isset($case) and !empty($case) ): 
                  foreach( $case as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aCenter"><?php echo date("d-m-Y", strtotime($row["tgl_spdp_diterima"])) ?></td>
                <td class="aLeft"><?php echo $row["register_rpa1"] ?></td>
                <td class="aLeft"><?php echo $row["name_suspect"] ?></td>            
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/rpa2/form/<?php echo $row["id_rpa1"] ?>" data-toggle="tooltip" title="Registrasi ke Register Perkara Anak 2">
                      <i class="glyphicon glyphicon-arrow-up"></i> RPA 2
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/rpa1/form/<?php echo $row["id_rpa1"] ?>" data-toggle="tooltip" title="Ubah Data">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a name="<?php echo $row["name_suspect"] ?>" href="<?php echo base_url() ?>index.php/rpa1/delete/<?php echo $row["id_rpa1"] ?>/<?php echo $row["suspect_id"] ?>" class="delete_data">
                      <i class="glyphicon glyphicon-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php 
              $no++;
              endforeach;
              endif; 
            ?>
              </tbody>

            </table>
           
          </div>

<script>
  $(".delete_data").click(function(e) {
    var nama = $(this).attr("name");
    if( confirm("Apakah anda yakin ingin menghapus data kasus : "+nama) )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>