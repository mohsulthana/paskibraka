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

             <table id="table" class="table table-striped" >
                <thead>
                  <tr>
                    <th data-field="nomor" data-editable="true">No.</th>
                    <th data-field="nama">Nama Kriteria</th>
                    <th data-field="bobot" data-editable="true">Bobot</th>
                     <?php if($this->session->userdata()['role'] === 'Admin') { ?>
                    <th data-field="action">Action</th>
                    <?php } ?>
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
                    <td>

                  

                 <?php if($this->session->userdata()['role'] === 'Admin') { ?>
                      <form action="<?php echo base_url() ?>Admin/input_bobot" method="post">
                        <input type="text" value="<?php echo $row["id_bobot"]; ?>" name="id_bobot" hidden>
                        <input type="submit" class="btn btn-primary" value="Update" name="submit">
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