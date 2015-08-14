<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Register Perkara 12 (RP-12)</h3>
          <div class="row">
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/rp12/downloadExcel">
            Mulai Tanggal : <input type="text" class="form-control datepicker" id="MulaiTanggal" name="MulaiTanggal" placeholder="DD/MM/YYYY">
            Sampai  : <input type="text" class="form-control datepicker" id="SampaiTanggal" name="SampaiTanggal" placeholder="DD/MM/YYYY">
            <input type="submit" class="btn btn-primary" name="exportRp12" id="exportRp12" value="Export Data to Excel" /> 
            </form>
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Register RP12</th>
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
                <td class="aCenter"><?php echo$row["register_rp12"] ?></td>
                <td class="aLeft"><?php echo $row["name_suspect"] ?></td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/rt3/form/<?php echo $row["id_rp12"] ?>" data-toggle="tooltip" title="Registrasi ke Register Tahanan 3">
                      <i class="glyphicon glyphicon-arrow-up"></i> RT 3
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/rp12/form/<?php echo $row["rp9_id"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a name="<?php echo $row["name_suspect"] ?>" href="<?php echo base_url() ?>index.php/rp12/delete/<?php echo $row["id_rp12"] ?>/<?php echo $row["suspect_id"] ?>" class="delete_data">
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
            <div align="right">
            <ul class="pagination">
                <?php //echo $paging; ?>
            </ul>
        </div>
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