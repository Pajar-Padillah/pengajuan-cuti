<!DOCTYPE html>
<html>

<head>
    <title>
        Laporan Cuti
    </title>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1 solid #000;
            font-weight: bold;
            background-color: #66b6d2;
        }

        .border-table td {
            border: 1 solid #000;
        }
    </style>
</head>

<body>
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
    <hr class="line-title">
    <p align="center">
        <b>LAPORAN CUTI</b>
    </p>
    <p>
        Periode Tanggal <?= date('d F Y', strtotime($tanggal['tgl_awal']))  ?> s/d <?= date('d F Y', strtotime($tanggal['tgl_akhir']))  ?>
    </p>
    <table class="border-table">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Alasan</th>
            <th>Tanggal Diajukan</th>
            <th>Mulai</th>
            <th>Berakhir</th>
            <th>Perihal Cuti</th>
        </tr>
        <?php

        $no = 0;
        foreach ($cuti as $i) :
            $no++;
            $id_cuti = $i['id_cuti'];
            $id_user = $i['id_user'];
            $nama_lengkap = $i['nama_lengkap'];
            $alasan = $i['alasan'];
            $tgl_diajukan = $i['tgl_diajukan'];
            $mulai = $i['mulai'];
            $berakhir = $i['berakhir'];
            $perihal_cuti = $i['perihal_cuti'];

        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= ucwords($nama_lengkap) ?></td>
                <td><?= ucfirst($alasan) ?></td>
                <td><?= $tgl_diajukan ?></td>
                <td><?= $mulai ?></td>
                <td><?= $berakhir ?></td>
                <td><?= ucfirst($perihal_cuti) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="float:right;">
        <br>
        Baturaja, <?= date('d F Y')  ?>
        <br>Kepala Kantor Kementerian Kab. OKU <br><br><br><br>
        <p style="margin-bottom:0pt;"><u><b>Drs. H.Ishak Putih, M.Si </b></u></p>
        <p style="margin-top:0pt;">NIP 196805121997031003</p>
    </div>
</body>

</html>