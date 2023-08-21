<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Kantor Kementerian Agama Ogan Komering Ulu</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/login/assets/logo.png" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= base_url(); ?>assets/login/css/styles.css" rel="stylesheet" />
	<!-- Sweetalert -->
	<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">
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
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container px-4 px-lg-5">
			<a class="navbar-brand" href="#page-top">Kantor Kementerian Agama Kabupaten Ogan Komering Ulu</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
					<li class="nav-item"><a class="nav-link" href="#projects">Cuti</a></li>
					<li class="nav-item"><a class="nav-link" href="#signup">Kontak</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->
	<header class="masthead">
		<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
			<div class="d-flex justify-content-center">
				<div class="text-center">
					<h1 class="mx-auto my-0 text-uppercase">Welcome</h1>
					<h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
					<a class="btn btn-primary" href="<?= base_url('login/login'); ?>">Login</a>
				</div>
			</div>
		</div>
	</header>
	<!-- About-->
	<section class="about-section text-center" id="about">
		<div class="container px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5 justify-content-center">
				<div class="col-lg-8" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; letter-spacing: 2px; text-align: left;">
					<h2 class="text-white mb-4 display-6">Kantor Kementerian Agama Kabupaten Ogan Komering Ulu</h2>
					<p class="text-white">
						Berdasarkan Keputusan Menteri Agama RI Nomor Tahun 2002 Kantor Kementeian Agama Kabupaten Ogan Komering Ulu termasuk dalam golong TYPE II-A yang berada dibawah dan bertanggung jawab langsung kepada kepala Kantor Wilayah Kementerian Agama Provinsi Sumatera Selatan. Pada tanggal 03 Januari 1946 M / 22 Muharam 1364 H Penetapan Presiden RI No.1/SD tanggal 03 Januari 1946.
						Berdirinya Kementerian Agama Usul pendirian ini dilakukan pada Rapat Plemo Komite Nasional Indonesia Pusat (KNIP) tanggal 24-28 November 1945 di Gedung Fakultas Kedokteran Salemba Jakarta. Sebagai instansi vertical, maka segala keputusan dan kebijaksaan harus berpedoman, mentaati segala kebijakan dan aturan serta tidak boleh bertentangan dengan kebijakan dan peraturan yang telah dibuat oleh Kementerian Agama Pusat dan Kantor Wilayah Kementerian Agama Provinsi Sumatera Selatan
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Projects-->
	<section class="projects-section bg-light" id="projects">
		<div class="container px-4 px-lg-5">
			<!-- Project One Row-->
			<div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
				<div class="col-lg-6"><img class="img-fluid" src="<?= base_url(); ?>assets/login/assets/img/foto-3.jpg" alt="..." style="object-position: center; object-fit: cover; max-height: inherit; height: 100%; width:auto;" /></div>
				<div class="col-lg-6">
					<div class="bg-black text-center h-100 project">
						<div class="d-flex h-100">
							<div class="project-text w-100 my-auto text-center text-lg-left">
								<h4 class="text-white">Daftar Akun</h4>
								<p class="text-white-50">Bagi yang belum mempunyai akun silahkan membuat akun dengan mengklik menu buat akun dan bagi yang sudah memiliki akun silahkan melakukan login</p>
								<a href="<?= base_url('/login/register') ?>">Daftar disini</a>
								<hr class="d-none d-lg-block mb-0 ms-0" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Project Two Row-->
			<div class="row gx-0 justify-content-center">
				<div class="col-lg-6"><img class="img-fluid" src="<?= base_url(); ?>assets/login/assets/img/foto-4.jpg" alt="..." style="object-position: center; object-fit: cover; max-height: inherit; height: 100%; width:auto;" /></div>
				<div class="col-lg-6 order-lg-first">
					<div class="bg-black text-center h-100 project">
						<div class="d-flex h-100">
							<div class="project-text w-100 my-auto text-center text-lg-right">
								<h4 class="text-white">Lengkapi Biodata</h4>
								<p class="mb-0 text-white-50">Silahkan lengkapi biodata di menu profil setelah profil telah di lengkapi maka akan muncul menu untuk pengajuan cuti</p>
								<hr class="d-none d-lg-block mb-0 me-0" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Signup-->
	<section class="signup-section" id="signup">
		<div class="container px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5">
				<div class="col-md-10 col-lg-8 mx-auto text-center">

					<!-- Submit error message-->
					<!---->
					<!-- This is what your users will see when there is-->
					<!-- an error submitting the form-->
					<div class="d-none" id="submitErrorMessage">
						<div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact-->
	<section class="contact-section bg-black">
		<div class="container px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5">
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-map-marked-alt text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Alamat</h4>
							<hr class="my-4 mx-auto" />
							<div class="small text-black-50">jl. HS. Simanjuntak No. 0768</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-envelope text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Email</h4>
							<hr class="my-4 mx-auto" />
							<div class="small text-black-50"><a href="mailto: kabogankomeringulu@gmail.com" target="_top"></a>kabogankomeringulu@gmail.com</a></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-mobile-alt text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Phone</h4>
							<hr class="my-4 mx-auto" />
							<div class="small text-black-50">(0735) 320026-322575</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer-->
	<footer class="footer bg-black small text-center text-white-50">
		<div class="container px-4 px-lg-5">Kantor Kementerian Agama Kabupaten Ogan Komering Ulu</div>
	</footer>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="<?= base_url(); ?>assets/login/js/scripts.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
