<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Cuti</title>
</head>

<body>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>

    <?php

    $id = 0;
    foreach ($cuti as $i) :
        $id++;
        $id_cuti = $i['id_cuti'];
        $id_user = $i['id_user'];
        $nama_lengkap = $i['nama_lengkap'];
        $alasan = $i['alasan'];
        $nip = $i['nip'];
        $alamat = $i['alamat'];
        $pangkat = $i['pangkat'];
        $jabatan = $i['jabatan'];
        $perihal_cuti = $i['perihal_cuti'];
        $tgl_diajukan = $i['tgl_diajukan'];
        $mulai = $i['mulai'];
        $berakhir = $i['berakhir'];
        $id_status_cuti = $i['status_cuti'];

    ?>

        <?php $diff = abs(strtotime($mulai) - strtotime($berakhir));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        ?>
        <table style="width: 100%;">
            <tr>
                <td><img src="<?= base_url(); ?>assets/logo.PNG" width="120" height="120"></td>
                <td align="center">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">KANTOR KEMENTERIAN AGAMA REPUBLIK INDONESIA</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">KABUPATEN OGAN KOMERING ULU</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%;"><span style="font-family:Arial;">Jl. HS. Simanjuntak, No.0768 Baturaja - 32115 Provinsi Sumatera Selatan - Indonesia <br>
                            Telp : (0735) 320026, Email : kabogankomeringulu@kemenag.go.id
                        </span></p>
                </td>
            </tr>
        </table>
        <hr>
        <br>
        <center><b><u>IZIN SEMENTARA PELAKSANAAN <?= strtoupper($perihal_cuti) ?></u></b></center>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-left:350pt; margin-bottom:0pt; text-indent:36pt; text-align:justify; line-height:150%;">
            <span style="font-family:'Times New Roman';">Baturaja, <?= tgl_indo($tgl_diajukan) ?></span>
        </p>
        <br>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">1. Diberikan izin sementara untuk melaksanakan <?= ucwords($perihal_cuti) ?> karena <?= ucwords($alasan) ?> kepada Pegawai Negeri Sipil, atas nama :</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Nama</span><span style="width:6.99pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= ucwords($nama_lengkap) ?></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;NIP</span><span style="width:16.75pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= $nip ?></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Pangkat/Gol ruang</span><span style="width:17.50pt; display:inline-block;"></span><span style="font-family:'Times New Roman';">:
                <?= $pangkat ?></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Jabatan</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?= $jabatan ?></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Satuan Organisasi</span><span style="width:21.75pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                Kantor Kementerian Agama Kabupaten OKU</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">terhitung mulai
                tanggal <?= tgl_indo($mulai) ?> sampai dengan tanggal <?= tgl_indo($berakhir) ?> dengan ketentuan sebagai berikut :</span>
        </p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">a. Sebelum menjalankan <?= ucwords($perihal_cuti) ?>, wajib menyerahkan pekerjaannya kepada atasan langsungnya atau pejabat lain yang ditunjuk.</span>
        </p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">b. Setelah selesai menjalankan <?= ucwords($perihal_cuti) ?>, wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana mestinya.</span>
        </p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">c. Selama menjalankan <?= ucwords($perihal_cuti) ?>, yang bersangkutan beralamat di <?= $alamat ?></span>
        </p>
        <br>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">2. Demikian Surat Izin Sementara Melaksanakan cuti ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</span></p>
        <div style="float:right;">
            <br>
            Baturaja, <?= date('d F Y')  ?>
            <br>Kepala Kantor Kementerian Kab. OKU <br><br><br><br>
            <p style="margin-bottom:0pt;"><u><b>Drs. H.Ishak Putih, M.Si </b></u></p>
            <p style="margin-top:0pt;">NIP 196805121997031003</p>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:130%;"><span style="font-family:'Times New Roman';" style="font-size: 13px;">Tembusan : <br>
                1. Kepala Kanwil Kemenag Prov. Sumsel di Palembang <br>
                2. Kepala Kantor Kankemenag Kab. OKU, Baturaja.</span>
        </p>
    <?php endforeach; ?>
</body>

</html>