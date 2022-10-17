<div class="table-responsive">
    <table class="table table-bordered" id="<?= $url; ?>" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Created</th>
                <th>Last Login</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($userData as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['nama_user']; ?></td>
                    <td><?= $dt['jabatan']; ?></td>
                    <td><?= $dt['username']; ?></td>
                    <td><?= $dt['created_at']; ?></td>
                    <td><?= $dt['last_login']; ?></td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>