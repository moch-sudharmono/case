<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Daftar Notifikasi</h3>
          <div class="row">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/notification/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kode Perkara</th>
                  <th>Periode</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($notify) and !empty($notify) ): 
                  foreach( $notify as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["title"] ?></td>
                <td class="aCenter"><?php echo $row["kode_perkara"] ?></td>
                <td class="aCenter"><?php echo $row["period"] ?> Hari</td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/notification/form/<?php echo $row["id_notification"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/notification/delete/<?php echo $row["id_notification"] ?>" class="delete_data">
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
                <?php echo $paging; ?>
            </ul>
        </div>
          </div>

<script>
  $(".delete_data").click(function(e) {
    
        if( confirm("Apakah anda ingin menghapus data ?") )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>