<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Daftar Perkara</h3>
          <div class="row">
                        
            <table class="table tables display table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tersangka</th>
                  <th>Tempat, Tanggal Lahir</th>                  
                  <th>RP6</th>
                  <th>RP7</th>
                  <th>RP9</th>
                  <th>RP12</th>
                  <th>RB2</th>
                  <th>RT2</th>
                  <th>RT3</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($status_perkara) and !empty($status_perkara) ): 
                  foreach( $status_perkara as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aLeft"><?php echo $row["name"] ?></td>
                <td class="aLeft"><?php echo $row["ttl"] ?></td>                
                <td align="center"><?php echo (isset($row['rp6_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
                <td align="center"><?php echo (isset($row['rp7_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
                <td align="center"><?php echo (isset($row['rp9_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
                <td align="center"><?php echo (isset($row['rp7_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
                <td align="center"><?php echo (isset($row['rb2_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>';?></td>
                <td align="center"><?php echo (isset($row['rt2_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
                <td align="center"><?php echo (isset($row['rt3_case']))? '<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-minus"></i>'; ?></td>
            </tr>
            <?php 
              $no++;
              endforeach;
              endif; 
            ?>
              </tbody>

            </table>
            
            <p><em>*Panduan untuk mengisi aplikasi, silahkan klik disini</em> </p>
          </div>