<?= $this->extend('temp/index'); ?>
<?= $this->section("content"); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#datablt" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Penerima BLT</button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#datapenduduk" type="button" role="tab" aria-controls="home" aria-selected="true">Data Penduduk</button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="datablt" role="tabpanel" aria-labelledby="profile-tab">
        <a href="/<?= $url; ?>/cetak/<?= $jenisBantuan; ?>" class="my-3 col btn btn-primary"><i class="bi bi-printer mx-2"></i> Cetak Laporan</a>
        <hr>
        <div class="row">
            <?= $this->include("bantuan/laporan/datablt"); ?>
        </div>
    </div>

    <div class="tab-pane fade show " id="datapenduduk" role="tabpanel" aria-labelledby="home-tab">
        <a href="/<?= $url; ?>/cetak/<?= $jenisBantuan; ?>" class="my-3 col btn btn-primary"><i class="bi bi-printer mx-2"></i> Cetak Laporan</a>
        <hr>
        <div class="row">
            <?= $this->include("bantuan/laporan/datapenduduk"); ?>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>


<?= $this->section("script"); ?>
<script>
    const config = {
        columnDefs: [{
            width: 20,
            targets: 0
        }],
        language: {
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: ' <i class="bi bi-arrow-right-circle"></i>',
                previous: '<i class="bi bi-arrow-left-circle"></i>'
            },
            zeroRecords: "Belum ada data.",
            search: "Cari:",
            lengthMenu: "Tampil _MENU_ kolom",
            info: "Kolom _START_ sampai _END_ dari _TOTAL_ kolom"
        }
    };

    $('#tablePenduduk').DataTable(config)
    $('#tableBlt').DataTable(config)


    function cetakLaporanBlt() {
        alert("blt");
    }
</script>
<?= $this->endSection(); ?>