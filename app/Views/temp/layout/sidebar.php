<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img class="img-fluid sidebar-brand-full" width="50" height="50" src="/assets/img/bg.png" alt="">
        <img class="img-fluid sidebar-brand-narrow" width="50" height="50" src="/assets/img/bg.png" alt="">
    </div>

    <div class="sidebar-brand d-none d-md-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle mx-2 " viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
        <?= user()->nama_user; ?>
    </div>

    <?php
    if (in_groups('Admin')) echo view("/temp/layout/sidebar/sidebarAdmin");
    if (in_groups('Pendamping BLT'))  echo view("/temp/layout/sidebar/sidebarPendampingBlt");
    if (in_groups('Pendamping BPNT')) echo view("/temp/layout/sidebar/sidebarPendampingBpnt");
    if (in_groups('Kepala Desa')) echo view("/temp/layout/sidebar/sidebarKepalaDesa");
    ?>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>