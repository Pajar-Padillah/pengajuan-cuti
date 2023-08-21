<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Login | Cuti Kemenag OKU</title>

  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/logo.png" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/login/style.css" />
  <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
  <style>
    .sign-up-form span {
      position: absolute;
      bottom: 12px;
      right: 17px;
      font-size: 14px;
      color: red;
    }

    .sign-up-form span i {
      color: seagreen;
    }
  </style>
</head>

<body>

  <?php if ($this->session->flashdata('success_log_out')) { ?>
    <script>
      swal({
        title: "Success!",
        text: "Anda Berhasil Logout!",
        icon: "success",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('input')) { ?>
    <script>
      swal({
        title: "Berhasil Terdaftar!",
        text: "Silahkan Anda Login!",
        icon: "success",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('eror')) { ?>
    <script>
      swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('loggin_err_no_user')) { ?>
    <script>
      swal({
        title: "Error!",
        text: "Anda Belum Terdaftar!",
        icon: "error",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('loggin_err_pass')) { ?>
    <script>
      swal({
        title: "Error!",
        text: "Password Yang Anda Masukan Salah!",
        icon: "error",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('loggin_err_no_access')) { ?>
    <script>
      swal({
        title: "Error!",
        text: "Anda Belum Memiliki Akses!",
        icon: "error",
        timer: 2000
      });
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('loggin_err')) { ?>
    <script>
      swal({
        title: "Error!",
        text: "Sesi Anda Habis!",
        icon: "error",
        timer: 2000
      });
    </script>
  <?php } ?>


  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form class="sign-in-form" action="<?= base_url(); ?>Login/proses" method="POST">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input name="username" type="text" placeholder="Username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" required />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>

      </div>
    </div>

    <div class="panels-container">

      <div class="panel left-panel">
        <div class="content">
          <img src="<?= base_url(); ?>assets/login/img/logo4.svg" style="width: 30%;" class="image" alt="" />
          <h3>Pengajuan Cuti Kantor Kementerian Agama Kabupaten OKU</h3>
        </div>
      </div>

    </div>
  </div>

  <script src="<?= base_url(); ?>assets/login/app.js"></script>
</body>

</html>

<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }

  var nipError = document.getElementById('nip-error');
  var usernameError = document.getElementById('username-error');
  var emailError = document.getElementById('email-error');
  var passError = document.getElementById('pass-error');
  var pass2Error = document.getElementById('pass2-error');
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

  function validateEmail() {
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
    if (!validateNIP() || !validateUsername() || !validateEmail() || !validatePass() || !validatePass2()) {
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