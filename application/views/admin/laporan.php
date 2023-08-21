<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php $this->load->view("admin/components/navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view("admin/components/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Laporan</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_admin'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
              </ol>
            </div><!-- /.col -->

            <br>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Laporan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div>
                        <h5 class="mb-2"><b>Pilih Periode Tanggal Cuti</b></h5>
                        <form method="post" action="<?php echo base_url('laporan/cuti') ?>">
                          <div class="row mb-3">
                            <div class="col-sm-6">
                              <p class="mx-3">Dari tanggal</p>
                              <?php if (isset($_POST['cari_tanggal'])) : ?>
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tgl_awal; ?>">
                              <?php else : ?>
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= date('Y-m-01'); ?>">
                              <?php endif ?>
                            </div>
                            <div class="col-sm-6">
                              <p class="mx-3">Sampai tanggal</p>
                              <?php if (isset($_POST['cari_tanggal'])) : ?>
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tgl_akhir; ?>">
                              <?php else : ?>
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= date('Y-m-d'); ?>">
                              <?php endif ?>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2 mb-2">
                              <button style="color: white;" type="submit" name="cari_tanggal" value="true" class="btn btn-primary mb-2"><i class="fa fa-filter"></i> Filter</button>
                            </div>
                            <div class="col-md-2">
                              <a href="<?= base_url('laporan/view_admin'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Reset</a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div id="tabel_cuti">
                    <?php if (isset($_POST['cari_tanggal'])) : ?>
                      <hr>
                      <?php
                      $tanggal_awal_heading = date('d-m-Y', strtotime($tgl_awal));
                      $tanggal_akhir_heading = date('d-m-Y', strtotime($tgl_akhir));
                      ?>
                      <div class="text-center">
                        <h4> Daftar Cuti Tanggal <?= $tanggal_awal_heading; ?> s/d <?= $tanggal_akhir_heading; ?></h4>
                      </div>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>

                            <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Alasan</th>
                              <th>Tanggal Diajukan</th>
                              <th>Mulai</th>
                              <th>Berakhir</th>
                              <th>Perihal Cuti</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

                            $no = 0;
                            foreach ($cuti as $i) :
                              $no++;
                              $id_cuti = $i['id_cuti'];
                              $id_user = $i['id_user'];
                              $nama_lengkap = $i['nama_lengkap'];
                              $alasan = $i['alasan'];
                              $tgl_diajukan = $i['tgl_diajukan'];
                              $mulai = $i['mulai'];
                              $berakhir = $i['berakhir'];
                              $perihal_cuti = $i['perihal_cuti'];

                            ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= ucwords($nama_lengkap) ?></td>
                                <td><?= ucwords($alasan) ?></td>
                                <td><?= $tgl_diajukan ?></td>
                                <td><?= $mulai ?></td>
                                <td><?= $berakhir ?></td>
                                <td><?= ucfirst($perihal_cuti) ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="my-3">
                        <?php if (!empty($cuti)) { ?>
                          <a target="_blank" href="<?= base_url('cutii/cutiPDF/' . $tgl_awal . '/' . $tgl_akhir); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                        <?php } ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php $this->load->view("admin/components/js.php") ?>
</body>

</html>