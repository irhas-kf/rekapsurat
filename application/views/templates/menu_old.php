<?php 
  $user = $this->session->userdata('admin');
  $modul= $this->session->userdata('modul');
  $uri_segement = $this->uri->segment(1);
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets');?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= strtoupper($user['USERNAME']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">
          MAIN NAVIGATION
          <br><small style="font-weight: bold;"><?= "Tahun Data : ".get_sesi("TAHUN") ?></small>
        </li>

        <?php 
          if( 
            (isset($modul['DASHBOARD']) && preg_match("/1\w{3}/", $modul['DASHBOARD'], $output_array))
          ):
        ?>

        <li>
          <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <?php
          endif; 
        ?>


        <?php 
          if( 
            (isset($modul['POSTING']) && preg_match("/1\w{3}/", $modul['POSTING'], $output_array))
          ):
        ?>

        <li>
          <a href="<?= base_url('posting') ?>">
            <i class="fa fa-files-o"></i> <span>Posting</span>
          </a>
        </li>
        
        <?php
          endif; 
        ?>

        <?php
          if( 
            (isset($modul['LEVEL']) && preg_match("/1\w{3}/", $modul['LEVEL'], $output_array)) ||
            (isset($modul['MODUL']) && preg_match("/1\w{3}/", $modul['MODUL'], $output_array)) ||
            (isset($modul['USER_ROLE']) && preg_match("/1\w{3}/", $modul['USER_ROLE'], $output_array)) ||
            (isset($modul['AKUN']) && preg_match("/1\w{3}/", $modul['AKUN'], $output_array))
          ):
        ?>

        <li class="treeview <?= ($uri_segement=='superadmin')?'menu-open':''; ?>">
          <a href="#">
            <i class="fa fa-rocket"></i> <span>SUPERADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: <?= ($uri_segement=='superadmin')?'block':'none'; ?>">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Master
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <?php 
                  if( 
                    (isset($modul['LEVEL']) && preg_match("/1\w{3}/", $modul['LEVEL'], $output_array))
                  ):
                ?>

                <li><a href="<?= base_url('superadmin/user_level') ?>"><i class="fa fa-circle-o"></i> Level</a></li>

                <?php
                  endif;

                  if( 
                    (isset($modul['MODUL']) && preg_match("/1\w{3}/", $modul['MODUL'], $output_array))
                  ):
                ?>

                <li><a href="<?= base_url('superadmin/modul') ?>"><i class="fa fa-circle-o"></i> Modul</a></li>

                <?php
                  endif;
                ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Manajemen
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <?php 
                  if( 
                    (isset($modul['USER_ROLE']) && preg_match("/1\w{3}/", $modul['USER_ROLE'], $output_array))
                  ):
                ?>

                <li><a href="<?= base_url('superadmin/user_role') ?>"><i class="fa fa-circle-o"></i> User Role</a></li>

                <?php
                  endif;

                  if( 
                    (isset($modul['AKUN']) && preg_match("/1\w{3}/", $modul['AKUN'], $output_array))
                  ):
                ?>

                <li><a href="<?= base_url('superadmin/akun') ?>"><i class="fa fa-circle-o"></i> Akun</a></li>
                
                <?php
                  endif;
                ?>
              </ul>
            </li>
          </ul>
        </li>
        <?php endif; ?>
        
        <?php 
          if( 
            (isset($modul['PEGAWAI']) && preg_match("/1\w{3}/", $modul['PEGAWAI'], $output_array)) ||
            (isset($modul['BESARAN_GAJI']) && preg_match("/1\w{3}/", $modul['BESARAN_GAJI'], $output_array)) ||
            (isset($modul['ABSENSI']) && preg_match("/1\w{3}/", $modul['ABSENSI'], $output_array)) ||
            (isset($modul['LEMBUR']) && preg_match("/1\w{3}/", $modul['LEMBUR'], $output_array)) ||
            (isset($modul['LAPORAN_ABSENSI']) && preg_match("/1\w{3}/", $modul['LAPORAN_ABSENSI'], $output_array)) ||
            (isset($modul['PERINTAH_LAPANGAN']) && preg_match("/1\w{3}/", $modul['PERINTAH_LAPANGAN'], $output_array))
          ):
        ?>
        <li class="treeview <?= ($uri_segement=='pegawai')?'menu-open':''; ?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>KEPEGAWAIAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: <?= ($uri_segement=='pegawai')?'block':'none'; ?>">

            <?php
              if( 
                (isset($modul['PEGAWAI']) && preg_match("/1\w{3}/", $modul['PEGAWAI'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/daftar');?>"><i class="fa fa-circle-o"></i> Daftar Pegawai</a></li>

            <?php
              endif;

              if( 
                (isset($modul['BESARAN_GAJI']) && preg_match("/1\w{3}/", $modul['BESARAN_GAJI'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/daftar_gaji')?>"><i class="fa fa-circle-o"></i> Data Besaran Gaji</a></li>

            <?php
              endif;

              if( 
                (isset($modul['ABSENSI']) && preg_match("/1\w{3}/", $modul['ABSENSI'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/absensi');?>"><i class="fa fa-circle-o"></i> Absensi</a></li>

            <?php
              endif;

              if( 
                (isset($modul['LEMBUR']) && preg_match("/1\w{3}/", $modul['LEMBUR'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/lembur');?>"><i class="fa fa-circle-o"></i> Lembur</a></li>

            <?php
              endif;

              if( 
                (isset($modul['LAPORAN_ABSENSI']) && preg_match("/1\w{3}/", $modul['LAPORAN_ABSENSI'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/laporan');?>"><i class="fa fa-circle-o"></i> Laporan Absensi</a></li>

            <?php
              endif;

              if( 
                (isset($modul['PERINTAH_LAPANGAN']) && preg_match("/1\w{3}/", $modul['PERINTAH_LAPANGAN'], $output_array))
              ):
            ?>

            <li><a href="<?=site_url('pegawai/tugas');?>"><i class="fa fa-circle-o"></i> Perintah Lapangan</a></li>

            <?php
              endif;
            ?>

          </ul>
        </li>
        <?php endif; // KEPEGAWAIAN ?>

        <?php
          if( 
            (isset($modul['KATEGORI']) && preg_match("/1\w{3}/", $modul['KATEGORI'], $output_array)) ||
            (isset($modul['SATUAN']) && preg_match("/1\w{3}/", $modul['SATUAN'], $output_array)) ||
            (isset($modul['PENYEDIA']) && preg_match("/1\w{3}/", $modul['PENYEDIA'], $output_array)) ||
            (isset($modul['BARANG']) && preg_match("/1\w{3}/", $modul['BARANG'], $output_array)) ||
            (isset($modul['PENERIMAAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENERIMAAN_BARANG'], $output_array)) ||
            (isset($modul['PENGEMBALIAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENGEMBALIAN_BARANG'], $output_array)) ||
            (isset($modul['SURAT_JALAN']) && preg_match("/1\w{3}/", $modul['SURAT_JALAN'], $output_array)) ||
            (isset($modul['PEMINDAHAN_BARANG']) && preg_match("/1\w{3}/", $modul['PEMINDAHAN_BARANG'], $output_array)) ||
            (isset($modul['STOK_BARANG']) && preg_match("/1\w{3}/", $modul['STOK_BARANG'], $output_array)) ||
            (isset($modul['BARANG_PROYEK']) && preg_match("/1\w{3}/", $modul['BARANG_PROYEK'], $output_array))
          ):
        ?>

        <li class="treeview <?= ($uri_segement=='inventori')?'menu-open':''; ?>">
          <a href="#">
            <i class="fa fa-folder"></i> <span>INVENTORI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu" style="display: <?= ($uri_segement=='inventori')?'block':'none'; ?>">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Master
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

            <?php
              if( 
                (isset($modul['KATEGORI']) && preg_match("/1\w{3}/", $modul['KATEGORI'], $output_array))
              ):
            ?>

                <li><a href="<?= base_url('inventori/kategori') ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>

            <?php
              endif;

              if( 
                (isset($modul['SATUAN']) && preg_match("/1\w{3}/", $modul['SATUAN'], $output_array))
              ):
            ?>

                <li><a href="<?= base_url('inventori/satuan') ?>"><i class="fa fa-circle-o"></i> Satuan</a></li>

            <?php
              endif;

              if( 
                (isset($modul['PENYEDIA']) && preg_match("/1\w{3}/", $modul['PENYEDIA'], $output_array))
              ):
            ?>

                <li><a href="<?= base_url('inventori/penyedia') ?>"><i class="fa fa-circle-o"></i> Penyedia</a></li>

            <?php
              endif;

              if( 
                (isset($modul['BARANG']) && preg_match("/1\w{3}/", $modul['BARANG'], $output_array))
              ):
            ?>

                <li><a href="<?= base_url('inventori/barang') ?>"><i class="fa fa-circle-o"></i> Barang</a></li>

            <?php
              endif;
            ?>

              </ul>
            </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-arrow-circle-right"></i> <span>Barang Masuk</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

            <?php
              if( 
                (isset($modul['PENERIMAAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENERIMAAN_BARANG'], $output_array))
              ):
            ?>

              <li><a href="<?= base_url('inventori/barang_mas/terima_barang') ?>"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>

            <?php
              endif;

              if( 
                (isset($modul['PENGEMBALIAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENGEMBALIAN_BARANG'], $output_array))
              ):
            ?>

              <li><a href="<?= base_url('inventori/barang_mas/kembali_barang') ?>"><i class="fa fa-circle-o"></i> Pengembalian Barang</a></li>

            <?php
              endif;
            ?>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-truck"></i> <span>Barang Keluar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

            <?php
              if( 
                (isset($modul['SURAT_JALAN']) && preg_match("/1\w{3}/", $modul['SURAT_JALAN'], $output_array))
              ):
            ?>

              <li><a href="<?= base_url('inventori/barang_kel/index') ?>"><i class="fa fa-circle-o"></i> Surat Jalan</a></li>

            <?php
              endif;

              if( 
                (isset($modul['BARANG_PROYEK']) && preg_match("/1\w{3}/", $modul['BARANG_PROYEK'], $output_array))
              ):
            ?>

              <li><a href="<?= base_url('inventori/barang_proyek') ?>"><i class="fa fa-circle-o"></i> Barang Proyek</a></li>

            <?php
              endif;
            ?>

            </ul>
          </li>

            <?php
              if( 
                (isset($modul['PEMINDAHAN_BARANG']) && preg_match("/1\w{3}/", $modul['PEMINDAHAN_BARANG'], $output_array))
              ):
            ?>

          <li>
            <a href="<?= base_url('inventori/pindah') ?>">
              <i class="fa fa-reply"></i> <span>Pemindahan Barang</span>
            </a>
          </li>

            <?php
              endif;

              if( 
                (isset($modul['STOK_BARANG']) && preg_match("/1\w{3}/", $modul['STOK_BARANG'], $output_array))
              ):
            ?>

          <li>
            <a href="<?= base_url('inventori/stok') ?>">
              <i class="fa fa-th"></i> <span>Stok Barang</span>
            </a>
          </li>

            <?php
              endif;
            ?>

          <li>
            <a href="<?= base_url('inventori/laporan') ?>">
              <i class="fa fa-file"></i> <span>Laporan</span>
            </a>
          </li>

            </ul>
          </li>

          <?php
            endif; // INVENTORI
          ?>

          <?php
            if( 
              (isset($modul['PEMBAYARAN_PROYEK']) && preg_match("/1\w{3}/", $modul['PEMBAYARAN_PROYEK'], $output_array)) ||
              (isset($modul['PENJUALAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENJUALAN_BARANG'], $output_array)) ||
              (isset($modul['BELANJA']) && preg_match("/1\w{3}/", $modul['BELANJA'], $output_array)) ||
              (isset($modul['GAJI_TUNJANGAN']) && preg_match("/1\w{3}/", $modul['GAJI_TUNJANGAN'], $output_array)) ||
              (isset($modul['PIHAK_KETIGA']) && preg_match("/1\w{3}/", $modul['PIHAK_KETIGA'], $output_array)) ||
              (isset($modul['LAIN_LAIN']) && preg_match("/1\w{3}/", $modul['LAIN_LAIN'], $output_array)) || 
              (isset($modul['HUTANG']) && preg_match("/1\w{3}/", $modul['HUTANG'], $output_array)) ||
              (isset($modul['PIUTANG']) && preg_match("/1\w{3}/", $modul['PIUTANG'], $output_array)) ||
              (isset($modul['SUMBER_DANA']) && preg_match("/1\w{3}/", $modul['SUMBER_DANA'], $output_array))
            ):
          ?>
          <li class="treeview <?= ($uri_segement=='keuangan')?'menu-open':''; ?>">
            <a href="#">
              <i class="fa fa-money"></i> <span>KEUANGAN</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: <?= ($uri_segement=='keuangan')?'block':'none'; ?>">
              <?php
                if( 
                  (isset($modul['SUMBER_DANA']) && preg_match("/1\w{3}/", $modul['SUMBER_DANA'], $output_array))
                ):
              ?>
              <li><a href="<?= base_url('keuangan/sumber_dana') ?>"><i class="fa fa-circle-o"></i><span> Sumber Dana</span></a></li>
              <?php
                endif;
              ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Penerimaan
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <?php
                    if( 
                      (isset($modul['PEMBAYARAN_PROYEK']) && preg_match("/1\w{3}/", $modul['PEMBAYARAN_PROYEK'], $output_array))
                    ):
                  ?>

                  <li><a href="<?=site_url('keuangan/penerimaan/proyek');?>"><i class="fa fa-circle-o"></i> Pembayaran Proyek</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['PENJUALAN_BARANG']) && preg_match("/1\w{3}/", $modul['PENJUALAN_BARANG'], $output_array))
                    ):
                  ?>

                  <li><a href="<?=site_url('keuangan/penerimaan/barang');?>"><i class="fa fa-circle-o"></i> Penjualan Barang</a></li>

                  <?php
                    endif;
                  ?>

                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Pengeluaran
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <?php
                    if( 
                      (isset($modul['BELANJA']) && preg_match("/1\w{3}/", $modul['BELANJA'], $output_array))
                    ):
                  ?>

                  <li><a href="<?=site_url('keuangan/pengeluaran/belanja');?>"><i class="fa fa-circle-o"></i> Belanja</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['GAJI_TUNJANGAN']) && preg_match("/1\w{3}/", $modul['GAJI_TUNJANGAN'], $output_array))
                    ):
                  ?>

                  <li><a href="<?=site_url('keuangan/pengeluaran/gaji');?>"><i class="fa fa-circle-o"></i> Gaji dan Tunjangan</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['PIHAK_KETIGA']) && preg_match("/1\w{3}/", $modul['PIHAK_KETIGA'], $output_array))
                    ):
                  ?>

                  <li><a href="<?=site_url('keuangan/pengeluaran/pihak');?>"><i class="fa fa-circle-o"></i> Pengeluaran Proyek</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['LAIN_LAIN']) && preg_match("/1\w{3}/", $modul['LAIN_LAIN'], $output_array))
                    ):
                  ?>

                   <li><a href="<?= base_url('keuangan/pengeluaran/Lainnya') ?>"><i class="fa fa-circle-o "></i> <span>Lain-lain</span></a></li>
                   <?php
                    endif;
                   ?>
                 
                </ul>
              </li>

            <?php
              if( 
                (isset($modul['HUTANG']) && preg_match("/1\w{3}/", $modul['HUTANG'], $output_array))
              ):
            ?>
              <li><a href="<?= base_url('keuangan/pengeluaran/hutang') ?>"><i class="fa fa-circle-o"></i><span> Hutang</span></a></li>

            <?php
              endif;

              if( 
                (isset($modul['PIUTANG']) && preg_match("/1\w{3}/", $modul['PIUTANG'], $output_array))
              ):
            ?>

              <li><a href="<?= base_url('keuangan/penerimaan/Piutang') ?>"><i class="fa fa-circle-o"></i><span> Piutang</span></a></li>

              <?php
                endif;
                 if( 
                (isset($modul['PINJAMAN']) && preg_match("/1\w{3}/", $modul['PINJAMAN'], $output_array))
              ):
              ?>
               <li><a href="<?= base_url('keuangan/pengeluaran/Pinjaman') ?>"><i class="fa fa-circle-o"></i><span> Pinjaman</span></a></li>
              <?php 
                endif;
              ?>

              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Laporan
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a target="_blank" href="<?=site_url('keuangan/laporan/laporan/keuangan');?>"><i class="fa fa-circle-o"></i> Keuangan </a></li>
                </ul>
              </li>
              
              
            </ul>
          </li>
          
          <?php
            endif; // KEUANGAN
          ?>


          <?php
            if( 
              (isset($modul['TAHAPAN']) && preg_match("/1\w{3}/", $modul['TAHAPAN'], $output_array)) ||
              (isset($modul['PEMBERI_KERJA']) && preg_match("/1\w{3}/", $modul['PEMBERI_KERJA'], $output_array)) ||
              (isset($modul['REKANAN']) && preg_match("/1\w{3}/", $modul['REKANAN'], $output_array)) ||
              (isset($modul['KONTRAK_KERJA']) && preg_match("/1\w{3}/", $modul['KONTRAK_KERJA'], $output_array)) ||
              (isset($modul['RENCANA_REALISASI']) && preg_match("/1\w{3}/", $modul['RENCANA_REALISASI'], $output_array)) ||
              (isset($modul['SUB_KONTRAK']) && preg_match("/1\w{3}/", $modul['SUB_KONTRAK'], $output_array))
            ):
          ?>

          <li class="treeview <?= ($uri_segement=='manajemen_proyek')?'menu-open':''; ?>">
            <a href="#">
              <i class="fa fa-building"></i> <span>PROYEK</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: <?= ($uri_segement=='manajemen_proyek')?'block':'none'; ?>">
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-circle-o"></i> <span>Data Master</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <?php
                    if( 
                      (isset($modul['TAHAPAN']) && preg_match("/1\w{3}/", $modul['TAHAPAN'], $output_array))
                    ):
                  ?>

                  <li><a href="<?= base_url('manajemen_proyek/master/kategori') ?>"><i class="fa fa-circle-o"></i> Tahapan</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['PEMBERI_KERJA']) && preg_match("/1\w{3}/", $modul['PEMBERI_KERJA'], $output_array))
                    ):
                  ?>

                  <li><a href="<?= base_url('manajemen_proyek/master/pemberi_kerja') ?>"><i class="fa fa-circle-o"></i> Pemberi Kerja</a></li>

                  <?php
                    endif;

                    if( 
                      (isset($modul['REKANAN']) && preg_match("/1\w{3}/", $modul['REKANAN'], $output_array))
                    ):
                  ?>

                  <li><a href="<?= base_url('manajemen_proyek/master/rekanan') ?>"><i class="fa fa-circle-o"></i> Rekanan</a></li>

                  <?php
                    endif;
                  ?>
                </ul>
              </li>

            <?php
              if( 
                (isset($modul['KONTRAK_KERJA']) && preg_match("/1\w{3}/", $modul['KONTRAK_KERJA'], $output_array))
              ):
            ?>

              <li>
                <a href="<?= base_url('manajemen_proyek/kontrak_kerja') ?>">
                  <i class="fa fa-circle-o"></i> <span>Kontrak Kerja</span>
                </a>
              </li>

            <?php
              endif;

              if( 
                (isset($modul['RENCANA_REALISASI']) && preg_match("/1\w{3}/", $modul['RENCANA_REALISASI'], $output_array))
              ):
            ?>

              <li>
                <a href="<?= base_url('manajemen_proyek/rencana') ?>">
                  <i class="fa fa-circle-o"></i> <span>Rencana dan Realisasi</span>
                </a>
              </li>

            <?php
              endif;

              if( 
                (isset($modul['SUB_KONTRAK']) && preg_match("/1\w{3}/", $modul['SUB_KONTRAK'], $output_array))
              ):
            ?>

              <li>
                <a href="<?= base_url('manajemen_proyek/sub_kontrak') ?>">
                  <i class="fa fa-circle-o"></i> <span>Sub Kontrak</span>
                </a>
              </li>

            <?php
              endif;
            ?>
            </ul>

          </li>
          <?php
            endif; // PROYEK
          ?>

          <?php
            if( 
              (isset($modul['PROFIL_AKUN']) && preg_match("/1\w{3}/", $modul['PROFIL_AKUN'], $output_array))
            ):
          ?>
          <li>
            <a href="<?= base_url('akun') ?>">
              <i class="fa fa-key"></i> <span>Profil Akun</span>
            </a>
          </li>
          <?php endif; ?>

          <li>
            <a href="#" id="btn-logout">
              <i class="fa fa-sign-out"></i> <span>Keluar</span>
            </a>
          </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>




