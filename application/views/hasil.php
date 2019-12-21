<!-- TABEL -->
<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list" style="margin-top: 40px;">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">

              <h1>HASIL </h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">

              <table id="table" class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                  <tr>

                    <th data-field="nama" data-editable="true">No.</th>
                    <th data-field="NISN">NISN</th>
                    <th data-field="nama" data-editable="true">Nama Lengkap</th>
                    <th data-field="date" data-editable="true">Asal Sekolah</th>
                    <th data-field="task" data-editable="true">Asal Daerah</th>
                    <th data-field="JK" data-editable="true">Jenis Kelamin</th>
                    <th data-field="action">Status Kelulusan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                                        									$nomor=1;
																																																	foreach ($data_siswa as $key => $row):
																																																?>

                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["NISN"]; ?></td>
                    <td><?php echo $row["Nama"]; ?></td>
                    <td><?php echo $row["Sekolah"]; ?></td>
                    <td><?php echo $row["Daerah"]; ?></td>
                    <td><?php echo $row["JK"]; ?></td>
                    <td><?php echo $row["status_kelulusan"]; ?></td>





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