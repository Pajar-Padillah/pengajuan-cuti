<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('data-error')) { ?>
        <script>
            swal({
                title: "Error!",
                text: "Data Cuti Sudah Ada!",
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
                            <h1 class="m-0">Form Permohonan Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard/dashboard_pegawai'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Permohonan Cuti</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form action="<?= base_url(); ?>Form_Cuti/proses_cuti" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?= $this->session->userdata('id_user') ?>" name="id_user" hidden>

                        <div class="form-group">
                            <label for="perihal_cuti">Perihal Cuti</label>
                            <select name="perihal_cuti" class="form-control" required>
                                <!--   <option <?php if ($perihal_cuti == "") {
                                                    echo 'selected';
                                                } ?> >--Pilih--</option>
                        <option <?php if ($perihal_cuti == "cuti tahunan") {
                                    echo 'selected';
                                } ?>>Cuti Tahunan</option>
                        <option <?php if ($perihal_cuti == "cuti besar") {
                                    echo 'selected';
                                } ?>>Cuti Besar</option>
                        <option <?php if ($perihal_cuti == "cuti sakit") {
                                    echo 'selected';
                                } ?>>Cuti Sakit</option>
                        <option <?php if ($perihal_cuti == "cuti melahirkan") {
                                    echo 'selected';
                                } ?>>Cuti Melahirkan</option>
                        <option <?php if ($perihal_cuti == "cuti karena alasan penting") {
                                    echo 'selected';
                                } ?>>Cuti Karena Alasan Penting</option>
                        <option <?php if ($perihal_cuti == "cuti di luar tanggungan negara") {
                                    echo 'selected';
                                } ?>>Cuti Di Luar tanggungan Negara</option> -->
                                <option value="0">---Pilih Cuti---</option>
                                <option value="cuti tahunan">Cuti Tahunan</option>
                                <option value="cuti besar">Cuti Besar</option>
                                <option value="cuti sakit">Cuti Sakit</option>
                                <option value="cuti melahirkan">Cuti Melahirkan</option>
                                <option value="cuti karena alasan penting">Cuti Karena Alasan Penting</option>
                                <option value="cuti di luar tanggungan negara">Cuti Di Luar Tanggungan Negara</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai Cuti</label>
                            <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="berakhir">Berakhir Cuti</label>
                            <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" required>

                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea class="form-control" id="alasan" rows="3" name="alasan" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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

    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>