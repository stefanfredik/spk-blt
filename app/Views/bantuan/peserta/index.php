<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <p>Jumlah Peserta : </p>
    <div class="col">
        <button data-url="<?= '/' . $url . '/tambah'; ?>" class="rounded-pill m-2 btn btn-outline-primary" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>

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

    async function detail(url, target) {
        const id = target.getAttribute("data-id");
        $("#modal").modal("hide");
        $.get(`/${url}/detail/${id}`, (data, status) => {
            if (status === "success") {
                $("#modalArea").html(data);
                $("#modal").modal("show")
            }
        }).catch(err => {
            Toast.fire({
                icon: "error",
                title: "Gagal mendapatkan data!"
            })
        })
    }
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>