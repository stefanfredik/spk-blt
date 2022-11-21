<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <h3>Silahkan Lengkapi Data Berikut Agar Bisa Mengakses Halaman Ini.</h3>
        <ul>
            <?php foreach ($listError  as $err) : ?>
                <li><?= $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?= $this->endSection(); ?>