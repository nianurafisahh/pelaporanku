    <!-- Page Wrapper -->
    <div id="wrapper">

          <!-- Sidebar -->
          <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
              <div class="sidebar-brand-icon">
                <i class="fas fa fw fa-city"></i>
              </div>
              <div class="sidebar-brand-text">Pengaduan Masyarakat</div>
            </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
          <?php if ($this->session->userdata('level')) : ?>
            Admin
          <?php elseif ($this->session->userdata('nik')) : ?>
            User
          <?php endif; ?>
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <?php if ($this->session->userdata('nik')) : ?>
          <a class="nav-link" href="<?= base_url('user'); ?>">
          <?php elseif ($this->session->userdata('level')) : ?>
            <a class="nav-link" href="<?= base_url('admin'); ?>">
            <?php endif; ?>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
      </li>

      <!-- Nav Item edit profil -->
      <li class="nav-item">
        <?php if ($this->session->userdata('level')) : ?>
          <a class="nav-link" href="<?= base_url('admin/edit'); ?>">
          <?php elseif ($this->session->userdata('nik')) : ?>
            <a class="nav-link" href="<?= base_url('user/edit'); ?>">
            <?php endif; ?>
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
          <div class="sidebar-heading">
                            Data
                        </div>
      <?php if ($this->session->userdata('level')) : ?>

        <!-- Nav Item - Data -->
        <?php if ($this->session->userdata('level') == 1) : ?>

          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('master/admin'); ?>">
            <i class="fas fw fa-user-tie"></i>
            <span>Data Admin</span></a>
        
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('master/petugas'); ?>">
            <i class="fas fa-user-friends"></i>
            <span>Data Petugas</span></a>

        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('master/masyarakat'); ?>">
            <i class="fas fa-users"></i>
            <span>Data Masyarakat</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pengaduan '); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Pengaduan</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
                        laporan
                    </div>
        <!-- Nav Item - Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('generate '); ?>">
              <i class="fas fa-fw fa-download"></i>
              <span>Buat Laporan</span></a>
          </li>
        <?php endif; ?>

      <?php elseif ($this->session->userdata('nik')) : ?>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('laporan'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan Pengaduan</span></a>
        </li>
      <?php endif; ?>

      <?php if ($this->session->userdata('level') == 2) : ?>
        
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengaduan'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Pengaduan</span></a>
      <?php endif; ?>

      <hr class="sidebar-divider">
        <div class="sidebar-heading">
                        Keluar
                    </div>
      <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link logout" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->