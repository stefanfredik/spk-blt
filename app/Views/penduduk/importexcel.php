<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('/penduduk/upload', 'onsubmit="uploadFile(event)"') ?>
            <div class="modal-body">
                <div class="row mb-4 p-3">
                    <ul>
                        <li>Agar tidak terjadi kesalahan data saat mengupload data, pastikan file excel anda mengikuti format berikut.</li>
                        <li>Pastikan urutan penamaan kolom seudah sesuai dengan format berikut. </li>
                        <li>Jenis File yang didukung hanya file dengan jenis extensi <b>.xlsx</b> </li>
                    </ul>
                    <hr>
                    <div class="table-responsive">
                        <table class="table border">
                            <thead class="text-center">
                                <tr>
                                    <th class="align-middle">NIK</th>
                                    <th class="align-middle">Nama Lengkap</th>
                                    <th class="align-middle">Tempat Lahir</th>
                                    <th class="align-middle">Tempat Lahir</th>
                                    <th class="align-middle">Tanggal Lahir</th>
                                    <th class="align-middle">Jenis Kelamin</th>
                                    <th class="align-middle">Alamat</th>
                                    <th class="align-middle">RT</th>
                                    <th class="align-middle">RW</th>
                                    <th class="align-middle">Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12345678</td>
                                    <td>12345678</td>
                                    <td>Jhon Doe</td>
                                    <td>Bali</td>
                                    <td>2000/11/01</td>
                                    <td>Laki-Laki</td>
                                    <td>Denpasar, Bali</td>
                                    <td>01</td>
                                    <td>05</td>
                                    <td>Denpasar Selatan</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
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