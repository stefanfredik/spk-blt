<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Keterangan</th>
                <th>Bobot</th>
                <th>Cosr/Benefit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;

            foreach ($dataKriteria as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['kriteria']; ?></td>
                    <td><?= $dt['keterangan']; ?></td>
                    <td><?= $dt['nilai']; ?></td>
                    <td><?= $dt['type']; ?></td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>