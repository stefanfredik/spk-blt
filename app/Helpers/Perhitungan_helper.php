<?php


#nk                     = nilai kriteria yang ingin di hitung bobotnya
#allNK                    = total semua nilai dari kriteria

function hitungBobot(int $nk, array $allNk) {
    if ($nk == 0 || $allNk == 0) {
        return 0;
    }
    $total = array_sum($allNk);
    return number_format(($nk / $total), 2);
}


#bobot              = bobot peserta dalam sebuah kriteria
#semuaBobot         = semua bobot peserta dalam satu buat kriteria

function normalisasi(float $bobot, array $semuabobot): float {
    $nilai = 0;

    if ($bobot == 0) {
        return 0;
    }

    foreach ($semuabobot as $arr) {
        $nilai += pow($arr, 2);
    }


    return number_format($bobot / sqrt($nilai), 4);
}

function optimasi($nilai, $bobot): float {
    return number_format($nilai * $bobot, 4);
}
