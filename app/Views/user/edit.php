<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $url; ?>" method="" id="formTambah" onsubmit="save(event)">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <input name="nama_user" type="text" class="form-control" required>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-control" name="jabatan" id="" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="Admin">Admin</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                        </select>
                    </div>

                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ulangi Password</label>
                        <input name="password2" type="password" class="form-control" required>
                        <div id="" class="invalid-feedback"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>