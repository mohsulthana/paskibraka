

								<!-- Batas Tanda -->
								<div class="logo-pro">
											<a href="index.html"><img class="main-logo" align="center" src="img/paskibraka.jpeg" alt="" /></a>
								</div>

								<div class="row">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																								<div class="sparkline12-list">
																												<div class="sparkline12-hd">
																																<div class="main-sparkline12-hd">
																																				<h1>Input User Baru</h1>
																																</div>
																												</div>
																												<div class="sparkline12-graph">
																																<div class="basic-login-form-ad">
																																				<div class="row">
																																								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																																												<div class="all-form-element-inner">
																																													
																																																<form action="<?php echo base_url() ?>Admin/insert_user" method="post">
																																																				
																																																			<?php 
																																																				foreach ($data_user as $key => $row) { ?>

																																																				<div class="form-group-inner">
																																																								<div class="row">
																																																												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																																																																<label class="login2 pull-right pull-right-pro">Nama Lengkap</label>
																																																												</div>
																																																												<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
																																																																<input type="text" value="<?= $row['Nama_Lengkap'] ?>" name="namalengkap" class="form-control" />
																																																												</div>
																																																								</div>
																																																				</div>

																																																			<div class="form-group-inner">
																																																								<div class="row">
																																																												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																																																																<label class="login2 pull-right pull-right-pro">Username</label>
																																																												</div>
																																																												<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
																																																																<input type="text" value="<?= $row['Nama'] ?>"  name="nama" class="form-control" />
																																																												</div>
																																																								</div>
																																																				</div>

																																																				<div class="form-group-inner">
																																																								<div class="row">
																																																												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																																																																<label class="login2 pull-right pull-right-pro">Password</label>
																																																												</div>
																																																												<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
																																																																<input type="text" value="<?= $row['Password'] ?>"  name="password" class="form-control" />
																																																												</div>
																																																								</div>
																																																				</div>

																																																						<div class="form-group-inner">
																																																								<div class="row">
																																																											
																																																												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																																																																<label class="login2 pull-right pull-right-pro">Status</label>
																																																												</div>
																																																												<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
																																																																<div class="form-select-list">
																																																																				<select class="form-control custom-select-value" name="status">
																																																																				<option <?php if($row['status']==1){ echo "selected";} ?> value="1">Peserta</option>
																																																																				<option <?php if($row['status']==2){ echo "selected";} ?> value="2">Admin Dispora</option>
																																																																				<option <?php if($row['status']==3){ echo "selected";} ?> value="3">Pimpinan</option>
																																																																				<option <?php if($row['status']==4){ echo "selected";} ?> value="4">Admin Sistem</option>
																																																																				<option <?php if($row['status']==5){ echo "selected";} ?> value="5">Team Penilai</option>
																																																																			</select>
																																																																</div>
																																																												</div>
																																																								</div>
																																																				</div>

																																																				
																																																				<input type="text" name="nisn" hidden value="<?= $row['NISN'] ?>">
																																																				<div class="form-group-inner">
																																																								<div class="login-btn-inner">
																																																												<div class="row">
																																																																<div class="col-lg-3"></div>
																																																																<div class="col-lg-9">
																																																																				<div class="login-horizental cancel-wp pull-left">
																																																																								<button class="btn btn-white" type="submit">Batal</button>
																																																																								<button class="btn btn-sm btn-primary login-submit-cs" type="submit">Kirim</button>
																																																																				</div>
																																																																</div>
																																																												</div>
																																																								</div>
																																																				</div>
																																																			<?php } ?>
																																																			
																																																</form>
																																												</div>
																																								</div>
																																				</div>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>

								<!-- End Of Tanda -->

		