<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Administrasi</h3>
          <div class="row">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/admin/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>
            <hr />            
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Admin</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($admin) and !empty($admin) ): 
                  foreach( $admin as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["name"] ?></td>
                <td class="aLeft"><?php echo $row["email"] ?></td>
                <td class="aLeft"><?php echo $row["role"] ?></td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/admin/form/<?php echo $row["id_admin"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a admin="<?php echo $row["name"] ?>" href="<?php echo base_url() ?>index.php/admin/delete/<?php echo $row["id_admin"] ?>" class="delete_data">
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
    var admin = $(this).attr("admin");
        if( confirm("Apakah anda ingin menghapus data admin : "+admin+" ?") )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>