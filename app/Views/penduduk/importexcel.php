<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('/penduduk/upload', 'onsubmit="uploadFile(event)"') ?>
            <div class="modal-body">
                <div class="row mb-4 p-2">
                    <p>- Agar tidak terjadi kesalahan data saat mengupload data, pastikan file excel anda mengikuti format berikut.</p>
                    <p>- Pastikan urutan penamaan kolom seudah sesuai dengan format berikut. </p>
                    <p>- Jenis File yang didukung hanya file dengan jenis extensi <b>.xlsx</b> </p>
                    <hr>
                    <img class="border rounded" src="/assets/img/format.png" alt="">
                    <hr>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <label class="form-label">Silahkan Upload File Excel</label>
                        <input name="excel" id="excel" type="file" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>