<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row mb-5">
            <div class="display-6 text-center">
                Hallo <?= user()->nama_user; ?>,
            </div>
            <div class="display-5 text-center">
                Selamat datang di <?= WEBTITLE; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card mb-4 text-white bg-primary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Peserta BLT </div>
                            <div><?= $jumBlt; ?> Peserta</div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart1" height="70"></canvas>
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