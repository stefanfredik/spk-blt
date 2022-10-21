<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $url; ?>" method="" data-id="<?= $kriteria['id']; ?>" id="formTambah" onsubmit="saveEdit(event)">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Kriteria</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $kriteria['kriteria']; ?>" name="kriteria" type="text" class="form-control" required>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Keterangan</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $kriteria['keterangan']; ?>" name="keterangan" type="text" class="form-control" required>
                            <div id="" class="invalid-feedback"></div>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Bobot</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $kriteria['bobot']; ?>" name="bobot" type="number" class="form-control" required>
                            <div id="" class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Cost/ Benefit</label>
                        </div>
                        <div class="col-md-8">
                            <input value="cost" <?= ($kriteria['type'] == 'cost') ? 'checked' : ''; ?> class="form-check-input" type="radio" name="type" id="cost">
                            <label class="form-check-label" for="cost">
                                Cost
                            </label>
                            <input value="benefit" <?= ($kriteria['type'] == 'benefit') ? 'checked' : ''; ?> class="form-check-input" type="radio" name="type" id="benefit">
                            <label class="form-check-label" for="benefit">
                                Benefit
                            </label>
                            <div id="" class="invalid-feedback"></div>
                        </div>
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