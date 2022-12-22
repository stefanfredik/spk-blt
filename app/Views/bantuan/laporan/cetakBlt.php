<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        th {
            text-align: center;
        }

        h3 {
            margin: 10px;
            text-align: center;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    <div>
        <h3>Laporan Data BLT Periode 1 Tahun 2022</h3>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">RT</th>
                    <th class="text-center">RW</th>
                    <th class="text-center">Desa</th>
                    <th class="text-center">Periode</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                // dd($dataPeserta);
                foreach ($dataPeserta as $dt) : ?>
                    <?php if ($dt['status_layak'] != 'Tidak Layak') : ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= $dt['nik']; ?></td>
                            <td><?= $dt['nama_lengkap']; ?></td>
                            <td><?= $dt['jenis_kelamin'] ?></td>
                            <td><?= $dt['tanggal_lahir']; ?></td>
                            <td><?= $dt['tempat_lahir']; ?></td>
                            <td><?= $dt['alamat']; ?></td>
                            <td><?= $dt['rt']; ?></td>
                            <td><?= $dt['rw']; ?></td>
                            <td><?= $dt['desa']; ?></td>
                            <td style="text-align: center;">1</td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>