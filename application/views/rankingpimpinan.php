<div class="data-table-area mg-tb-15" style="margin-top: 4rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Hasil Perankingan Peserta </h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">

              <table id="table" data-toggle="table" class="table table-striped" data-pagination="true"
                data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                data-toolbar="#toolbar">
                <thead>
                  <tr>
                    <th data-field="nama" data-editable="true">No.</th>
                    <th data-field="NISN">NISN</th>
                    <th data-field="nama" data-editable="true">Nama Lengkap</th>
                    <th data-field="date" data-editable="true">Asal Sekolah</th>
                    <th data-field="task" data-editable="true">Asal Daerah</th>
                    <th data-field="JK" data-editable="true">Jenis Kelamin</th>
                    <th data-field="JK" data-editable="true">Nilai Akhir</th>
                    <th data-field="JK" data-editable="true">Status Kelulusan</th>

                    <th data-field="action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                                        									$nomor=1;
																																																	foreach ($lihat_ranking as $key => $row):
																																																?>

                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["NISN"]; ?></td>
                    <td><?php echo $row["Nama"]; ?></td>
                    <td><?php echo $row["Sekolah"]; ?></td>
                    <td><?php echo $row["Daerah"]; ?></td>
                    <td><?php echo $row["JK"]; ?></td>
                    <td><?php echo $row["Nilai_Akhir"]; ?></td>
                    <td><?php echo $row["status_kelulusan"]; ?></td>
                    <td>
                      <div>
                        <form action="<?php echo base_url() ?>/Admin/status_lulus" method="post">
                          <input type="submit" class="btn btn-primary" value="Lulus" name="submit">
                          <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                        </form>
                      </div>
                      <div>
                        <form action="<?php echo base_url() ?>/Admin/status_tidak_lulus" method="post">
                          <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                          <input type="submit" class="btn btn-danger" value="Tidak Lulus" name="submit"></form>
                      </div>
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