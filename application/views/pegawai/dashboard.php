<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pegawai/components/header.php") ?>
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
							<h1 class="m-0">Dashboard
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_pegawai'); ?>">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?= $cuti['total_cuti'] ?></h3>

									<p>Data Cuti</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?= $cuti_acc['total_cuti'] ?></h3>

									<p>Data Cuti Diterima</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?= $cuti_reject['total_cuti'] ?></h3>

									<p>Data Cuti Ditolak</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?= $cuti_confirm['total_cuti'] ?></h3>

									<p>Proses</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?php
										// echo var_dump($cuti_pegawai[0]['mulai']);
										// echo var_dump($cuti_pegawai[0]['berakhir']);
										if ($cuti_pegawai == null) {
											echo 'Belum Ada';
										} else {
											$now = time(); // or your date as well
											$your_date = strtotime($cuti_pegawai[0]['berakhir']);
											$datediff = $your_date - $now;

											$date_akhir = round($datediff / (60 * 60 * 24));



											$now = time(); // or your date as well
											$your_date = strtotime($cuti_pegawai[0]['mulai']);
											$datediff = $now - $your_date;

											$date_mulai = round($datediff / (60 * 60 * 24));



											if ($date_mulai >= 0 and $date_akhir >= 0) {
												echo $date_akhir . ' Hari Lagi';
											} else {
												echo "Belum Ada";
											}
										}

										?></h3>

									<p>Sisa Cuti</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

					</div>
					<h1>Syarat Permohonan Cuti</h1>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Tahunan
								</div>
								<div class="card-body">
									<h5 class="card-title">Cuti Tahunan : 12 Hari Kerja</h5>
									<br><br />
									<p class="card-text">Aturan cuti ini diberikan untuk PNS yang setidaknya sudah bekerja
										sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa cuti adalah
										12 hari
										kerja.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Besar
								</div>
								<div class="card-body">
									<h5 class="card-title">Cuti Besar : 3 Bulan</h5>
									<br><br />
									<p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah mengabdikan dirinya
										sekurang-kurangnya 5 tahun secara terus menerus. Durasi cuti besar yang boleh
										diambil adalah 3 bulan.</p>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Sakit
								</div>
								<div class="card-body">
									<h5 class="card-title">Cuti Sakit : 3 Bulan</h5>
									<br><br />
									<p class="card-text">Bila PNS jatuh sakit dan tidak memungkinkan untuk melakukan pekerjaan,
										yang bersangkutan berhak atas cuti sakit. Aturan cuti PNS yang sakit diberikan 1 hari
										atau 2 hari kerja dengan ketentuan bahwa ia harus memberitahukan kepada atasannya
										dan melampirkan surat keterangan dokter.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Melahirkan
								</div>
								<div class="card-body">
									<h5 class="card-title">Cuti Melahirkan : 3 Bulan</h5>
									<br><br />
									<p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga, PNS wanita
										berhak atas cuti melahirkan. Namun, untuk persalinan anak keempat dan seterusnya,
										diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti melahirkan adalah 1
										bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini diajukan secara tertulis dan
										selama menjalankan cuti ini, PNS wanita masih berhak mendapatkan penghasilannya.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Alasan Penting
								</div>
								<div class="card-body">
									<h5 class="card-title">Cuti Alasan Penting : 1 bulan</h5>
									<br><br />
									<p class="card-text">Cuti alasan penting ini diberikan ketika ibu, bapak, istri, suami,
										anak, adik, kakak, mertua, atau menantu yang sedang sakit keras atau meninggal dunia.
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
									Cuti Di Luar Tanggungan Negara
								</div>
								<div class="card-body">
									<p class="card-text">Jenis cuti ini diberikan kepada PNS yang telah bekerja
										sekurang-kurangnya 5 tahun secara terus menerus karena alasan-alasan pribadi yang
										penting dan mendesak dapat diberikan cuti di luar tanggungan negara. Cuti di luar
										tanggungan negara dapat diberikan paling lama 3 tahun. Jangka waktu cuti di luar
										tanggungan negara dapat diperpanjang paling lama 1 tahun apabila ada alasan-alasan yang
										penting untuk memperpanjangnya.
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="font-weight-bold mb-0">Grafik Data Cuti Pegawai</h5>
								</div>
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-12">
											<div class="row mb-2">
												<div class="col-sm-4 mb-3">
													<label for="bulan_awal" class="form-label">Dari bulan</label>
													<select name="bulan_awal" id="bulan_awal" class="form-control">
														<option value="" selected disabled>Pilih bulan</option>
														<option value="1">Januari</option>
														<option value="2">Februari</option>
														<option value="3">Maret</option>
														<option value="4">April</option>
														<option value="5">Mei</option>
														<option value="6">Juni</option>
														<option value="7">Juli</option>
														<option value="8">Agustus</option>
														<option value="9">September</option>
														<option value="10">Oktober</option>
														<option value="11">November</option>
														<option value="12">Desember</option>
													</select>
												</div>
												<div class="col-sm-4 mb-3">
													<label for="bulan_awal" class="form-label">Hingga bulan</label>
													<select name="bulan_akhir" id="bulan_akhir" class="form-control mr-4">
														<option value="" selected>Pilih bulan</option>
														<option value="1">Januari</option>
														<option value="2">Februari</option>
														<option value="3">Maret</option>
														<option value="4">April</option>
														<option value="5">Mei</option>
														<option value="6">Juni</option>
														<option value="7">Juli</option>
														<option value="8">Agustus</option>
														<option value="9">September</option>
														<option value="10">Oktober</option>
														<option value="11">November</option>
														<option value="12">Desember</option>
													</select>
												</div>
												<div class="col-sm-4 mb-3">
													<label for="tahun" class="form-label">Tahun</label>
													<select name="tahun" id="tahun" class="form-control">
														<option value="" selected disabled>Pilih tahun</option>
														<?php foreach ($tahun as $t) : ?>
															<option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<button type="button" id="filterBtn" class="btn mb-3 btn-primary btn-block"><i class="ion ion-funnel"></i> Filter</button>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div id="chart-bar-cuti"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
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

	<?php $this->load->view("pegawai/components/js.php") ?>

	<script>
		$(document).ready(function() {
			google.charts.load('current', {
				packages: ['bar']
			});

			function getMonthName(monthNumber) {
				const date = new Date();
				date.setMonth(monthNumber - 1);

				return date.toLocaleString('id-ID', {
					month: 'long'
				});
			}

			function load_chart_data(bulan_awal, bulan_akhir, tahun) {
				let tempt_title;
				if (bulan_awal == null && bulan_akhir == null && tahun == null) {
					tempt_title = 'Data Cuti Pegawai'
				}

				if (bulan_akhir != null) {
					tempt_title = 'Data Cuti Pegawai dari Bulan ' + getMonthName(bulan_awal) + ' hingga ' + getMonthName(bulan_akhir) + ' Tahun ' + tahun
				} else {
					tempt_title = 'Data Cuti Pegawai pada Bulan ' + getMonthName(bulan_awal) + ' Tahun ' + tahun
				}


				$.ajax({
					url: "<?= base_url('Dashboard/grafikDataCuti') ?>",
					data: {
						bulan_awal,
						bulan_akhir,
						tahun
					},
					method: "POST",
					dataType: "json",
					success: function(data) {
						if (data.error == 404) {
							return swal({
								title: "Data Tidak Ditemukan",
								text: `Pencarian grafik data untuk ['${getMonthName(bulan_awal)}', '${bulan_akhir ? getMonthName(bulan_akhir) : '-'}', '${tahun}'] tidak ditemukan!`,
								icon: "info",
								timer: 3000
							});
						}
						drawChartCuti(data, tempt_title)
					}
				});
			}

			function drawChartCuti(chart_data, chart_title) {
				var jsonData = chart_data;
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Bulan');
				data.addColumn('number', 'Cuti belum dikonfirmasi');
				data.addColumn('number', 'Cuti diterima');
				data.addColumn('number', 'Cuti ditolak');

				$.each(jsonData, function(i, j) {
					var bulan = getMonthName(j.bulan);
					var cuti_konfirmasi = j.cuti_konfirmasi
					var cuti_diterima = j.cuti_diterima
					var cuti_ditolak = j.cuti_ditolak
					data.addRows([
						[bulan, cuti_konfirmasi, cuti_diterima, cuti_ditolak]
					]);
				})

				var options = {
					title: chart_title,
					hAxis: {
						title: 'Bulan'
					},
					vAxis: {
						title: 'Total Cuti',
						scaleType: 'mirrorLog'
					}
				}
				var chartEl = document.getElementById('chart-bar-cuti');
				var chart = new google.charts.Bar(chartEl);

				chart.draw(data, google.charts.Bar.convertOptions(options));
			}

			$('#filterBtn').on('click', function() {
				var bulan_awal = $('#bulan_awal').val()
				var bulan_akhir = $('#bulan_akhir').val()
				var tahun = $('#tahun').val()

				if (bulan_awal != null && tahun != null) {
					load_chart_data(bulan_awal, bulan_akhir, tahun);
				} else {
					return swal({
						title: "Proses dihentikan!",
						text: "Mohon untuk memilih bulan dan tahun terlebih dahulu!",
						icon: "error",
						timer: 3000
					});
				}
			})
		})
	</script>
</body>

</html>
