<div class="table-responsive">
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