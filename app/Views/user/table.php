<div class="table-responsive">
    <table class="table border mb-0">
        <thead class="table-light fw-semibold">
            <tr class="align-middle">
                <th class="text-center">
                    <svg class="icon">
                        <use xlink:href="/core/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                    </svg>
                </th>
                <th>Nama User</th>
                <th class="text-center">Username</th>
                <th class="text-center">Jabatan</th>
                <th>Activity</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($userData as $dt) : ?>
                <tr class="align-middle">
                    <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="/core/assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                    </td>
                    <td>
                        <div><?= $dt['nama_user']; ?></div>
                        <div class="small text-medium-emphasis">Terdaftar : <?= $dt['created_at'] ?></div>
                    </td>

                    <td class="text-center">
                        <div><?= $dt['nama_user']; ?></div>
                    </td>

                    <td class="text-center">
                        <div><?= $dt['jabatan']; ?></div>
                    </td>


                    <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold"><?= $dt['last_login'] ?></div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href="/core/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/core/#">Info</a>
                                <a class="dropdown-item" onclick="edit('<?= $url; ?>', this)" data-id="<?= $dt['id'] ?>" href="/#">Edit</a>
                                <a class=" dropdown-item text-danger" onclick="edit('<?= $url; ?>', this)" data-id="<?= $dt['id'] ?>" href="/#">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- <div class="table-responsive">
    <table class="table table-bordered" id="<?= $url; ?>" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Created</th>
                <th>Login Terakhir</th>
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
                            <button onclick="remove('<?= $url; ?>', this)" class="btn text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> -->