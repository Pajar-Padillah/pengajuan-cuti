<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
    <style>
        .setting-form span {
            font-size: 14px;
            color: red;
        }

        .setting-form span i {
            color: seagreen;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('password_err')) { ?>
        <script>
            swal({
                title: "Error Password!",
                text: "Ketik Ulang Password!",
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
                            <h1 class="m-0">Setting</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form action="<?= base_url(); ?>Settings/settings_account_super_admin" method="POST" class="setting-form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" onkeyup="validateUsername()" name="username" aria-describedby="Username" required>
                            <span id="username-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="pass" onkeyup="validatePass()" name="password" aria-describedby="password" required>
                            <span id="pass-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="re_password">Ulangi Password</label>
                            <input type="password" class="form-control" id="pass2" onkeyup="validatePass2()" name="re_password" aria-describedby="re_password" required>
                            <span id="pass2-error"></span>
                        </div>
                        <button type="submit" onclick="return validateSubmit()" class="btn btn-primary">Submit</button>
                        <span id="submit-error"></span>
                    </form>
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
    var usernameError = document.getElementById('username-error');
    var passError = document.getElementById('pass-error');
    var pass2Error = document.getElementById('pass2-error');
    var submitError = document.getElementById('submit-error');

    function validateUsername() {
        var username = document.getElementById('username').value;

        if (username.length == 0) {
            usernameError.innerHTML = 'Username harus di isi'
            return false;
        }
        if (username.length > 16) {
            usernameError.innerHTML = 'Maksimal Username 16 karakter'
            return false;
        }
        if (username.length < 4) {
            usernameError.innerHTML = 'Username minimal 4 karakter'
            return false;
        }

        usernameError.innerHTML = '<i class="fas fa-check-circle"></i>';
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

    function validatePass2() {
        var pass2 = document.getElementById('pass2').value;
        var pass1 = document.getElementById('pass').value;

        if (pass2.length == 0) {
            pass2Error.innerHTML = 'Password harus di isi'
            return false;
        }
        if (pass2.length < 6) {
            pass2Error.innerHTML = 'Password minimal 8 karakter'
            return false;
        }
        if (pass2 != pass1) {
            pass2Error.innerHTML = 'Password harus sama!'
            return false;
        }
        pass2Error.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
    }

    function validateSubmit() {
        if (!validateUsername() || !validatePass() || !validatePass2()) {
            submitError.style.display = 'block';
            submitError.innerHTML = 'Silahkan perbaiki data!';
            setTimeout(function() {
                submitError.style.display = 'none'
            }, 3000);
            return false;
        }
        return true;
    }
</script>