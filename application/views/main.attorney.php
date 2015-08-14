<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Jaksa</h3>
          <div class="row">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/attorney/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>
            <hr />            

            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jaksa</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($attorney) and !empty($attorney) ): 
                  foreach( $attorney as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["name_attorney"] ?></td>
                <td class="aLeft"><?php echo $row["phone"] ?></td>
                <td class="aLeft"><?php echo $row["email"] ?></td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/attorney/form/<?php echo $row["id_attorney"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a jaksa="<?php echo $row["name_attorney"] ?>" href="<?php echo base_url() ?>index.php/attorney/delete/<?php echo $row["id_attorney"] ?>" class="delete_data">
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
    var jaksa = $(this).attr("jaksa");
        if( confirm("Apakah anda ingin menghapus data jaksa : "+jaksa) )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>