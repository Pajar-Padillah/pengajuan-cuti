<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('success_input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Cuti Berhasil Ditambahkan, Silahkan Menunggu Kepala Kantor dan Staff Umum untuk menyetujui data cuti anda!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Cuti Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Diupdate!",
                icon: "success"
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

    <?php if ($this->session->flashdata('success_uploud')) { ?>
        <script>
            swal({
                title: "Berhasil Uploud!",
                text: "File Bukti Berhasil di Uploud! Silahkan menunggu staff umum dan kepala kantor untuk menyetujui pengajuan cuti anda!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?>

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
                                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_pegawai'); ?>">Home</a></li>
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
                                    <h3 class="card-title">Data Cuti</h3>
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
                                                <th>Status Cuti</th>
                                                <th>Alasan Verifikasi</th>
                                                <th>Keterangan</th>
                                                <th>Cetak Surat</th>
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
                                                $alasan_verifikasi = $i['alasan_verifikasi'];
                                                $status = $i['status_cuti'];
                                                $perihal_cuti = $i['perihal_cuti'];
                                                $keterangan = $i['keterangan_validasi'];

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= ucwords($nama_lengkap) ?></td>
                                                    <td><?= ucfirst($alasan) ?></td>
                                                    <td><?= $tgl_diajukan ?></td>
                                                    <td><?= $mulai ?></td>
                                                    <td><?= $berakhir ?></td>
                                                    <td><?= ucfirst($perihal_cuti) ?></td>
                                                    <td><?php if ($bukti == null) { ?>
                                                            <span class="badge badge-danger">
                                                                <a href="" style="font-size: 12px; color: white;" data-toggle="modal" data-target="#bukti<?= $id_cuti ?>">
                                                                    <i class="fas fa-upload"></i> Upload
                                                                </a>
                                                            </span>
                                                        <?php } elseif ($bukti == !null) { ?>
                                                            <span class="badge badge-info">
                                                                <a href="<?= base_url() ?>assets/bukti/<?= $bukti ?>" style="font-size: 12px; color: white;" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($status == "Menunggu") {
                                                            echo '<span class="bagde badge-pill badge-warning"  style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> Pending</span>';
                                                        } else if ($status == "Ditolak") {
                                                            echo '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> ' . $status . '</span>';
                                                        } else {
                                                            echo '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i> ' . $status . '</span>';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td><?php if ($alasan_verifikasi == NULL) { ?>
                                                            <span class="bagde badge-pill badge-danger" style="color: white; font-size: 12px; font-weight:bold;"><i class="fa fa-clock"></i> Belum Ada</span>
                                                        <?php } else { ?>
                                                            <?= ucfirst($alasan_verifikasi) ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $keterangan ?>
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

                                                    <td>
                                                        <?php if ($status == 'Menunggu') { ?>
                                                            <a href="" data-toggle="modal" data-target="#edit_data_cuti<?= $id_cuti ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="" data-toggle="modal" data-target="#hapus<?= $id_cuti ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <!-- Modal Hapus Data Cuti -->
                                                <div class="modal fade" id="hapus<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Cuti
                                                                </h5>
                                                                <button type="button" class="closme" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>cutii/hapus_cuti" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />

                                                                            <p>Apakah kamu yakin ingin menghapus data
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

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="edit_data_cuti<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Form_Cuti/update_cuti" method="POST">

                                                                    <input type="text" value="<?= $id_user ?>" name="id_user" hidden>
                                                                    <input type="text" value="<?= $id_cuti ?>" name="id_cuti" hidden>
                                                                    <div class="form-group">
                                                                        <label for="alasan">Alasan</label>
                                                                        <textarea class="form-control" id="alasan" rows="3" name="alasan" required><?php echo $alasan ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="perihal_cuti">Perihal Cuti</label>
                                                                        <select name="perihal_cuti" class="form-control" required>
                                                                            <option <?php if ($perihal_cuti == "") {
                                                                                        echo 'selected';
                                                                                    } ?>>--Pilih--</option>
                                                                            <option <?php if ($perihal_cuti == "cuti tahunan") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti tahunan">Cuti Tahunan</option>
                                                                            <option <?php if ($perihal_cuti == "cuti besar") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti besar">Cuti Besar</option>
                                                                            <option <?php if ($perihal_cuti == "cuti sakit") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti sakit">Cuti Sakit</option>
                                                                            <option <?php if ($perihal_cuti == "cuti melahirkan") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti melahirkan">Cuti Melahirkan</option>
                                                                            <option <?php if ($perihal_cuti == "cuti karena alasan penting") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti karena alasan penting">Cuti Karena Alasan Penting</option>
                                                                            <option <?php if ($perihal_cuti == "cuti di luar tanggungan negara") {
                                                                                        echo 'selected';
                                                                                    } ?> value="cuti di luar tanggungan negara">Cuti Di Luar tanggungan Negara</option>
                                                                            <!-- <option value="0">---pilih cuti---</option>
                                                                <option value="cuti tahunan">Cuti Tahunan</option>
                                                                <option value="cuti besar">Cuti Besar</option>
                                                                <option value="cuti sakit">Cuti Sakit</option>
                                                                <option value="cuti melahirkan">Cuti Melahirkan</option>
                                                                <option value="cuti karena alasan penting">Cuti Karena Alasan Penting</option>
                                                                <option value="cuti di luar tanggungan negara">Cuti Di Luar Tanggungan Negara</option> -->

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="mulai">Mulai Cuti</label>
                                                                        <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required value="<?php echo $mulai ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="berakhir">Berakhir Cuti</label>
                                                                        <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" value="<?php echo $berakhir ?>" required>

                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Uploud Bukti -->

                                                <div class="modal fade" id="bukti<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Uploud Bukti
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="<?= base_url() ?>cutii/uploud_bukti" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?= $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?= $id_user ?>" />
                                                                            <p>Uploud bukti untuk mengajukan cuti anda disini!</i></b></p>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">File Bukti</label>
                                                                                <input type="file" class="form-control" id="bukti" name="bukti" required>
                                                                                <small style="color: red;"><i>File yang diperbolehkan jpg/jpeg/png/pdf <br> Max file 5Mb</i></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Simpan</button>
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
            <!-- Modal -->

        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>