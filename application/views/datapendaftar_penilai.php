

								<!-- Batas Tanda -->
							
								<!-- End Of Tanda -->

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
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
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
                                                <td> <form action="<?php echo base_url() ?>Admin/detail_penilai" method="post"> 
                                                	<input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                                                	<input type="submit" value="detail" name="submit">
                                                </form>
             
                                                		<form action="<?php echo base_url() ?>Admin/penilaian_penilai" method="post"> 
                                                			<input type="text" value="<?php echo $row["NISN"]; ?>" name="nisn" hidden>
                                                			<input type="submit" value="Input Nilai" name="submit"></form>
                                                	
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
								<!-- Akhir Tabel -->
								<div class="footer-copyright-area">
												<div class="container-fluid">
																<div class="row">
																				<div class="col-lg-12">
																								<div class="footer-copy-right">
																												<p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Dispora SumSel</a> All rights reserved.</p>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</div>

				<!-- jquery
		