<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <button data-url="<?= '/' . $url . '/tambah'; ?>" class="rounded-pill m-2 btn btn-outline-primary" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>

        <input type="file" id="file" style="display:none;" />
        <button data-url="<?= '/' . $url . '/upload'; ?>" class="rounded-pill m-2 btn btn-outline-primary" onclick="uploadFile(this)"><i class="bi bi-upload mx-2"></i>Upload Excel</button>

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


    function uploadFile() {
        document.getElementById("file").click();
    };


    $("#file").on('change', () => {
        // alert('File');
        doUpload();
    });

    async function doUpload() {

        const fileUpload = document.getElementById('file');
        let formData = new FormData();
        formData.append("file", fileUpload.files[0]);

        $url = <?= $url ?>;

        console.log(formData);
        // await axios.post('/penduduk/file', formData, {
        //     headers: {
        //         "Content-Type": "multipart/form-data",
        //     }
        // }).then((res) => {
        //     console.log(res);
        // });

        await fetch('/penduduk/importfile', {
            method: "POST",
            body: formData
        });
        // alert('The file has been uploaded successfully.');
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