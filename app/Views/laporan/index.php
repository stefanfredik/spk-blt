<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <a href="/<?= $url; ?>/cetak/" class="my-3 col btn btn-primary"><i class="bi bi-printer mx-2"></i> Cetak Laporan</a>

        <div class="card border border-secondary">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body">

            </div>
        </div>

    </div>
</div>



<?= $this->section('script'); ?>
<script>
    let url = '<?= $url; ?>';

    $(document).ready(() => {
        getTable(url);
    });
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>