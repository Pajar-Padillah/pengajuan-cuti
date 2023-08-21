<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
<style>
    /* .form-error span {
        position: absolute;
        bottom: 12px;
        right: 17px;
        font-size: 14px;
        color: red;
    } */

    .form-error span i {
        color: seagreen;
    }
</style>

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
    <?php if ($this->session->flashdata('data-error')) { ?>
        <script>
            swal({
                title: "Gagal Tambah User!",
                text: "Email sudah ada!",
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
                            <h1 class="m-0">Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div><!-- /.col -->
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Staff Umum
                        </button>
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
                                    <h3 class="card-title">Data Admin</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>User Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($admin_data as $i) :
                                                $no++;
                                                $id_user = $i['id_user'];
                                                $username = $i['username'];
                                                $email = $i['email'];
                                                $level = $i['id_user_level'];
                                                $password = $i['password'];


                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $username ?></td>
                                                    <td><?= $email ?></td>
                                                    <?php if ($level == 2) { ?>
                                                        <td>Staff Umum</td>
                                                    <?php } elseif ($level == 3) { ?>
                                                        <td>Admin</td>
                                                    <?php } ?>

                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_data_admin<?= $id_user ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal" data-target="#hapus<?= $id_user ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <!-- Modal Tambah Admin -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Staff Umum</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body form-error">
                                                                <form action="<?= base_url(); ?>Admin/tambah_user" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" id="username" onkeyup="validateUsername()" class="form-control" id="username" aria-describedby="username" name="username" required>
                                                                        <span style="color: red;" id="username-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" id="pass" onkeyup="validatePass()" class="form-control" id="password" aria-describedby="password" name="password" required>
                                                                        <span style="color: red;" id="pass-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" id="email" onkeyup="validateEmail()" class="form-control" id="email" name="email" required>
                                                                        <span style="color: red;" id="email-error"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Level</label>
                                                                        <select name="level" class="form-control" required>

                                                                            <?php
                                                                            foreach ($data_level as $lvl) {
                                                                                if ($lvl['id_user_level'] == 2 || $lvl['id_user_level'] == 3) {
                                                                                    echo '<option value="' . $lvl['id_user_level'] . '">' . $lvl['user_level'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <i style="color: seagreen;" class="fas fa-check-circle"></i>
                                                                    </div>

                                                                    <button type="submit" onclick="return validateSubmit()" class="btn btn-primary">Submit</button>
                                                                    <span id="submit-error"></span>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus Data Admin -->
                                                <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Admin
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Admin/hapus_admin" method="post" enctype="multipart/form-data">
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
                                                <!-- Modal Edit Admin -->
                                                <div class="modal fade" id="edit_data_admin<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Admin/edit_admin" method="POST">
                                                                    <input type="text" name="id_user" id="id_user" value="<?= $id_user ?>" hidden>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control" id="email" aria-describedby="email" name="email" value="<?= $email ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Level</label>
                                                                        <select name="level" class="form-control" required>
                                                                            <?php
                                                                            foreach ($data_level as $lvl) {
                                                                                if ($lvl['id_user_level'] == 2 || $lvl['id_user_level'] == 3) {
                                                                                    $selected = "";
                                                                                    if ($lvl['id_user_level'] == $level) {
                                                                                        $selected = "selected";
                                                                                    }
                                                                                    echo '<option value="' . $lvl['id_user_level'] . '" ' . $selected . '>' . $lvl['user_level'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
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

    <script type="text/javascript">
        var usernameError = document.getElementById('username-error');
        var emailError = document.getElementById('email-error');
        var passError = document.getElementById('pass-error');
        var submitError = document.getElementById('submit-error');

        function validateUsername() {
            var username = document.getElementById('username').value;

            if (username.length == 0) {
                usernameError.innerHTML = 'Username harus di isi'
                return false;
            }
            if (username.length < 6) {
                usernameError.innerHTML = 'Username minimal 6 karakter'
                return false;
            }
            usernameError.innerHTML = '<i class="fas fa-check-circle"></i>';
            return true;
        }

        function validateEmail() {
            var email = document.getElementById('email').value;
            var email2 = email.slice(-9);

            if (email.length == 0) {
                emailError.innerHTML = 'Email harus di isi'
                return false;
            // }

            // if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
            //     emailError.innerHTML = 'Email Tidak Valid'
            //     return false;
            // }

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

        function validatePass() {
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

        function validateSubmit() {
            if (!validateUsername() || !validateEmail() || !validatePass()) {
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
</body>

</html>