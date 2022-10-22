<?php


# nilai = bobot/nilai pada kriteria.
function hitungBobot($nilai, $totalkriteria) {
    return number_format(($nilai / $totalkriteria), 2);
}

function bobotPenghasilan($p): int {
    if ($p < 800000) {
        return 5;
    } else if ($p  >= 800000 && $p < 1200000) {
        return 4;
    } else if ($p >= 1200000 && $p < 1800000) {
        return 3;
    } else if ($p >= 1800000 && $p < 2500000) {
        return 2;
    } else {
        return 1;
    }
}

function bobotNilai($n): int {
    if ($n > 90) {
        return 5;
    } else if ($n > 85 && $n <= 90) {
        return 4;
    } else if ($n > 75 && $n <= 85) {
        return 3;
    } else if ($n >= 60  && $n <= 75) {
        return 2;
    } else {
        return 1;
    }
}

function bobotTanggungan($t): int {
    if ($t >= 5) return 5;
    else if ($t == 4) return 4;
    else if ($t == 3) return 3;
    else if ($t == 2) return 2;
    else if ($t == 1) return 1;
}

function bobotYatim($s) {
    if ($s == 'Yatim Piatu') return 5;
    else if ($s == 'Yatim') return 4;
    else if ($s == 'Piatu') return 3;
    else if ($s == 'Lengkap') return 1;
}

function totalBobot($p, $t, $n, $y): int {
    return ($p + $t + $n + $y);
}
