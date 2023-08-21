<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
    <style>
        .form-error span i {
            color: seagreen;
        }
    </style>
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
    <?php if ($this->session->flashdata('data-error')) { ?>
        <script>
            swal({
                title: "Gagal Tambah User!",
                text: "NIP/Email sudah ada!",
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
                            <h1 class="m-0">Kepala Kantor</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kepala Kantor</li>
                            </ol>
                        </div><!-- /.col -->
                        <?php if (empty($kepalakantor)) { ?>
                            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                                Tambah Kepala Kantor
                            </button>
                        <?php } ?>

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
                                    <h3 class="card-title">Data Kepala Kantor</h3>
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
                                            foreach ($kepalakantor as $i) :
                                                $no++;
                                                $id_user = $i['id_user'];
                                                $nip     = $i['nip'];
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
                                                    <?php if ($jenis_kelamin == 'L') { ?>
                                                        <td>Laki-laki</td>
                                                    <?php } elseif ($jenis_kelamin == 'P') { ?>
                                                        <td>Perempuan</td>
                                                    <?php } ?>

                                                    <td><?= $no_telp ?></td>
                                                    <td><?= $pangkat ?></td>
                                                    <td><?= $jabatan ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_data_kepalakantor<?= $id_user ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal" data-target="#hapus<?= $id_user ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Modal Tambah Kepalakantor -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kepala Kantor</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body form-error">
                                                                <form action="<?= base_url(); ?>Kepalakantor/super_admin_tambah_kepalakantor" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="NIP">NIP</label>
                                                                        <input type="text" id="nip" onkeyup="validateNIP()" autocomplete="off" class="form-control" minlength="18" maxlength="18" name="nip" placeholder="" onkeypress="return angka(event);" required>
                                                                        <span style="color: red;" id="nip-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" id="username" onkeyup="validateusername()" class="form-control" id="username" aria-describedby="username" name="username" required>
                                                                        <span style="color: red;" id="username-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" id="pass" onkeyup="validatepass()" class="form-control" id="password" aria-describedby="password" name="password" required>
                                                                        <span style="color: red;" id="pass-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" id="email" onkeyup="validateemail()" class="form-control" id="email" aria-describedby="email" name="email" required>
                                                                        <span style="color: red;" id="email-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                        <input type="text" id="nama" onkeyup="validatenama()" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" required>
                                                                        <span style="color: red;" id="nama-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                                        <select id="jenkel" onkeyup="validatejenkel()" class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                                                            <option value="L">Laki-laki</option>
                                                                            <option value="P">Perempuan</option>
                                                                        </select>
                                                                        <span style="color: red;" id="jenkel-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">No Telp</label>
                                                                        <input type="text" id="telp" onkeyup="validatetelp()" minlength="11" maxlength="13" class="form-control" id="no_telp" aria-describedby="no_telp" name="no_telp" required onkeypress="return angka(event);">
                                                                        <span style="color: red;" id="telp-error"></span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="no_telp">Pangkat</label>
                                                                        <select name="pangkat" id="pangkat" onkeyup="validatepangkat()" class="form-control" required>
                                                                            <option disabled selected value>--Pilih--</option>
                                                                            <option>IV a</option>
                                                                            <option>IV b</option>
                                                                            <option>IV c</option>
                                                                            <option>IV d</option>
                                                                        </select>
                                                                        <span style="color: red;" id="pangkat-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">Jabatan</label>
                                                                        <input type="text" id="jabatan" required onkeyup="validatejabatan()" class="form-control" id="jabatan" value="Kepala Kantor" aria-describedby="jabatan" name="jabatan" readonly>
                                                                        <span style="color: red;" id="jabatan-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea id="alamat" onkeyup="validatealamat()" class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                                                        <span style="color: red;" id="alamat-error"></span>
                                                                    </div>
                                                                    <button type="submit" onclick="return validateSubmit()" class="btn btn-primary">Submit</button>
                                                                    <span id="submit-error"></span>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus Data Kepala Kantor -->
                                                <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Kepala Kantor
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Kepalakantor/super_admin_hapus_kepalakantor" method="post" enctype="multipart/form-data">
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

                                                <!-- Modal Edit Kepala Kantor -->
                                                <div class="modal fade" id="edit_data_kepalakantor<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Kepala Kantor</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Kepalakantor/super_admin_edit_kepalakantor" method="POST">
                                                                    <input type="text" value="<?= $id_user ?>" name="id_user" hidden>
                                                                    <div class="form-group">
                                                                        <label for="nip">NIP</label>
                                                                        <input type="text" class="form-control" id="nip" aria-describedby="nip" name="nip" value="<?= $nip ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?>" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
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
                                                                        <input type="text" class="form-control" minlength="11" maxlength="13" id="no_telp" aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" required onkeypress="return angka(event)" ;>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">Pangkat</label>
                                                                        <select name="pangkat" class="form-control" required>
                                                                            <option <?php if ($pangkat == "") {
                                                                                        echo 'selected';
                                                                                    } ?>>--Pilih--</option>
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
                                                                        <label for="no_telp">Jabatan</label>
                                                                        <input readonly type="text" class="form-control" id="jabatan" aria-describedby="jabatan" name="jabatan" value="<?= $jabatan ?>" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $alamat ?></textarea>
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
    // $(document).ready(function() {
    //     document.getElementById('jabatan').value = "Kepala Kantor";
    // });

    function angka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    var nipError = document.getElementById('nip-error');
    var usernameError = document.getElementById('username-error');
    var namaError = document.getElementById('nama-error');
    var emailError = document.getElementById('email-error');
    var passError = document.getElementById('pass-error');
    var jenkelError = document.getElementById('jenkel-error');
    var telpError = document.getElementById('telp-error');
    var pangkatError = document.getElementById('pangkat-error');
    var jabatanError = document.getElementById('jabatan-error');
    var alamatError = document.getElementById('alamat-error');
    var submitError = document.getElementById('submit-error');

    function validateNIP() {
        var nip = document.getElementById('nip').value;

        if (nip.length == 0) {
            nipError.innerHTML = 'NIP harus di isi'
            return false;
        }
        if (nip.length !== 18) {
            nipError.innerHTML = 'NIP harus 18 digit'
            return false;
        }
        nipError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }


    function validateusername() {
        var username = document.getElementById('username').value;

        if (username.length == 0) {
            usernameError.innerHTML = 'Username harus di isi'
            return false;
        }
        if (username.length < 6) {
            usernameError.innerHTML = 'Username minimal 6 karakter'
            return false;
        }
        // if (!username.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
        //   usernameError.innerHTML = 'Tulis Username'
        //   return false;
        // }
        usernameError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatenama() {
        var nama = document.getElementById('nama').value;

        if (nama.length == 0) {
            namaError.innerHTML = 'Nama harus di isi'
            return false;
        }
        // if (!nama.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
        //     namaError.innerHTML = 'Tulis Nama Lengkap Anda'
        //     return false;
        // }
        // if (nama.length !== 18) {
        //     namaError.innerHTML = 'nama harus 18 digit'
        //     return false;
        // }
        namaError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validateemail() {
        var email = document.getElementById('email').value;
        var email2 = email.slice(-9);

        if (email.length == 0) {
            emailError.innerHTML = 'Email harus di isi'
            return false;
        }

        if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
            emailError.innerHTML = 'Email Tidak Valid'
            return false;
        }

        if (email2 == 'gmail.com') {
            emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
            return true;
        } else if (email2 == 'yahoo.com') {
            emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
            return true;
        } else {
            emailError.innerHTML = 'Email Tidak Valid'
            return false;
        }
        emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatepass() {
        var pass = document.getElementById('pass').value;

        if (pass.length == 0) {
            passError.innerHTML = 'Password harus di isi'
            return false;
        }
        if (pass.length < 8) {
            passError.innerHTML = 'Password minimal 8 karakter'
            return false;
        }
        passError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatejenkel() {
        var jenkel = document.getElementById('jenkel').value;

        if (jenkel.length == 0) {
            jenkelError.innerHTML = 'Jenis Kelamin harus di isi'
            return false;
        }
        pass2Error.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatetelp() {
        var telp = document.getElementById('telp').value;

        if (telp.length == 0) {
            telpError.innerHTML = 'No Telepon harus di isi'
            return false;
        }
        if (telp.length < 11) {
            telpError.innerHTML = 'No Telepon minimal 11 digit'
            return false;
        }
        telpError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatepangkat() {
        var pangkat = document.getElementById('pangkat').value;

        if (pangkat.length == 0) {
            pangkatError.innerHTML = 'Pangkat harus di isi'
            return false;
        }
        pangkatError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatejabatan() {
        var jabatan = document.getElementById('jabatan').value;

        if (jabatan.length == 0) {
            jabatanError.innerHTML = 'Jabatan harus di isi'
            return false;
        }
        jabatanError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validatealamat() {
        var alamat = document.getElementById('alamat').value;

        if (alamat.length == 0) {
            alamatError.innerHTML = 'Alamat harus di isi'
            return false;
        }
        if (alamat.length < 10) {
            alamatError.innerHTML = 'Alamat minimal 10 karakter'
            return false;
        }
        alamatError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validateSubmit() {
        if (!validatenama() || !validateusername() || !validateemail() || !validatepass() || !validatejabatan() || !validatepangkat() || !validatealamat() || !validatetelp() || !validatejenkel()) {
            submitError.style.display = 'block';
            submitError.innerHTML = 'Please fix error to submit';
            setTimeout(function() {
                submitError.style.display = 'none'
            }, 3000);
            return false;
        }
        return true;
    }
</script>