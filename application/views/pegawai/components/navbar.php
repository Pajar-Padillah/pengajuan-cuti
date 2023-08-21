<style>
  .email-valid span i {
    color: seagreen;
  }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
  <?php if ($pegawai['nama_lengkap'] == '') { ?>
    <?php if ($this->session->flashdata('info')) { ?>
      <script>
        swal({
          title: "Lengkapi Data!",
          text: "Lengkapi Biodata Diri Untuk Mengajukan Cuti!",
          icon: "warning"
        });
      </script>
    <?php } ?>
  <?php } ?>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a type="button" href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#exampleModal">Lengkapi Data</a>
        <a data-toggle="modal" data-target="#logout" class="dropdown-item dropdown-footer">Logout</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $id = 0;
        foreach ($pegawai_data as $i) :
          $id++;
          $id_user = $i['id_user'];
          $username = $i['username'];
          $password = $i['password'];
          $nama_lengkap = $i['nama_lengkap'];
          $email = $i['email'];
          $pangkat = $i['pangkat'];
          $jabatan = $i['jabatan'];
          $jenis_kelamin = $i['jenis_kelamin'];
          $no_telp = $i['no_telp'];
          $alamat = $i['alamat'];

        ?>
          <form action="<?= base_url(); ?>Settings/lengkapi_data" method="POST">
            <input type="text" value="<?= $this->session->userdata('id_user'); ?>" name="id" hidden>
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" value="<?= $nama_lengkap ?>" id="nama_lengkap" maxlength="30" required>
              <p class="error-nama"></p>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select class="form-control" id="" name="jenis_kelamin" required>
                <option value="L" <?php if ($jenis_kelamin == 'L') {
                                    echo "selected";
                                  } ?>>Laki-laki</option>
                <option value="P" <?php if ($jenis_kelamin == 'P') {
                                    echo "selected";
                                  } ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no_telp">No HP</label>
              <input type="text" minlength="11" maxlength="13" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?= $no_telp ?>" required onkeypress="return angka(event);">
            </div>
            <div class="form-group email-valid">
              <label for="">Email</label>
              <input type="text" id="email" onkeyup="validateemail()" class="form-control" name="email" value="<?= $email ?>" id="email" required>
              <span style="color: red;" id="email-error"></span>
            </div>
            <div class="form-group">
              <label for="pangkat">Pangkat</label>
              <select name="pangkat" class="form-control" required>
                <option <?php if ($pangkat == "") {
                          echo 'selected';
                        } ?> disabled selected value>--Pilih--</option>
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

            <div class="form-group">
              <label for="no_telp">Alamat</label>
              <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $alamat ?></textarea>
            </div>

            <button type="submit" type="submit" onclick="return validateSubmit()" class="btn btn-primary" id="btnn">Submit</button>
            <span id="submit-error"></span>
          </form>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Logout -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Logout</b></h4>
      </div>
      <div class="modal-body">
        Yakin ingin logout ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('login/log_out/'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }

  function containsNumbers(str) {
    return /\d/.test(str);
  }

  $(document).ready(function() {

    var nama_lengkap = $('#nama_lengkap');
    var email = $('#email');

    var buttonSubmit = $('#btnn');

    nama_lengkap.keyup(function() {
      var string = nama_lengkap.val();
      var matches = /\d/.test(string);
      if (matches) {
        $('.error-nama').html('<span style="color: red;" >Kolom nama tidak boleh ada angka</span>')
        buttonSubmit.attr('disabled', 'true');
      } else {
        $('.error-nama').html('<small></small>');
        buttonSubmit.removeAttr('disabled');
      }

    });

    email.keyup(function() {
      var string = email.val();
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var matches = regex.test(string);
      console.log(matches)
      if (!matches) {
        $('.error-email').html('<small class="text-danger">Email tidak valid</small>')
        buttonSubmit.attr('disabled', 'true');
      } else {
        $('.error-email').html('<small></small>');
        buttonSubmit.removeAttr('disabled');
      }

    })

  })

  var emailError = document.getElementById('email-error');

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

  function validateSubmit() {
    if (!validateemail()) {
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