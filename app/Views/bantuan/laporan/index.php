<?= $this->extend('temp/index'); ?>
<?= $this->section("content"); ?>

<a href="/<?= $url; ?>/cetak/<?= $jenisBantuan; ?>" class="my-3 col btn btn-primary"><i class="bi bi-printer mx-2"></i> Cetak Laporan</a>
<div class="row">
    <div class="col">
        <div class="card  shadow">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body">
                <?= $this->include("bantuan/laporan/table"); ?>
            </div>
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