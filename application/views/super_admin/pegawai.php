<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>

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
                text: "Data Gagal Diedit!",
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

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("super_admin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("super_admin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pegawai</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pegawai</li>
                            </ol>
                        </div><!-- /.col -->
                        <!-- <button type="button" class="btn btn-primary mt-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Tambah Pegawai
                        </button> -->
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
                                    <h3 class="card-title">Data Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Username</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Telp</th>
                                                <th>Pangkat</th>
                                                <th>Jabatan</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($pegawai as $i) :
                                                $no++;
                                                $id_user = $i['id_user'];
                                                $nip = $i['nip'];
                                                $username = $i['username'];
                                                $password = $i['password'];
                                                $nama_lengkap = $i['nama_lengkap'];
                                                $jenis_kelamin = $i['jenis_kelamin'];
                                                $no_telp = $i['no_telp'];
                                                $email = $i['email'];
                                                $pangkat = $i['pangkat'];
                                                $jabatan = $i['jabatan'];
                                                $alamat = $i['alamat'];

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $nip ?></td>
                                                    <td><?= $username ?></td>
                                                    <td><?= $nama_lengkap ?></td>
                                                    <td><?= $jenis_kelamin ?></td>
                                                    <td><?= $no_telp ?></td>
                                                    <td><?= $pangkat ?></td>
                                                    <td><?= $jabatan ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit_data_pegawai<?= $id_user ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" data-toggle="modal" data-target="#hapus<?= $id_user ?>" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Hapus Data Pegawai -->
                                                <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Pegawai
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Pegawai/super_admin_hapus_pegawai" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
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

                                                <!-- Modal Edit Pegawai -->
                                                <div class="modal fade" id="edit_data_pegawai<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Pegawai</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Pegawai/super_admin_edit_pegawai" method="POST">
                                                                    <input type="text" value="<?= $id_user ?>" name="id_user" hidden>
                                                                    <div class="form-group">
                                                                        <label for="username">NIP</label>
                                                                        <input type="text" class="form-control" minlength="18" maxlength="18" id="nip" aria-describedby="nip" name="nip" value="<?= $nip ?>" required onkeypress="return angka(event);">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" class="form-control" id="password" aria-describedby="password" name="password" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">email</label>
                                                                        <input type="text" class="form-control" id="email" aria-describedby="email" name="email" value="<?= $email ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                        <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                                        <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                                                            <option value="L" <?php if ($jenis_kelamin == 'L') {
                                                                                                    echo 'selected';
                                                                                                } ?>>Laki-laki</option>
                                                                            <option value="P" <?php if ($jenis_kelamin == 'P') {
                                                                                                    echo 'selected';
                                                                                                } ?>>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">No Telp</label>
                                                                        <input type="text" minlength="11" maxlength="13" class="form-control" id="no_telp" aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $alamat ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pangkat">Pangkat</label>
                                                                        <select name="pangkat" class="form-control">
                                                                            <option <?php if ($pangkat == "") {
                                                                                        echo 'selected';
                                                                                    } ?>>--Pilih--</option>
                                                                            <option <?php if ($pangkat == "III a") {
                                                                                        echo 'selected';
                                                                                    } ?>>III a</option>
                                                                            <option <?php if ($pangkat == "III b") {
                                                                                        echo 'selected';
                                                                                    } ?>>III b</option>
                                                                            <option <?php if ($pangkat == "III c") {
                                                                                        echo 'selected';
                                                                                    } ?>>III c</option>
                                                                            <option <?php if ($pangkat == "III d") {
                                                                                        echo 'selected';
                                                                                    } ?>>III d</option>
                                                                            <option <?php if ($pangkat == "IV a") {
                                                                                        echo 'selected';
                                                                                    } ?>>IV a</option>
                                                                            <option <?php if ($pangkat == "IV b") {
                                                                                        echo 'selected';
                                                                                    } ?>>IV b</option>
                                                                            <option <?php if ($pangkat == "IV c") {
                                                                                        echo 'selected';
                                                                                    } ?>>IV c</option>
                                                                            <option <?php if ($pangkat == "IV d") {
                                                                                        echo 'selected';
                                                                                    } ?>>IV d</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="jabatan">Jabatan</label>
                                                                        <select name="jabatan" class="form-control" required>
                                                                            <option <?php if ($jabatan == "") {
                                                                                        echo 'selected';
                                                                                    } ?> disabled selected value>--Pilih--</option>
                                                                            <option <?php if ($jabatan == "Kepala pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Kepala pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Kepala pada Seksi Pendidikan Madrasah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Kepala pada Seksi Pendidikan Madrasah</option>
                                                                            <option <?php if ($jabatan == "Kepala pada Seksi Pendidikan Agama dan Pendidikan Keagamaan Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Kepala pada Seksi Pendidikan Agama dan Pendidikan Keagamaan Islam</option>
                                                                            <option <?php if ($jabatan == "Kepala pada Seksi Penyelenggaraan Haji dan Umrah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Kepala pada Seksi Penyelenggaraan Haji dan Umrah</option>
                                                                            <option <?php if ($jabatan == "Kepala Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Kepala Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Bendahara Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Bendahara Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Arsiparis Pertama Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Arsiparis Pertama Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Analis Data Dan Informasi Pendidik Dan Tenaga Kependidikan pada Seksi Pendidikan Madrasah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Analis Data Dan Informasi Pendidik Dan Tenaga Kependidikan pada Seksi Pendidikan Madrasah</option>
                                                                            <option <?php if ($jabatan == "Pengelola Administrasi Pemerintahan pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Administrasi Pemerintahan pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pengelola Surat pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Surat pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pengelola Pendidikan Seksi Pendidikan Madrasah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Pendidikan Seksi Pendidikan Madrasah</option>
                                                                            <option <?php if ($jabatan == "Pengelola Data Bimbingan Pendaftaran pada Seksi Penyelenggaraan Haji dan Umrah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Data Bimbingan Pendaftaran pada Seksi Penyelenggaraan Haji dan Umrah</option>
                                                                            <option <?php if ($jabatan == "Pengelola Pendaftaran/ Pembatalan Haji pada Seksi Penyelenggaraan Haji dan Umrah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Pendaftaran/ Pembatalan Haji pada Seksi Penyelenggaraan Haji dan Umrah</option>
                                                                            <option <?php if ($jabatan == "Pengelola Urusan Agama pada Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengelola Urusan Agama pada Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Penyusun laporan Keuangan Seksi Pendidikan Agama dan Pendidikan Keagamaan Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun laporan Keuangan Seksi Pendidikan Agama dan Pendidikan Keagamaan Islam</option>
                                                                            <option <?php if ($jabatan == "Penyusun laporan Keuangan pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun laporan Keuangan pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Penyusun Bahan Pembinaan Ketenagaan Lembaga Keagamaan ") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun Bahan Pembinaan Ketenagaan Lembaga Keagamaan </option>
                                                                            <option <?php if ($jabatan == "Penyusun Perlengkapan Haji Seksi Penyelenggaraan Haji dan Umrah") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun Perlengkapan Haji Seksi Penyelenggaraan Haji dan Umrah</option>
                                                                            <option <?php if ($jabatan == "Penyusun Laporan Pengendalian Bank Penerima Setoran Biaya Penyelenggara Ibadah Haji") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun Laporan Pengendalian Bank Penerima Setoran Biaya Penyelenggara Ibadah
                                                                                Haji </option>
                                                                            <option <?php if ($jabatan == "Penyusun Bahan Pembinaan Keluarga Sakinah pada Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyusun Bahan Pembinaan Keluarga Sakinah pada Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi Keuangan pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi Keuangan pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi Umum pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi Umum pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi Persuratan pada Seksi Pendidikan Agama dan Pendidikan Keagamaan") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi Persuratan pada Seksi Pendidikan Agama dan Pendidikan Keagamaan</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi Umum pada Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi Umum pada Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi pada Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi pada Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Pengadministrasi Umum pada Penyelenggara Zakat dan Wakaf") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengadministrasi Umum pada Penyelenggara Zakat dan Wakaf</option>
                                                                            <option <?php if ($jabatan == "Pranata Komputer Ahli Pertama pada Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pranata Komputer Ahli Pertama pada Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pranata Komputer Pertama Sub Bagian Tata Usaha") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pranata Komputer Pertama Sub Bagian Tata Usaha</option>
                                                                            <option <?php if ($jabatan == "Pranata Komputer Muda pada Seksi Pendidikan Agama dan Keagamaan Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pranata Komputer Muda pada Seksi Pendidikan Agama dan Keagamaan Islam</option>
                                                                            <option <?php if ($jabatan == "Pengawas Sekolah Madya TK/RA/SD/MI Pengawas Pendidikan Agama Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengawas Sekolah Madya TK/RA/SD/MI Pengawas Pendidikan Agama Islam</option>
                                                                            <option <?php if ($jabatan == "Pengawas Sekolah Madya Tingkat MTs Pengawas Pendidikan Agama Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengawas Sekolah Madya Tingkat MTs Pengawas Pendidikan Agama Islam</option>
                                                                            <option <?php if ($jabatan == "Pengawas Sekolah Madya SLTP/SLTA/MTs/MA Pengawas Pendidikan Agama") {
                                                                                        echo 'selected';
                                                                                    } ?>>Pengawas Sekolah Madya SLTP/SLTA/MTs/MA Pengawas Pendidikan Agama</option>
                                                                            <option <?php if ($jabatan == "Penyuluh Agama Ahli Pertama pada Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyuluh Agama Ahli Pertama pada Seksi Bimbingan Masyarakat Islam</option>
                                                                            <option <?php if ($jabatan == "Penyuluh Agama Madya Seksi Bimbingan Masyarakat Islam") {
                                                                                        echo 'selected';
                                                                                    } ?>>Penyuluh Agama Madya Seksi Bimbingan Masyarakat Islam</option>
                                                                        </select>

                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- Modal Tambah Pegawai -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Pegawai/super_admin_tambah_pegawai" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" aria-describedby="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                        <?php foreach ($jenis_kelamin_p as $u) :
                                            $id = $u["id_jenis_kelamin"];
                                            $jenis_kelamin = $u["jenis_kelamin"];
                                        ?>
                                            <option value="<?= $id ?>"><?= $jenis_kelamin ?></option>

                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" aria-describedby="no_telp" name="no_telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("super_admin/components/js.php") ?>
</body>

</html>
<script type="text/javascript">
    function angka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>