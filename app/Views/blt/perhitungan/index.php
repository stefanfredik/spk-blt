<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>

<?php
helper('Perhitungan');

$peserta = $dataPeserta;


foreach ($dataPeserta  as $key => $ps) {

    foreach ($dataKriteria as $kunci => $dk) {
        $k = 'k_' . $dk['id'];

        foreach ($dataSubkriteria as $ds) {

            if ($ps[$k] == $ds['id']) {

                $peserta[$key]['data_kriteria'][$dk['keterangan']]          = $ds['subkriteria'];
                $peserta[$key]['data_kriteria_nilai'][$dk['keterangan']]    = $ds['nilai'];
            }
        }
    }

    // memasukan data optimasi ke dalam array
}

// dd($ps);

dd($peserta);

?>

<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Data</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Peserta</th>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <th><?= $dt['keterangan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataPeserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($dataKriteria as $dk) : ?>
                                        <?php $k = 'k_' . $dk['id']; ?>
                                        <?php foreach ($dataSubkriteria as $ds) : ?>
                                            <?php if ($ds['id'] == $ps[$k]) : ?>
                                                <td><?= $ds['subkriteria']; ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Bobot Kriteria</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Peserta</th>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <th><?= $dt['keterangan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataPeserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($dataKriteria as $dk) : ?>
                                        <?php $k = 'k_' . $dk['id']; ?>
                                        <?php foreach ($dataSubkriteria as $ds) : ?>
                                            <?php if ($ds['id'] == $ps[$k]) : ?>
                                                <td><?= $ds['nilai']; ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Bobot Kriteria</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Peserta</th>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <th><?= $dt['keterangan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataPeserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($dataKriteria as $dk) : ?>
                                        <?php $k = 'k_' . $dk['id']; ?>
                                        <?php foreach ($dataSubkriteria as $ds) : ?>
                                            <?php if ($ds['id'] == $ps[$k]) : ?>
                                                <td><?= hitungBobot($ds['nilai'], $totalNilaiKriteria); ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Normalisasi</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Peserta</th>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <th><?= $dt['keterangan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataPeserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($dataKriteria as $dk) : ?>
                                        <?php $k = 'k_' . $dk['id']; ?>
                                        <?php foreach ($dataSubkriteria as $ds) : ?>
                                            <?php if ($ds['id'] == $ps[$k]) : ?>
                                                <td><?= hitungBobot($ds['nilai'], $totalNilaiKriteria); ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endSection(); ?>