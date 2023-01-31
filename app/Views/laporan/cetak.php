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
        <h3>Laporan Data Penduduk Tahun 2022</h3>
        <table class="table table-bordered" id="table" width="100%" colspacing="0">
            <thead>
                <tr>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">No KK</th>
                    <th class="text-center align-middle">NIK</th>
                    <th class="text-center align-middle">Nama</th>
                    <th class="text-center align-middle">Jenis Kelamin</th>
                    <th class="text-center align-middle">Tempat Lahir</th>
                    <th class="text-center align-middle">Tanggal Lahir</th>
                    <th class="text-center align-middle">Alamat</th>
                    <th class="text-center align-middle">RT</th>
                    <th class="text-center align-middle">RW</th>
                    <th class="text-center align-middle">Desa</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($dataPenduduk as $dt) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dt['no_kk']; ?></td>
                        <td><?= $dt['nik']; ?></td>
                        <td><?= $dt['nama_lengkap']; ?></td>
                        <td><?= $dt['jenis_kelamin']; ?></td>
                        <td><?= $dt['tempat_lahir']; ?></td>
                        <td><?= $dt['tanggal_lahir']; ?></td>
                        <td><?= $dt['alamat']; ?></td>
                        <td><?= $dt['rt']; ?></td>
                        <td><?= $dt['rw']; ?></td>
                        <td><?= $dt['desa']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>