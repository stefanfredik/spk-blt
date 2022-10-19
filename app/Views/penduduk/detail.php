<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">NIK</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $penduduk['nik'] ?></p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">No KK</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $penduduk['no_kk'] ?></p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $penduduk['nama_lengkap'] ?></p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Tempat Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['tempat_lahir'] ?>" name="tempat_lahir" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['tanggal_lahir'] ?>" name="tanggal_lahir" type="date" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['nama_lengkap'] ?>" name="nama_lengkap" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control" name="jenis_kelamin" id="" required>
                            <optio value="">Pilih Jenis Kelamin</option>
                                <option <?= ($penduduk['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                                <option <?= ($penduduk['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Alamat</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['alamat'] ?>" name="alamat" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">RT</label>
                    </div>

                    <div class="col-md-4">
                        <input value="<?= $penduduk['rt'] ?>" name="rt" type="text" class="form-control" required>
                    </div>

                    <div class="col-md-1">
                        <label class="form-label">RW</label>
                    </div>

                    <div class="col-md-3">
                        <input value="<?= $penduduk['rw'] ?>" name="rw" type="text" class="form-control" required>
                    </div>
                </div>



                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Desa</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['desa'] ?>" name="desa" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                    </div>
                    <div class="col-md-8">
                        <input value="<?= $penduduk['status'] ?>" name="status" type="text" class="form-control" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>