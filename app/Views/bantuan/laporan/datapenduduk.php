<div class="table-responsive">
    <table class="table table-bordered" id="tablePenduduk" width="100%" colspacing="0">
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

                <?php foreach ($dataKriteria as $sk) : ?>
                    <th class="text-center"><?= $sk['kriteria']; ?></th>
                <?php endforeach; ?>

                <th class="text-center">Status Bantuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            // dd($dataPeserta);
            foreach ($dataPeserta as $dt) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $dt['nik']; ?></td>
                    <td><?= $dt['nama_lengkap']; ?></td>
                    <td><?= $dt['jenis_kelamin'] == 'Perempuan' ? 'P' : 'L'; ?></td>
                    <td><?= $dt['tanggal_lahir']; ?></td>
                    <td><?= $dt['tempat_lahir']; ?></td>
                    <td><?= $dt['alamat']; ?></td>
                    <td><?= $dt['rt']; ?></td>
                    <td><?= $dt['rw']; ?></td>
                    <td><?= $dt['desa']; ?></td>

                    <?php foreach ($dataKriteria as $sk) :
                        $k = 'k_' . $sk['id'];

                        foreach ($dataSubkriteria as $ds) :
                            if ($dt[$k] == $ds['id']) echo "<td>" . $ds['subkriteria'] . "</td>";
                        endforeach; ?>
                    <?php endforeach; ?>

                    <td>BLT</td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>