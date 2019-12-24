    <!-- TABEL -->
    <div class="data-table-area mg-tb-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
              <div class="sparkline13-hd">
                <div class="main-sparkline13-hd">

                  <h1>Daftar Peserta </h1>
                </div>
              </div>
              <div class="sparkline13-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">

                  <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                    data-search="true" data-show-columns="true" data-show-pagination-switch="true"
                    data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true"
                    data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                    data-toolbar="#toolbar">
                    <thead>
                      <tr>

                        <th data-field="nama" data-editable="true">No.</th>
                        <th data-field="NISN">NISN</th>
                        <th data-field="email" data-editable="true">Email</th>
                        <th data-field="nama" data-editable="true">Nama Lengkap</th>
                        <th data-field="date" data-editable="true">Asal Sekolah</th>
                        <th data-field="task" data-editable="true">Asal Daerah</th>
                        <th data-field="JK" data-editable="true">Jenis Kelamin</th>
                        <th data-field="action">Action</th>
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
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["Nama"]; ?></td>
                        <td><?php echo $row["Sekolah"]; ?></td>
                        <td><?php echo $row["Daerah"]; ?></td>
                        <td><?php echo $row["JK"]; ?></td>
                        <td>
                          <form action="<?php echo base_url() ?>Admin/detail" method="post">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                            <input type="submit" class="btn btn-primary" value="detail" name="submit">
                          </form>
                          <form action="<?php echo base_url() ?>Admin/hapusdata" method="post">
                            <input type="submit" class="btn btn-danger" value="hapus" name="submit">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                          </form>
                          <?php if($this->session->userdata()['role'] === 'Admin') { ?>
                          <form action="<?php echo base_url() ?>Admin/penilaian" method="post">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                            <input type="submit" class="btn btn-success" value="Input Nilai" name="submit"></form>
                          </form>
                          <?php } else if ($this->session->userdata()['role'] === 'Penilai' ) {?>
                          <form action="<?php echo base_url() ?>Admin/penilaian_penilai" method="post">
                            <input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                            <input type="submit" class="btn btn-primary" value="Input Nilai" name="submit"></form>
                          </form>
                          <?php } ?>

                        </td>


                      </tr>

                      <?php $nomor++; endforeach ?>

                    </tbody>

                  </table>
                  <form action="<?php echo base_url() ?>Admin/algoritma_topsis" method="post">
                    <input type="submit" class="btn btn-primary" class="btn btn-primary" value="PROSES" name="submit"></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Tabel -->