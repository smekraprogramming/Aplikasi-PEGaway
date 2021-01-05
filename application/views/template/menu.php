  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?=base_url('assets/');?>images/user-mini.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?=$this->session->userdata('logged_in')['nama_user']?></b></div>
                    <div class="email"><?=$this->session->userdata('logged_in')['username']?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0)"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=site_url('auth/logout')?>"><i class="material-icons">power_settings_new</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">PILIHAN MENU</li>
                    <li>
                        <a href="<?=site_url('dashboard')?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
				     <li>
                        <a href="<?=site_url('izin')?>">
                            <i class="material-icons">description</i>
                            <span>Permohonan Izin</span>
                        </a>
                    </li>
                      <?php if($this->session->userdata('logged_in')['is_admin']==1){ ?>
                        <li class="header">Admin Panel</li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">library_books</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="<?=site_url('gtk');?>">Data Kepegawaian</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('status');?>">Status | Jam Kerja</a>
                                </li>
                                 <li>
                                    <a href="javascript:void(0)?>">Jenis Izin</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                             <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment</i>
                                <span>Laporan</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="<?=site_url('laporan');?>">Rekap Bulanan</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('laporan/harian');?>">Rekap Harian</a>
                                </li>
                                 <li>
                                    <a href="javascript:void(0)?>">Rekap Tunjangan Kehadiran</a>
                                </li>
                            </ul>
                            
                        </li>
                        <li>
                             <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">settings</i>
                                <span>Setting</span>
                            </a>
                            <ul class="ml-menu">
                                 <li>
                                    <a href="javascript:void(0)?>">Pengumuman</a>
                                </li>
                                 <li>
                                    <a href="javascript:void(0)?>">Konfigurasi App</a>
                                </li>
                                  <li>
                                    <a href="javascript:void(0)?>">Backup App</a>
                                </li>
                                  <li>
                                    <a href="javascript:void(0)?>">Backup Database</a>
                                </li>
                            </ul>
                            
                        </li>
                    <?php    } ?>
                    
                    <?php if($this->session->userdata('logged_in')['status_id']==1){ ?>
                        <li class="header">Kepala Sekolah Panel</li>
                        <li>
                             <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment</i>
                                <span>Laporan</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="<?=site_url('kepala_sekolah');?>">Rekap Bulanan</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('kepala_sekolah/harian');?>">Rekap Harian</a>
                                </li>
                            </ul>
                            
                        </li>
                      
                    <?php    } ?>
                   
			
				    <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">description</i>
                            <span>Permohonan Izin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="./index.php?p=sakit">Sakit</a>
                            </li>
                            <li>
                                <a href="./index.php?p=izin">Izin Kepentingan Pribadi</a>
                            </li>
                        </ul>
                    </li> -->
					          <li>
                        <a href="<?=site_url('auth/logout')?>">
                            <i class="material-icons">power_settings_new</i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Aplikasi <b>PEG</b>away 2020 <a href="javascript:void(0);">| &copy;Timplungan</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->