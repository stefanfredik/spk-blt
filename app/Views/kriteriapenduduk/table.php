<div class="table-responsive">
    <table class="table table-bordered" id="<?= $url; ?>" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Status Data</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            use App\Models\KriteriapendudukModel;

            $no = 1;
            $kriteriapendudukModel = new KriteriapendudukModel();
            // dd($dataKriteriapenduduk);

            foreach ($dataKriteriapenduduk as $dt) :
                $statusBerkas = ($kriteriapendudukModel->first($dt['id'])) ? true : false;
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['nik']; ?></td>
                    <td><?= $dt['nama_lengkap']; ?></td>
                    <td style="font-weight: bold;"><?= ($statusBerkas) ? 'Lengkap' : 'Belum Lengkap'; ?></td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-plus-square mr-2"></i></button>
                            <?php if ($statusBerkas) { ?>
                                <button onclick="add('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                            <?php } else { ?>
                                <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-plus-square mr-2"></i></button>
                            <?php } ?>
                            <button class="btn btn-info text-white">Detail</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>