<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
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
                            <h1 class="m-0">Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard_admin'); ?>">Home</a></li>
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
                                                <th>Tanggal mulai & berakhir</th>
                                                <th>Perihal Cuti</th>
                                                <th>Bukti</th>
                                                <th>Status Cuti</th>
                                                <th>Cetak Surat</th>
                                                <th>Status Validasi</th>
                                                <th>Aksi</th>
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
                                                $status = $i['status_cuti'];
                                                $perihal_cuti = $i['perihal_cuti'];
                                                $status_validasi = $i['status_validasi'];

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= ucwords($nama_lengkap) ?></td>
                                                    <td><?= ucfirst($alasan) ?></td>
                                                    <td><?= $tgl_diajukan ?></td>
                                                    <td><?= $mulai ?> s/d <?= $berakhir ?> </td>
                                                    <td><?= ucfirst($perihal_cuti) ?></td>
                                                    <td><?php if ($bukti == !null) { ?>
                                                            <span class="badge badge-info">
                                                                <a href="<?php echo base_url('assets/bukti/'); ?><?= $bukti ?>" style="font-size: 12px; color: white;" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>
                                                            </span>
                                                        <?php } elseif ($bukti == null) { ?>
                                                            <span class="badge badge-warning" style="color: white; font-size: 12px;"><i class="fas fa-clock"></i> Pending</span>
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if ($status == "Menunggu") {
                                                            echo '<span class="bagde badge-pill badge-warning" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> Pending</span>';
                                                        } else if ($status == "Ditolak") {
                                                            echo '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> ' . $status . '</span>';
                                                        } else {
                                                            echo '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i> ' . $status . '</span>';
                                                        }
                                                        ?>

                                                    </td>

                                                    <td><?php if ($status == 'Diterima') { ?>
                                                            <span class="badge badge-info">
                                                                <a href="<?= base_url(); ?>Cetak/surat_cuti_pdf/<?= $id_cuti ?>" style="font-size: 12px; color: white;" target="_blank">
                                                                    <i class="fas fa-print"></i> Cetak Surat
                                                                </a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span class="bagde badge-pill badge-danger" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-times"></i> Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php if ($status_validasi == 0) { ?>
                                                            <span class="bagde badge-pill badge-info" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> Proses</span>
                                                        <?php } elseif ($status_validasi == 1) { ?>
                                                            <span class="bagde badge-pill badge-success" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-check"></i> Valid</span>
                                                        <?php } elseif ($status_validasi == 2) { ?>
                                                            <span class="bagde badge-pill badge-danger" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-times"></i> Tidak Valid</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($status_validasi == 0) { ?>
                                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#setuju<?= $id_cuti ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="" data-toggle="modal" data-target="#tolak<?= $id_cuti ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else if ($status_validasi == 2) { ?>
                                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#setuju<?= $id_cuti ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>


                                                </tr>

                                                <!-- Modal Setuju -->
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
                                                                <form action="<?php echo base_url() ?>cutii/acc_cuti_admin/1" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin Menyetujui Izin Cuti
                                                                                ini?</i></b></p>
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

                                                <!-- Modal Tolak -->
                                                <div class="modal fade" id="tolak<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="<?php echo base_url() ?>cutii/acc_cuti_admin/2" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />

                                                                            <p>Apakah kamu yakin ingin Menolak Izin Cuti
                                                                                ini?</i></b></p>
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

    <?php $this->load->view("admin/components/js.php") ?>
</body>

</html>