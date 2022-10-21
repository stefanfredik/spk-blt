<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <div class="card border border-secondary">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body"></div>
        </div>

    </div>
</div>

<div id="modalArea">
</div>


<?= $this->section('script'); ?>
<script>
    let url = '<?= $url; ?>';

    $(document).ready(() => {
        getTable(url);
    });

    const formInput = ["username", "password", "password2"];


    function validation(error) {
        resetForm(formInput);
        if (error.username) {
            $("input[name='username']").addClass("is-invalid").next().html(error.username);
        }

        if (error.password) {
            $("input[name='password']").addClass("is-invalid").next().html(error.password);
        }

        if (error.password2) {
            $("input[name='password2']").addClass("is-invalid").next().html(error.password2);
        }
    }

    function resetForm(arr) {
        arr.forEach((a) => {
            $(`input[name='${a}']`).removeClass("is-invalid").next().html("");
        });
    }
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>