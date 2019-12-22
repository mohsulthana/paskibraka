<!-- TABEL -->
<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Daftar Nilai</h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">

              <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                data-toolbar="#toolbar">
                <thead>
                  <tr>
                    <th data-field="nomor" data-editable="true">No.</th>
                    <th data-field="nama">NISN</th>
                    <th data-field="bobot" data-editable="true">Wawancara</th>
                    <th data-field="bobot" data-editable="true">Tes Tertulis</th>
                    <th data-field="bobot" data-editable="true">Kesehatan</th>
                    <th data-field="bobot" data-editable="true">Postur Tubuh</th>
                    <th data-field="bobot" data-editable="true">Kebugaran Jasmani</th>
                    <?php if($this->session->userdata()['role'] === 'Penilai' && $this->session->userdata()['role'] === 'Admin') { ?>
                      <th data-field="action">Action</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                                        									$nomor=1;
																																																	foreach ($data_nilai as $key => $row):
																																																?>

                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["NISN"]; ?></td>
                    <td><?php echo $row["Wawancara"]; ?></td>
                    <td><?php echo $row["Tertulis"]; ?></td>
                    <td><?php echo $row["Kesehatan"]; ?></td>
                    <td><?php echo $row["Postur"]; ?></td>
                    <td><?php echo $row["Jasmani"]; ?></td>
                    <td>
                      <?php if($this->session->userdata()['role'] === 'Admin') { ?>
                          <form action="<?php echo base_url() ?>Admin/penilaian" method="post">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                              <input type="submit" value="Update" class="btn btn-primary" name="submit">
                          </form>
                      <?php } else if ($this->session->userdata()['role'] === 'Penilai' ) {?>
                        <form action="<?php echo base_url() ?>Admin/penilaian_penilai" method="post">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                              <input type="submit" value="Update" class="btn btn-primary" name="submit">
                          </form>
                      <?php } ?>
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