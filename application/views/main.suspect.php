<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Tersangka</h3>
          <div class="row">
            
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Alamat</th>                  
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($suspect) and !empty($suspect) ): 
                  foreach( $suspect as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["name_suspect"] ?></td>
                <td class="aLeft"><?php echo $row["birthplace"].', '. date("d-m-Y", strtotime($row["birthdate"]))?></td>
                <td class="aLeft"><?php echo $row["address"] ?></td>                
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
        if( confirm("Anda yakin / Are you sure ?") )
    {
      return true;
    }
    else
    {
      return false;
    }
    });
</script>