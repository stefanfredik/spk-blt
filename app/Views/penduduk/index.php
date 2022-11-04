<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <button data-url="<?= '/' . $url . '/tambah'; ?>" class="rounded-pill m-2 btn btn-outline-primary" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>
        <button data-url="<?= '/' . $url . '/importexcel'; ?>" class="rounded-pill m-2 btn btn-outline-primary" onclick="add(this)"><i class="bi bi-file-spreadsheet mx-1"></i></i>Import File Excel</button>

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

    async function uploadFile(event) {
        event.preventDefault();
        const modal = $("#modal");
        const url = "<?= $url; ?>";

        const fileUpload = document.getElementById('excel');
        let formData = new FormData();
        formData.append("excel", fileUpload.files[0]);

        await axios.post('/penduduk/upload', formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            }
        }).then((res) => {
            debug(res);
            if (res.data.status == "success") {
                Toast.fire({
                    icon: res.data.status,
                    title: res.data.msg
                });

                modal.modal("hide");
                getTable(url)
            }
        }).catch(e => {
            debug(e);
            if (!(typeof e.response.data.error == "undefined")) {
                return validation(e.response.data.error)
            }
            return Toast.fire({
                icon: "error",
                title: "Gagal menambah data!",
                text: e.response.data.msg
            })
        });

    }

    async function detail(url, target) {
        const id = target.getAttribute('data-id');

        $.get(`/${url}/detail/${id}`, (data, status) => {
            if (status === 'success') {
                $("#modalArea").html(data);
                $("#modal").modal("show");
            }
        }).catch((err) => {
            Toast.fire({
                icon: 'error',
                title: 'Gagal mendapatkan data!'
            })
        });
    }
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>