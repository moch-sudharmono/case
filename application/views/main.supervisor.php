<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Supervisor</h3>
          <div class="row">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/supervisor/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>

            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Supervisor</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($supervisor) and !empty($supervisor) ): 
                  foreach( $supervisor as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["name_supervisor"] ?></td>
                <td class="aLeft"><?php echo $row["phone_supervisor"] ?></td>
                <td class="aLeft"><?php echo $row["email_supervisor"] ?></td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/supervisor/form/<?php echo $row["id_supervisor"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a supervisor="<?php echo $row["name_supervisor"] ?>" href="<?php echo base_url() ?>index.php/supervisor/delete/<?php echo $row["id_supervisor"] ?>" class="delete_data">
                      <i class="glyphicon glyphicon-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php 
              $no = $no + 1;
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
    var supervisor = $(this).attr("supervisor");
        if( confirm("Apakah anda ingin menghapus data supervisor : "+ supervisor) )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>