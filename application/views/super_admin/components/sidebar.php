<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url(); ?>assets/login/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CUTI KEMENAG OKU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>assets/admin_lte/dist/img/account.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('username'); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Dashboard/dashboard_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#master" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Manajemen User</p>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav nav-collapse">

                            <li>
                                <a href="<?= base_url(); ?>Admin/view_super_admin" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p class="text">Staff Umum</p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>Pegawai/view_super_admin" class="nav-link">
                                    <i class="nav-icon far fa-circle "></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>Kepalakantor/view_super_admin" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p class="text">Kepala Kantor</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>cutii/view_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Data Cuti</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Settings/view_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>