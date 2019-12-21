<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="sparkline12-list" style="margin-top: 40px;">
      <div class="sparkline12-hd">
        <div class="main-sparkline12-hd">
          <h1>Formulir Pendaftaran</h1>
        </div>
      </div>
      <div class="sparkline12-graph">
        <div class="basic-login-form-ad">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="all-form-element-inner">
                <!--  <input name="nisn" type="text" class="form-control"> -->
                <form action="<?php echo base_url() ?>/User/insert_data_siswa" method="post"
                  enctype="multipart/form-data">

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">NISN</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="nisn" value="<?php echo $this->session->userdata('nisn'); ?>"
                          class="form-control" disabled="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Email</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="email" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Nomor HP</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="nomorhp" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Kelas</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="kelas" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Asal Sekolah</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="sekolah" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Asal Daerah</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="form-select-list">
                          <select class="form-control custom-select-value" name="daerah">
                            <option>Kabupaten Banyuasin</option>
                            <option>Kabupaten Empat Lawang</option>
                            <option>Kabupaten Lahat</option>
                            <option>Kabupaten Muara Enim</option>
                            <option>Kabupaten Musi Banyuasin</option>
                            <option>Kabupaten Musi Rawas</option>
                            <option>Kabupaten Musi Rawas Utara</option>
                            <option>Kabupaten Ogan Ilir</option>
                            <option>Kabupaten Ogan Komering Ilir</option>
                            <option>Kabupaten Ogan Komering Ulu</option>
                            <option>Kabupaten Ogan Komering Ulu Selatan</option>
                            <option>Kabupaten Ogan Komering Ulu Timur</option>
                            <option>Kabupaten Penukal Abab Lematang Ilir</option>
                            <option>Kota LubukLinggau</option>
                            <option>Kota Pagar Alam</option>
                            <option>Kota Palembang</option>
                            <option>Kota Prabumulih</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                        <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                      </div>
                      <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                        <div class="bt-df-checkbox">
                          <label> <input class="pull-left radio-checked" type="radio" checked="" value="Laki-laki"
                              id="optionsRadios1" name="jeniskelamin">Laki-laki</label>
                          <label><input class="pull-left" type="radio" value="Perempuan" id="optionsRadios2"
                              name="jeniskelamin">Perempuan </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Tinggi Badan</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="integer" name="tinggibadan" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Berat Badan</label>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="integer" name="beratbadan" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Surat Delegasi Kabupaten/Kota</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="surat_delegasi"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Surat Keterangan Aktif Sekolah</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="aktif_sekolah"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Surat Izin Orang Tua</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="izin_ortu"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Surat Keterangan Sehat</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="surat_sehat"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Biodata</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="biodata"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Pas Photo</label>
                      </div>
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="file-upload-inner ts-forms">
                          <input type="file" name="foto"
                            onchange="document.getElementById('prepend-small-btn').value = this.value;">
                        </div>
                      </div>
                    </div>
                  </div>
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
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>