<?php
  $user = $this->session->userdata('admin');
  $modul= $this->session->userdata('modul');
  $menu = $this->session->userdata('menu');
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
          <!-- <br><small style="font-weight: bold;"><?php // "Tahun Data : ".get_sesi("TAHUN") ?></small> -->
        </li>


        <li class="<?= ($uri_segement=='dashboard')?'menu-open':''; ?>">
          <a href="<?= base_url("dashboard") ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?= menu_create($menu, $modul, 'sidebar-menu', $uri_segement) ?>

        <li>
           <a href="<?= base_url("Surat") ?>">
             <i class="fa fa-book"></i> <span>Surat</span>
           </a>
        </li>

         <li>
            <a href="<?= base_url("rekap") ?>">
              <i class="fa fa-clipboard"></i> <span>Rekap</span>
            </a>
        </li>

<hr>
          <li>
            <a href="#" id="btn-logout">
              <i class="fa fa-sign-out"></i> <span>Keluar</span>
            </a>
          </li>



        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
