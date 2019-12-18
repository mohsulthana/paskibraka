<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Daftar Kriteria dan Bobot </h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">

              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                  <tr>
                    <th data-field="nomor" data-editable="true">No.</th>
                    <th data-field="nama">Nama Kriteria</th>
                    <th data-field="bobot" data-editable="true">Bobot</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                                        									$nomor=1;
																																																	foreach ($data_siswa as $key => $row):
																																																?>

                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["bobot"]; ?></td>


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