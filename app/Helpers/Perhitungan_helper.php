<?php


#nk                     = nilai kriteria yang ingin di hitung bobotnya
#tnK                    = total semua nilai dari kriteria

function hitungBobot(int $nk, int $tNk): float
{
    return number_format(($nk / $tNk), 2);
}


#bobot              = bobot peserta dalam sebuah kriteria
#semuaBobot         = semua bobot peserta dalam satu buat kriteria

function normalisasi(float $bobot, array $semuabobot): float
{
    $nilai = 0;

    foreach ($semuabobot as $arr) {
        $nilai += pow($arr, 2);
    }

    return number_format($bobot / sqrt($nilai), 4);
}
