<!-- TABEL -->
<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">

              <h1>Daftar User</h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
              <form action="<?php echo base_url() ?>/Admin/inputuser" method="post">
                <input type="submit" value="Input User" class="btn btn-primary" name="submit">

              </form>
              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                  <tr>

                    <th data-field="no" data-editable="true">No.</th>
                    <th data-field="namalengkap" data-editable="true">Nama Lengkap</th>
                    <th data-field="username" data-editable="true">Username</th>
                    <th data-field="password" data-editable="true">Password</th>
                    <th data-field="status" data-editable="true">Status</th>
                    <th data-field="action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                                        									$nomor=1;
																																																	foreach ($lihatuser as $key => $row):
																																																?>

                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["Nama_Lengkap"]; ?></td>
                    <td><?php echo $row["Nama"]; ?></td>
                    <td><?php echo $row["Password"]; ?></td>
                    <?php if($row["status"]==1){
                                                	?>
                    <td>Pendaftar</td>
                    <?php }

                                                 if($row["status"]==2){
                                                	?>
                    <td>Admin Dispora</td>
                    <?php }

                                                 if($row["status"]==3){
                                                	?>
                    <td>Pimpinan</td>
                    <?php }
                                                if($row["status"]==4){
                                                	?>
                    <td>Admin Sistem</td>
                    <?php } 
                                                if($row["status"]==5){
                                                	?>
                    <td>Team Penilai</td>
                    <?php } ?>
                    <td>
                      <form action="<?php echo base_url() ?>/Admin/hapusdatauser" method="post">
                        <input type="submit" class="btn btn-danger" value="Hapus" name="submit">
                        <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                      </form>
                      <form action="<?php echo base_url() ?>/Admin/update_user" method="post">
                        <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                        <input type="submit" class="btn btn-success" value="Update" name="submit">
                      </form>

                    </td>


                  </tr>

                  <?php $nomor++; endforeach ?>

                </tbody>

              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>