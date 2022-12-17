<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $url; ?>" method="" data-id="<?= $user['id']; ?>" id="formTambah" onsubmit="saveEdit(event)">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <input value="<?= $user['nama_user'] ?>" name="nama_user" type="text" class="form-control" required>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-control" name="jabatan" id="" required>
                            <option value="">Pilih Jabatan</option>
                            <?php foreach ($jabatan as $jb) : ?>
                                <option <?= $user['jabatan'] == $jb['description'] ? 'selected' : '' ?> value="<?= $jb['id']; ?>"><?= $jb['description']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input value="<?= $user['username'] ?>" name="username" type="text" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div>


                    <!-- <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ulangi Password</label>
                        <input name="password2" type="password" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>