<?php

namespace App\Libraries;

class Moora {
    var $peserta            = array();
    var $kriteria           = array();
    var $nilaiKriteria      = array();
    var $bobotKriteria      = array();
    var $totalKriteria      = array();
    var $kriteriaBenefit    = array();
    var $kriteriaCost       = array();


    var $jumKriteriaBenefit = 0;
    var $jumKriteriaCost = 0;



    var $pesertaKriteria = array();

    public function __construct(
        public array $dataPeserta,
        public array $dataKriteria,
        public array $dataSubkriteria,
        public array $nilaiKelayakan
    ) {
        $this->setBobotKriteria();
        $this->insertKriteria();
        $this->setPesertaKriteriaValue();
        $this->sumKriteriaValue();
        $this->insertToPeserta();
        $this->sortPeserta();
        $this->countBenCost();
    }

    public function getAllPeserta() {
        return $this->peserta;
    }

    private function setNilaiKriteria() {
        foreach ($this->dataKriteria as $dk) {
            array_push($this->nilaiKriteria, $dk['nilai']);
        }
    }

    // Hitung bobot kriteria
    private function setBobotKriteria() {
        $nilaiKriteria = array();
        foreach ($this->dataKriteria as $dk) {
            array_push($nilaiKriteria, $dk['nilai']);
        }

        foreach ($this->dataKriteria as $dk) {
            $this->bobotKriteria[$dk['keterangan']] = $this->hitungBobot($dk['nilai'], $nilaiKriteria);
        }
    }

    // Insert data nilai kriteria ke dalam array peserta
    private function insertKriteria() {
        $this->peserta = $this->dataPeserta;

        foreach ($this->dataPeserta  as $key => $ps) {
            foreach ($this->dataKriteria as $kunci => $dk) {
                $k = 'k_' . $dk['id'];

                foreach ($this->dataSubkriteria as $ds) {
                    if ($ps[$k] == $ds['id']) {
                        $this->peserta[$key]['data_kriteria'][$dk['keterangan']]          = $ds['subkriteria'];
                        $this->peserta[$key]['data_kriteria_nilai'][$dk['keterangan']]    = $ds['nilai'];
                    } else if ($ps[$k] == null) {
                        $this->peserta[$key]['data_kriteria'][$dk['keterangan']]          = 0;
                        $this->peserta[$key]['data_kriteria_nilai'][$dk['keterangan']]    = 0;
                    }
                }
            }
        }
    }


    // Menampung data kriteria tertentu dari setiap peserta
    private function setPesertaKriteriaValue() {
        foreach ($this->dataKriteria as $dk) {
            $this->pesertaKriteria[$dk['keterangan']] = array();

            foreach ($this->peserta as $dp) {
                $k = isset($dp['data_kriteria_nilai'][$dk['keterangan']]) ? $dp['data_kriteria_nilai'][$dk['keterangan']] : 'kosong';
                array_push($this->pesertaKriteria[$dk['keterangan']], $k);
            }
        }
    }

    // Menghitung total nilai kriteria tertentu dari seluruh peserta
    private function sumKriteriaValue() {
        foreach ($this->pesertaKriteria as $key => $k) {
            $this->totalKriteria[$key] = array_sum($k);
        }
    }

    private function insertToPeserta() {
        // Normalisasi data ke array
        foreach ($this->peserta as $i => $ps) {
            foreach ($ps['data_kriteria_nilai'] as $key => $dk) {
                $this->peserta[$i]['data_normalisasi'][$key] = $this->normalisasi($dk, $this->pesertaKriteria[$key]);
            }
        }

        // Optimasi data ke array
        foreach ($this->peserta as $i => $ps) {
            foreach ($ps['data_normalisasi'] as $key => $dn) {
                $this->peserta[$i]['data_optimasi'][$key]  =  $this->optimasi($dn, $this->bobotKriteria[$key]);
            }
        }

        // Data benefit ke array
        foreach ($this->peserta as $i => $ps) {
            $this->peserta[$i]['data_kriteria_benefit'] = array();

            foreach ($ps['data_optimasi'] as $key => $dkn) {
                foreach ($this->dataKriteria as $dk) {
                    $k = $key;

                    if ($k == $dk['keterangan']) {
                        if ($dk['type'] == 'benefit') {
                            $this->peserta[$i]['data_kriteria_benefit'][$key] = $dkn;
                        }
                    }
                }
            }
        }

        // Data Cost ke array
        foreach ($this->peserta as $i => $ps) {
            $this->peserta[$i]['data_kriteria_cost'] = array();

            foreach ($ps['data_optimasi'] as $key => $dkn) {
                foreach ($this->dataKriteria as $dk) {
                    $k = $key;

                    if ($k == $dk['keterangan']) {
                        if ($dk['type'] == 'cost') {
                            $this->peserta[$i]['data_kriteria_cost'][$key] = $dkn;
                            // array_push($peserta[$i]['data_kriteria_cost'][$key], $dkn);
                        }
                    }
                }
            }
        }

        // Data Max ke array
        foreach ($this->peserta as $i =>  $ps) {
            $this->peserta[$i]['kriteria_max'] = array_sum($ps['data_kriteria_benefit']);
        }


        // Min ke array
        foreach ($this->peserta  as $i =>  $ps) {
            $this->peserta[$i]['kriteria_min'] = array_sum($ps['data_kriteria_cost']);
        }


        // Nilai ke array
        foreach ($this->peserta as $i => $ps) {
            $this->peserta[$i]['kriteria_nilai'] = ($ps['kriteria_max'] + $ps['kriteria_min']);
        }

        // Kelayakan
        foreach ($this->peserta as $i => $ps) {
            $n = (float)$ps['kriteria_nilai'];
            $max = 0;

            foreach ($this->nilaiKelayakan as $kl) {
                if ($n >= $kl['nilai'] && $kl['nilai'] >= $max) {
                    $max = $kl['nilai'];
                    $status = $kl['keterangan'];
                }
            }

            $this->peserta[$i]['status_layak'] = $status;
        }
    }


    // Hitung Jumlah Key Kriteria
    private function countBenCost() {
        foreach ($this->dataKriteria as $dk) {
            if ($dk['type'] == 'benefit') {
                $this->jumKriteriaBenefit++;
            } else {
                $this->jumKriteriaCost++;
            }
        }
    }



    // helper function 
    private function sortPeserta() {
        usort($this->peserta, fn ($a, $b) => $b['kriteria_nilai'] <=> $a['kriteria_nilai']);
    }

    private function hitungBobot(int $nk, array $allNk) {
        if ($nk == 0 || $allNk == 0) {
            return 0;
        }
        $total = array_sum($allNk);
        return number_format(($nk / $total), 2);
    }

    #bobot              = bobot peserta dalam sebuah kriteria
    #semuaBobot         = semua bobot peserta dalam satu buat kriteria

    private function normalisasi(float $bobot, array $semuabobot): float {
        $nilai = 0;

        if ($bobot == 0) {
            return 0;
        }

        foreach ($semuabobot as $arr) {
            $nilai += pow($arr, 2);
        }


        return number_format($bobot / sqrt($nilai), 4);
    }

    private function optimasi($nilai, $bobot): float {
        return number_format($nilai * $bobot, 4);
    }
}
