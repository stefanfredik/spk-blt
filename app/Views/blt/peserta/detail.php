<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $url; ?>" method="" id="formTambah" onsubmit="saveEdit(event)">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Peserta</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $peserta['nama_lengkap']; ?></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">NIK</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $peserta['nik']; ?></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">NO Kartu Keluarga</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $peserta['no_kk']; ?></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $peserta['jenis_kelamin']; ?></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $peserta['alamat']; ?></p>
                            <p>Desa : <?= $peserta['desa']; ?>, RT.  <?= $peserta['rt']; ?>, RW.   <?= $peserta['rw']; ?></p>
                        </div>
                    </div>

                    <hr>

                    <?php foreach ($dataKriteria as $dt) : ?>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label"><?= $dt['keterangan'] . ' - ' . $dt['kriteria']; ?></label>
                            </div>

                            <div class="col-md-8">
                                    <?php 
                                    $k = 'k_'. $dt['id'];
                                    foreach ($dataSubkriteria as $sk) :
                                        if ($dt['id'] == $sk['id_kriteria']) :
                                    ?>
                                            <p> <?= ($peserta[$k] == $sk['id']) ? $sk['subkriteria'] : '' ?></p>
                                    <?php endif;
                                    
                                    endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>