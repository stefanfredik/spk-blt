<?= $this->extend('temp/index'); ?>
<?= $this->section("content"); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#datapenduduk" type="button" role="tab" aria-controls="home" aria-selected="true">Data Penduduk</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#datablt" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Penerima BLT</button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="datapenduduk" role="tabpanel" aria-labelledby="home-tab">

    </div>
    <div class="tab-pane fade" id="datablt" role="tabpanel" aria-labelledby="profile-tab">...</div>
</div>

<?= $this->endSection(); ?>