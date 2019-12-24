<body>
  <!--[if lt IE 8]>
												<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
								<![endif]-->

  <div class="left-sidebar-pro">
    <nav id="sidebar" class="">
      <div class="sidebar-header">
        <a href="<?php echo base_url() ?>Login">
          <h3>Paskibraka SumSel
        </a>
        <strong><img src="img/logo/logosn.png" alt="" /></strong>
      </div>
      <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
          <ul class="metismenu" id="menu1">
            <li class="active">
              <a class="has-arrow" href="<?php echo base_url() ?>Admin/home">
                <i class="fa big-icon fa-home icon-wrap"></i>
                <span class="mini-click-non">Pendaftaran</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">

                <?php if ($this->session->userdata()['role'] == 'User') {?>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>User/pendaftaran"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Form
                      Pendaftaran</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>User/datadiri"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Lihat
                      Data</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>User/hasil"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Lihat
                      Hasil</span></a>
                </li>
                <?php } else if ($this->session->userdata()['role'] == 'Sistem'){?>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/lihatuser"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Data User</span></a></li>
                
                <?php } else if ($this->session->userdata()['role'] == 'Pimpinan'){?>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/kriteria_pimpinan"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Kriteria dan
                      Bobot</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/datapendaftarpimpinan"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Data
                      Pendaftar</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/daftarnilai"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Daftar
                      Nilai</span></a>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/rankingpimpinan"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Lihat
                      Ranking</span></a></li>
                <?php } else {?>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/kriteria_penilaian"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Kriteria dan
                      Bobot</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/datapendaftar"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Data
                      Pendaftar</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/perankingan"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Lihat
                      Ranking</span></a></li>
                <li><a title="Dashboard v.1" href="<?php echo base_url() ?>Admin/daftarnilai"><i
                      class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Daftar
                      Nilai</span></a>
                </li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </nav>
  </div>