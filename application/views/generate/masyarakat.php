<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat</title>
    <style>
        * {
            margin : 0px;
            padding : 0px;
        } 

        body {
            margin : 10px;
            padding : 10px;
        }

        .text-center {
            text-align : center;
        }

        #head {
            margin-top : 8px;
        }
        hr {
            margin-top : 8px;
        }

        table {
            margin : 0 auto;
            margin-top : 8px;
            border : 1px solid #778899;
        }

        table th {
            padding : 8px 8px;
            border-left : 1px solid #778899;
            margin-bottom : 1px solid #778899;
            background : #A9A9A9;
        }

        table tr {
            text-align : center;
            padding-left : 20px;
        }

        table td {
            padding : 8px 8px;
            border-top : 1px solid #778899;
            border-left : 1px solid #778899;
        }

    </style>
</head>
<body>
    <div id="head">
        <h2 class="text-center">Aplikasi Pelaporan Pengaduan Masyarakat</h2>
        <hr>
        <h3 class="text-center">Laporan Masyarakat</h3>
    </div>

    <?php if(empty($masyarakat)): ?>
    <h5>Tidak Ada Data</h5>
    <?php else: ?>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>No Telp</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        foreach($masyarakat as $m){ ?>
            <tr>
                <td><?= $m->nama; ?></td>
                <td><?= $m->nik; ?></td>
                <td><?= $m->no_telp; ?></td>
                <td><?php if($m->aktif == 1): ?>Aktif<?php else: ?>Nonaktif<?php endif; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php endif; ?>
    <h5 class="text-center">UKK_Nia Nur Afisah</h5>
</body>
</html>