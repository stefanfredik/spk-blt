<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>
<div class="dashboard body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row mb-5">
            <div class="display-6 text-center text-white">
                Hallo <?= user()->nama_user; ?>,
            </div>
            <div class="display-6 text-center text-white">
                Selamat datang di <?= WEBTITLE; ?>
            </div>
        </div>

        <div class="row">
            <div id="pesertaBlt" class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Peserta BLT </div>
                            <div><?= $jumBlt; ?> Peserta</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pesertaBpnt" class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Peserta BPNT</div>
                            <div><?= $jumBpnt; ?> Peserta</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div id="penduduk" class="col-sm-6 col-lg-3 ">
                <div class="card mb-4 text-white bg-warning shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">Penduduk</div>
                            <div><?= $jumPenduduk; ?> Orang</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div id="user" class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-danger shadow p-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">User</div>
                            <div><?= $jumUser; ?> User</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row  px-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">Data Peserta Penerima Bantuan</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 border rounded">
                        <div class="row">
                            <div class="col-6  ">
                                <div class="border-start border-start-4 border-start-info px-3 mb-3"><small class="text-medium-emphasis">New Clients</small>
                                    <div class="fs-5 fw-semibold">9.123</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row-->
                        <hr class="mt-0">

                        <div class="row">
                            <div>
                                <canvas id="chartBlt"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 border rounded">
                        <div class="row">
                            <div class="col-6">
                                <div class="border-start border-start-4 border-start-info px-3 mb-3"><small class="text-medium-emphasis">Jumlah Peserta</small>
                                    <div class="fs-5 fw-semibold">9.123</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row-->
                        <hr class="mt-0">

                        <div class="row">
                            <div>
                                <canvas id="chartBpnt"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->
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
        window.location.href = "/blt/datapeserta"
    });

    const pesertaBpnt = document.getElementById("pesertaBpnt");
    pesertaBpnt.addEventListener("click", () => {
        window.location.href = "/bpnt/datapeserta"
    });

    const penduduk = document.getElementById("penduduk");
    penduduk.addEventListener("click", () => {
        window.location.href = "/penduduk"
    });

    const user = document.getElementById("user");
    user.addEventListener("click", () => {
        window.location.href = "/user"
    });
</script>




<script>
    var blt = document.getElementById("chartBlt").getContext('2d');

    var chartBlt = new Chart(blt, {
        type: 'bar',
        data: {
            labels: ["Layak", "Cukup Layak", "Kurang Layak", "Tidak Layak"],
            datasets: [{
                label: 'BLT',
                data: [12, 50, 3, 23, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


    var bpnt = document.getElementById("chartBpnt").getContext('2d');

    var chartBpnt = new Chart(bpnt, {
        type: 'bar',
        data: {
            labels: ["Layak", "Cukup Layak", "Kurang Layak", "Tidak Layak"],
            datasets: [{
                label: 'BPNT',
                data: [12, 50, 3, 23, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
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