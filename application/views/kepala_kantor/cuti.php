<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("kepala_kantor/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('edit')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Diedit!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Diedit !",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Dihapus!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Dihapus !",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Status Cuti Berhasil Diubah!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Status Cuti Gagal Diubah!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("kepala_kantor/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("kepala_kantor/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_kepala_kantor'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Cuti</li>
                            </ol>
                        </div><!-- /.col -->
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
                                    <h3 class="card-title">Data Cuti Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
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
                                                <th>Bukti</th>
                                                <th>Alasan Verifikasi</th>
                                                <th>Status Cuti</th>
                                                <th>Validasi</th>
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
                                                $bukti = $i['bukti'];
                                                $tgl_diajukan = $i['tgl_diajukan'];
                                                $mulai = $i['mulai'];
                                                $berakhir = $i['berakhir'];
                                                $alasan_verifikasi = $i['alasan_verifikasi'];
                                                $status  = $i['status_cuti'];
                                                $perihal_cuti = $i['perihal_cuti'];

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= ucwords($nama_lengkap) ?></td>
                                                    <td><?= ucfirst($alasan) ?></td>
                                                    <td><?= $tgl_diajukan ?></td>
                                                    <td><?= $mulai ?></td>
                                                    <td><?= $berakhir ?></td>
                                                    <td><?= $perihal_cuti ?></td>
                                                    <td><?php if ($bukti == null) { ?>
                                                            <span class="badge badge-warning" style="color: white; font-size: 12px;"><i class="fas fa-clock"></i> Pending</span>
                                                        <?php } elseif ($bukti == !null) { ?>
                                                            <span class="badge badge-info">
                                                                <a href="<?= base_url() ?>assets/bukti/<?= $bukti ?>" style="font-size: 12px; color: white;" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php if ($alasan_verifikasi == NULL) { ?>
                                                            <span class="bagde badge-pill badge-danger " style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> Belum Ada</span>
                                                        <?php } else { ?>
                                                            <?= ucfirst($alasan_verifikasi) ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($status == "Menunggu") {
                                                            echo '<span class="bagde badge-pill badge-warning " style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> ' . $status . '</span>';
                                                        } else if ($status == "Ditolak") {
                                                            echo '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> ' . $status . '</span>';
                                                        } else {
                                                            echo '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i> ' . $status . '</span>';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($status == 'Menunggu') {
                                                        ?>
                                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#setuju<?= $id_cuti ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="" data-toggle="modal" data-target="#tidak_setuju<?= $id_cuti ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>

                                                <!-- Modal Setuju Cuti -->
                                                <div class="modal fade" id="setuju<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Setujui Data
                                                                    Cuti
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>cutii/acc_cuti_kepalakantor/2" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin Menyetujui Izin Cuti
                                                                                ini?</i></b></p>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Alasan</label>
                                                                                <textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Tidak Setuju Cuti -->
                                                <div class="modal fade" id="tidak_setuju<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tolak Data
                                                                    Cuti
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>cutii/acc_cuti_kepalakantor/3" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />

                                                                            <p>Apakah kamu yakin ingin Menolak Izin Cuti
                                                                                ini?</i></b></p>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Alasan</label>
                                                                                <textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

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

    <?php $this->load->view("kepala_kantor/components/js.php") ?>
</body>

</html>