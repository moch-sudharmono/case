<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Register Perkara Anak 4 (RPA-4) </h3>

          <div class="row">            
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/rpa4/downloadExcel">
            
            Mulai Tanggal : <input type="text" class="form-control datepicker" id="MulaiTanggal" name="MulaiTanggal" placeholder="DD/MM/YYYY">
            Sampai  : <input type="text" class="form-control datepicker" id="SampaiTanggal" name="SampaiTanggal" placeholder="DD/MM/YYYY">
            <input type="submit" class="btn btn-primary" name="exportrpa4" id="exportrpa4" value="Export Data to Excel" /> 
            </form>
            
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Register RPA 4</th>
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
                <td class="aCenter"><?php echo date("d-m-Y", strtotime($row["tgl_rpa4"])) ?></td>
                <td class="aLeft"><?php echo $row["register_rpa4"] ?></td>
                <td class="aLeft"><?php echo $row["name_suspect"] ?></td>            
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/rpa5/form/<?php echo $row["id_rpa4"] ?>" data-toggle="tooltip" title="Registrasi ke Register Perkara Anak 5">
                      <i class="glyphicon glyphicon-arrow-up"></i> RPA 5
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/rpa4/form/<?php echo $row["id_rpa4"] ?>" data-toggle="tooltip" title="Ubah Data">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a name="<?php echo $row["name_suspect"] ?>" href="<?php echo base_url() ?>index.php/rpa4/delete/<?php echo $row["id_rpa4"] ?>/<?php echo $row["suspect_id"] ?>" class="delete_data">
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