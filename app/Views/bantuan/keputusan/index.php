<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>

<?php

helper('Perhitungan');
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

// --------------------------------------------------------------------------------\

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
// Kelayakan
foreach ($peserta as $i => $ps) {
    $n = $peserta[$i]['kriteria_nilai'];
    if ($n > 0.1200) {
        $peserta[$i]['status_layak'] = 'Layak';
    } else if ($n > 0.100  && $n <= 0.1200) {
        $peserta[$i]['status_layak'] = 'Cukup Layak';
    } else if ($n <= 0.100) {
        $peserta[$i]['status_layak'] = 'Tidak Layak';
    }
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

// Sortir/Order array berdasarkan Nilai (desc)
usort($peserta, fn ($a, $b) => $b['kriteria_nilai'] <=> $a['kriteria_nilai']);

?>

<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3>Tabel Kriteria</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr class="align-middle">
                                <th>No</th>
                                <th class="text-center">Rangking</th>
                                <th>No. KK</td>
                                <th>NIK</td>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</td>
                                <th>Alamat</td>
                                <th>Nilai Akhir</td>
                                <th>Status Layak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $rank = 1;
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td class="text-center"><?= $rank++; ?></td>
                                    <td><?= $ps['no_kk'] ?></td>
                                    <td><?= $ps['nik'] ?></td>
                                    <td><?= $ps['nama_lengkap'] ?></td>
                                    <td><?= $ps['jenis_kelamin'] ?></td>
                                    <td><?= $ps['alamat'] . '<br> RT. ' . $ps['rt'] . ' RW. ' . $ps['rw'] . ' Desa. ' . $ps['desa']   ?></td>
                                    <td><?= $ps['kriteria_nilai']; ?></td>
                                    <th><?= $ps['status_layak']; ?></th>
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