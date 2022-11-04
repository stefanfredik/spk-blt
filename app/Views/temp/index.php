<!DOCTYPE html>
<html lang="en">
<?= $this->include("/temp/layout/head"); ?>

<body>
    <?= $this->include("/temp/layout/sidebar"); ?>
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