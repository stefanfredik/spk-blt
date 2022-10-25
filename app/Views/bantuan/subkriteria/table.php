<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kriteria</th>
                <th>Sub Kriteria</th>
                <th width="80px" class="text-center">Nilai</th>
                <th class="text-center" width="80px">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataKriteria as $dk) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td style="justify-content: center;"><?= $dk['kriteria']; ?></td>
                    <td>
                        <?php foreach ($dataSubkriteria as $sk) : ?>
                            <?php if ($dk['id'] == $sk['id_kriteria']) :  ?>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="my-2"><?= $sk['subkriteria']; ?></div>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($dataSubkriteria as $sk) : ?>
                            <?php if ($dk['id'] == $sk['id_kriteria']) :  ?>
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <div class="my-2"><?= $sk['nilai']; ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>

                    <td>
                        <?php foreach ($dataSubkriteria as $sk) : ?>
                            <?php if ($dk['id'] == $sk['id_kriteria']) :  ?>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="my-1">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button onclick="remove('<?= $url; ?>', this)" class="btn btn-sm text-white btn-danger" data-id="<?= $sk['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                                            <button onclick="edit('<?= $url; ?>', this)" class="btn btn-sm  btn-primary" data-id="<?= $sk['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>