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
}
// d($peserta);


// Memasukan data kriteria
$kriteria       = array();
$bobotKriteria  = array();
$totalKriteria  = array();


// Memasukan data array
foreach ($dataKriteria as $dk) {
    $kriteria[$dk['keterangan']] = array();

    foreach ($peserta as $dp) {
        array_push($kriteria[$dk['keterangan']], $dp['data_kriteria_nilai'][$dk['keterangan']]);
    }
}


// Menghitung total nilai kriteria tertentu seluruh peserta
foreach ($kriteria as $key => $k) {
    $totalKriteria[$key] = array_sum($k);
}


// Memasuk data normalisasi ke dalam array
foreach ($peserta as $i => $ps) {
    foreach ($ps['data_kriteria_nilai'] as $key => $dk) {
        $peserta[$i]['data_normalisasi'][$key] = normalisasi($dk, $kriteria[$key]);
    }
}

// Hitung bobot kriteria
foreach ($dataKriteria as $dk) {
    $bobotKriteria[$dk['keterangan']] = hitungBobot($dk['nilai'], $totalKriteria[$dk['keterangan']]);
}

// dd($bobotKriteria);

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
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($ps['data_kriteria'] as $key => $dk) : ?>
                                        <td><?= $dk; ?></td>
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
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>

                                    <?php foreach ($ps['data_kriteria_nilai'] as $key => $dk) : ?>
                                        <td><?= $dk; ?></td>
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
                <h3>Tabel Perbaikan Bobot Kriteria</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <th><?= $dt['keterangan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($bobotKriteria as $b) :
                                ?>

                                    <td><?= $b ?></td>

                                <?php endforeach; ?>
                            </tr>
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
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($ps['data_normalisasi'] as $key => $dn) : ?>
                                        <td><?= $dn ?></td>
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
                <h3>Tabel Optimasi</h3>
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
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($ps['data_normalisasi'] as $key => $dn) : ?>
                                        <td><?= optimasi($dn, $bobotKriteria[$key]); ?></td>
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