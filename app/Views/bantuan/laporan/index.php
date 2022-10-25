<?php

$this->extend('temp/index');
$this->section('content'); ?>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="keputusan-tab" data-bs-toggle="tab" data-bs-target="#nav-keputusan" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Keputusan</button>
        <button class="nav-link" id="penduduk-tab" data-bs-toggle="tab" data-bs-target="#nav-penduduk" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Penduduk</button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
</div>
<?= $this->endSection(); ?>