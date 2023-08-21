<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("kepala_kantor/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php if ($this->session->flashdata('success_login')) { ?>
		<script>
			swal({
				title: "Success!",
				text: "Anda Berhasil Login!",
				icon: "success",
				timer: 2000
			});
		</script>
	<?php } ?>
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Navbar -->
		<?php $this->load->view("kepala_kantor/components/navbar.php") ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view("kepala_kantor/components/sidebar.php") ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard </a>
							</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_kepala_kantor'); ?>">Home</a></li>
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
								<a href="<?= base_url(); ?>Cutii/view_kepalakantor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
								<a href="<?= base_url(); ?>Cutii/view_kepalakantor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
								<a href="<?= base_url(); ?>Cutii/view_kepalakantor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?= $cuti_confirm['total_cuti'] ?></h3>

									<p>Data Cuti Menunggu Konfirmasi</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?= base_url(); ?>Cutii/view_kepalakantor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?= $pegawai['total_user'] ?></h3>

									<p>Pegawai</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="<?= base_url(); ?>Pegawai/view_kepalakantor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->


					</div>
					<!-- /.row -->
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

	<?php $this->load->view("kepala_kantor/components/js.php") ?>

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