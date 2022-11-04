<!DOCTYPE html>
<html lang="en">
<?= $this->include("/temp/layout/head"); ?>

<body>
    <?php
    switch (session()->get('jabatan')) {
        case 'Pendamping BLT':
            echo $this->include("/temp/layout/sidebarPendampingBlt");
            break;
        case 'Pendamping BPNT':
            echo $this->include("/temp/layout/sidebarPendampingBpnt");
            break;

        case 'Kepala Desa':
            echo $this->include("/temp/layout/sidebarKepalaDesa");
            break;
        default:
            echo $this->include("/temp/layout/sidebar");
    }
    ?>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?= $this->include("/temp/layout/navbar"); ?>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <?= $this->include("/temp/layout/footer"); ?>
    </div>
    <?= $this->include("/temp/layout/script"); ?>
    <?= $this->renderSection('script'); ?>

</body>

</html>