<?php

#bobot      = nilai kriteria terntentu dari siswa (sudah ditentukan).
#total      = semua nilai kriteria tertentu dari semua siswa


function normalisasi(float $bobot, array $semuabobot): float {
    $nilai = 0;
    foreach ($semuabobot as $arr) {
        $nilai += pow($arr, 2);
    }

    return number_format($bobot / sqrt($nilai), 4);
}


#bobot      = hasil perhitungan dari kriteria/ fungsi sudah ada.
#nilai      = nilai yang didapatkan dari hasil normalisasi.
#dihitung masing-masing setiap siswa

function optimasi($nilai, $bobot): float {
    return number_format($nilai * $bobot, 4);
}


# dt  = setiap  nilai optimasi dari masing-masing kriteria dari setiap siswa.
#hitung persiswa

function nilaiAkhir(array $dt) {
    $max = $dt[0] + $dt[1];
    $min = $dt[2] + $dt[3];

    return $max - $min;
}
