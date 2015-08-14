<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Daftar Kategori</h3>
          <div class="row">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/kategori/form/0" role="button">
              <span class="glyphicon glyphicon-plus"></span> Data Baru
            </a>
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori Perkara</th>
                  <th>Deskripsi</th>
                  <th>Status Aktif</th>
                  <th>Option</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  if( isset($kategori) and !empty($kategori) ): 
                  foreach( $kategori as $row ):
                ?>
            <tr>
                <td class="aRight"><?php echo $no ?>.</td>
                <td class="aCenter"><?php echo $row["kategori_perkara"] ?></td>
                <td class="aCenter"><?php echo $row["deskripsi_kategori"] ?></td>
                <td class="aCenter">
                	<?php if( $row["status_kategori"] == 1 ){ ?>
                      <i class="glyphicon glyphicon-ok"></i>
                   	<?php }else { ?>
                    	<i class="glyphicon glyphicon-remove"></i>
                    <?php } ?>
                </td>
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/kategori/form/<?php echo $row["id_kategori"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/kategori/change/<?php echo $row["id_kategori"] ?>/<?php echo $row["status_kategori"] ?>">
                    <?php if( $row["status_kategori"] == 1 ){ ?>
                      <i class="glyphicon glyphicon-remove"></i> Ubah ke Non-Aktif 
                   	<?php }else { ?>
                    	<i class="glyphicon glyphicon-ok"></i> Ubah ke Aktif
                    <?php } ?>
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
            
          </div>
