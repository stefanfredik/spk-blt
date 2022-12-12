<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row mb-5">
            <div class="display-6 text-center text-white">
                Hallo <?= user()->nama_user; ?>,
            </div>
            <div class="display-5 text-center text-white">
                Selamat datang di <?= WEBTITLE; ?>
            </div>
        </div>

        <div class="row">
            <div id="pesertaBlt" class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Laporan Peserta BLT </div>
                            <div><?= $jumBlt; ?> Peserta</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pesertaBpnt" class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Laporan Peserta BPNT</div>
                            <div><?= $jumBpnt; ?> Peserta</div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="penduduk" class="col-sm-6 col-lg-3 ">
                <div class="card mb-4 text-white bg-warning shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold"> Laporan Data Penduduk</div>
                            <div><?= $jumPenduduk; ?>Orang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="vendors/chart.js/js/chart.min.js"></script>
<script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/main.js"></script>

<?= $this->endSection(); ?>

<?= $this->section("script"); ?>
<script>
    const pesertaBlt = document.getElementById("pesertaBlt");
    pesertaBlt.addEventListener("click", () => {
        window.location.href = "/blt/laporan"
    });

    const pesertaBpnt = document.getElementById("pesertaBpnt");
    pesertaBpnt.addEventListener("click", () => {
        window.location.href = "/bpnt/laporan"
    });

    const penduduk = document.getElementById("penduduk");
    penduduk.addEventListener("click", () => {
        window.location.href = "/laporan"
    });
</script>
<?= $this->endSection(); ?>


<?= $this->section("style"); ?>
<style>
    .wrapper {
        background-color: #003c8f !important;
    }


    .card:hover {
        cursor: grab;
        box-sizing: content-box;
        border: 1px solid white;
    }
</style>
<?= $this->endSection(); ?>