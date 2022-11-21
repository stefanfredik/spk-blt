<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>
<?php helper('Perhitungan'); ?>

<?php
// Data yang dibutuhkan
$kriteria           = array();
$bobotKriteria      = array();
$totalKriteria      = array();
$kriteriaBenefit    = array();
$kriteriaCost       = array();


// Hitung bobot kriteria
$nilaiKriteria = array();
foreach ($dataKriteria as $dk) {
    array_push($nilaiKriteria, $dk['nilai']);
}

foreach ($dataKriteria as $dk) {
    $bobotKriteria[$dk['keterangan']] = hitungBobot($dk['nilai'], $nilaiKriteria);
}

// --------------------------------------------------------------------------------
// Array Data Peserta
$peserta = $dataPeserta;
foreach ($dataPeserta  as $key => $ps) {
    foreach ($dataKriteria as $kunci => $dk) {
        $k = 'k_' . $dk['id'];

        foreach ($dataSubkriteria as $ds) {
            if ($ps[$k] == $ds['id']) {
                $peserta[$key]['data_kriteria'][$dk['keterangan']]          = $ds['subkriteria'];
                $peserta[$key]['data_kriteria_nilai'][$dk['keterangan']]    = $ds['nilai'];
            } else if ($ps[$k] == null) {
                $peserta[$key]['data_kriteria'][$dk['keterangan']]          = 0;
                $peserta[$key]['data_kriteria_nilai'][$dk['keterangan']]    = 0;
            }
        }
    }
}


// Menampung data kriteria tertentu dari setiap peserta
foreach ($dataKriteria as $dk) {
    $kriteria[$dk['keterangan']] = array();

    foreach ($peserta as $dp) {
        $k = isset($dp['data_kriteria_nilai'][$dk['keterangan']]) ? $dp['data_kriteria_nilai'][$dk['keterangan']] : 'kosong';
        array_push($kriteria[$dk['keterangan']], $k);
    }
}


// Menghitung total nilai kriteria tertentu seluruh peserta
foreach ($kriteria as $key => $k) {
    $totalKriteria[$key] = array_sum($k);
}


// Normalisasi data ke array
foreach ($peserta as $i => $ps) {
    foreach ($ps['data_kriteria_nilai'] as $key => $dk) {
        $peserta[$i]['data_normalisasi'][$key] = normalisasi($dk, $kriteria[$key]);
    }
}


// Optimasi data ke array
foreach ($peserta as $i => $ps) {
    foreach ($ps['data_normalisasi'] as $key => $dn) {
        $peserta[$i]['data_optimasi'][$key]  =  optimasi($dn, $bobotKriteria[$key]);
    }
}



// Data benefit ke array
foreach ($peserta as $i => $ps) {
    $peserta[$i]['data_kriteria_benefit'] = array();

    foreach ($ps['data_optimasi'] as $key => $dkn) {
        foreach ($dataKriteria as $dk) {
            $k = $key;

            if ($k == $dk['keterangan']) {
                if ($dk['type'] == 'benefit') {
                    $peserta[$i]['data_kriteria_benefit'][$key] = $dkn;
                }
            }
        }
    }
}

// Data Cost ke array
foreach ($peserta as $i => $ps) {
    $peserta[$i]['data_kriteria_cost'] = array();

    foreach ($ps['data_optimasi'] as $key => $dkn) {
        foreach ($dataKriteria as $dk) {
            $k = $key;

            if ($k == $dk['keterangan']) {
                if ($dk['type'] == 'cost') {
                    $peserta[$i]['data_kriteria_cost'][$key] = $dkn;
                    // array_push($peserta[$i]['data_kriteria_cost'][$key], $dkn);
                }
            }
        }
    }
}

// Data Max ke array
foreach ($peserta as $i =>  $ps) {
    $peserta[$i]['kriteria_max'] = array_sum($ps['data_kriteria_benefit']);
}


// Min ke array
foreach ($peserta  as $i =>  $ps) {
    $peserta[$i]['kriteria_min'] = array_sum($ps['data_kriteria_cost']);
}


// Nilai ke array
foreach ($peserta as $i => $ps) {
    $peserta[$i]['kriteria_nilai'] = ($ps['kriteria_max'] + $ps['kriteria_min']);
}

// Hitung Jumlah Key Kriteria
$jumKriteriaBenefit = 0;
$jumKriteriaCost = 0;

foreach ($dataKriteria as $dk) {
    if ($dk['type'] == 'benefit') {
        $jumKriteriaBenefit++;
    } else {
        $jumKriteriaCost++;
    }
}


?>




<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Kriteria</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <td>Kode</td>
                                <td>Keterangan</td>
                                <td>Nilai</td>
                                <td>Perbaikan Bobot</td>
                                <td>Kepentingan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataKriteria as $dk) :
                            ?>
                                <tr>
                                    <td><?= $dk['keterangan'] ?></td>
                                    <td><?= $dk['kriteria']; ?></td>
                                    <td><?= $dk['nilai']; ?></td>
                                    <?php foreach ($bobotKriteria as $key => $db) {
                                        if ($dk['keterangan'] == $key) {
                                            echo '<td>' . $db . '</td>';
                                        }
                                    } ?>
                                    <td>
                                        <?php
                                        echo match ($dk['nilai']) {
                                            '5' => 'Sangat Penting',
                                            '4' => 'Penting',
                                            '3' => 'Cukup Penting',
                                            '2' => 'Tidak Penting',
                                            '1' => 'Sangat Tidak Penting',
                                            default => 'Tidak Diketahui'
                                        }
                                        ?>
                                    </td>
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
                            <tr>

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
                                    <?php foreach ($ps['data_optimasi'] as  $do) : ?>
                                        <td><?= $do ?></td>
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
                <h3>Tabel Yi</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" colspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th width="80px" rowspan="2">No</th>
                                <th rowspan="2">Peserta</th>
                                <th colspan="<?= $jumKriteriaBenefit; ?>">Benefit</th>
                                <th colspan="<?= $jumKriteriaCost; ?>">Cost</th>
                            </tr>
                            <tr>
                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <?= ($dt['type'] == 'benefit') ? '<th>' . $dt['keterangan'] . '</th>' : ''; ?>
                                <?php endforeach; ?>

                                <?php foreach ($dataKriteria as $dt) : ?>
                                    <?= ($dt['type'] == 'cost') ? '<th>' . $dt['keterangan'] . '</th>' : ''; ?>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: left ;"><?= $ps['nama_lengkap']; ?></td>
                                    <?php foreach ($ps['data_kriteria_benefit'] as $key => $dn) : ?>
                                        <td><?= $dn ?></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($ps['data_kriteria_cost'] as $key => $dn) : ?>
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
                <h3>Tabel Nilai</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Peserta</th>
                                <th>Max</th>
                                <th>Min</th>
                                <th>Nilai</th>
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
                                    <td><?= $ps['kriteria_max']; ?></td>
                                    <td><?= $ps['kriteria_min']; ?></td>
                                    <td><?= $ps['kriteria_nilai']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endSection(); ?>