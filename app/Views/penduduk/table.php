<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>No KK</th>
                <th>Nik</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>

                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;
            foreach ($pendudukData as $dt) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-center">
                        <?php if ($dt['blt'] != null) : ?>
                            <div class="badge bg-success">
                                <i class="bi bi-check-all"></i> BLT
                            </div>
                        <?php elseif ($dt['bpnt'] != null) : ?>
                            <div class="badge bg-success">
                                <i class="bi bi-check-all"></i> BPNT
                            </div>
                        <?php else : ?>
                            -
                        <?php endif; ?>

                    </td>
                    <td><?= $dt['no_kk'] ?></td>
                    <td><?= $dt['nik'] ?></td>
                    <td><?= $dt['nama_lengkap'] ?></td>
                    <td><?= $dt['tempat_lahir'] ?></td>
                    <td><?= $dt['tanggal_lahir'] ?></td>
                    <td><?= $dt['jenis_kelamin'] ?></td>

                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                            <button onclick="detail('<?= $url; ?>', this)" data-id="<?= $dt['id'] ?>" type="button" class="btn btn-secondary">Detail</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>