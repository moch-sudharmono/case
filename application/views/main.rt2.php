<style type="text/css">th{text-align: center;}</style>
<h3 class="page-header">Register Tahanan 2 (RT 2)</h3>
          <div class="row">
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/rt2/downloadExcel">
            Mulai Tanggal : <input type="text" class="form-control datepicker" id="MulaiTanggal" name="MulaiTanggal" placeholder="DD/MM/YYYY">
            Sampai  : <input type="text" class="form-control datepicker" id="SampaiTanggal" name="SampaiTanggal" placeholder="DD/MM/YYYY">
            <input type="submit" class="btn btn-primary" name="exportRt2" id="exportRt2" value="Export Data to Excel" /> 
            </form>
            <hr />
            <table class="table table-striped tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>No Register</th>
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
                <td class="aCenter"><?php echo date("d-m-Y", strtotime($row["date"])) ?></td>
                <td class="aCenter"><?php echo $row["register_rt2"] ?></td>
                <td class="aCenter"><?php echo $row["name_suspect"] ?></td>
                
                <td align="center">
                    <a href="<?php echo base_url() ?>index.php/rt2/view/<?php echo $row["id_rt2"] ?>">
                      <i class="glyphicon glyphicon-search"></i> Lihat
                    </a>
                    |
                    <a href="<?php echo base_url() ?>index.php/rt2/form/<?php echo $row["rp6_id"] ?>">
                      <i class="glyphicon glyphicon-pencil"></i> Ubah
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