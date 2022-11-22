<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <div class="card  shadow">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr class="align-middle">
                                <th>No</th>
                                <th class="text-center">Rangking</th>
                                <th>No. KK</td>
                                <th>NIK</td>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</td>
                                <th>Alamat</td>
                                <th>Nilai Akhir</td>
                                <th>Status Layak</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>