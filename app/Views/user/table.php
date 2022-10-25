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
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($userData as $dt) : ?>
                <tr class="align-middle">
                    <td class="text-center">
                        <div class="avatar avatar-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg></div>
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
                        <div class="small text-medium-emphasis">Login Terakhir : </div>
                        <div class="fw-semibold"><?= $dt['last_login'] ?></div>
                    </td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn  btn-outline-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn btn-outline-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>