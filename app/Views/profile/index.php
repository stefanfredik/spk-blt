<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>
<div class="row">
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <h5 class="my-3"><?= user()->nama_user; ?></h5>
                            <p class="text-muted mb-1">Jabatan</p>
                            <p class="fw-bold"><?= $user['jabatan'] ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <!-- <button type="button" class="btn btn-primary">Edit Profile</button> -->
                                <button data-url="/profile/editpassword" class="btn btn-outline-primary ms-1" onclick="add(this)"><i class="bi bi-key-fill mx-1"></i>Edit Password</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user['nama_user']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user['username']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jabatan</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user['jabatan']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalArea">
</div>
<?= $this->endSection(); ?>


<?= $this->section("script"); ?>
<script>
    const formInput = ["username", "password", "password2"];

    function validation(error) {
        resetForm(formInput);
        if (error.password) {
            $("input[name='password']").addClass("is-invalid").next().html(error.password);
        }
    }

    function resetForm(arr) {
        arr.forEach((a) => {
            $(`input[name='${a}']`).removeClass("is-invalid").next().html("");
        });
    }

    async function save(event) {
        event.preventDefault();
        let form = document.querySelector("form");
        let url = form.getAttribute("action");
        const data = new FormData(form);
        const modal = $("#modal");
        axios.post(`/${url}/`, data).then(res => {
            debug(res);
            if (res.data.status == "success") {
                Toast.fire({
                    icon: res.data.status,
                    title: res.data.msg
                });
                modal.modal("hide");
            }
        }).catch(e => {
            debug(e);
            if (!(typeof e.response.data.error == "undefined")) {
                return validation(e.response.data.error)
            }
            return Toast.fire({
                icon: "error",
                title: "Gagal menambah data!"
            })
        })
    }
</script>
<?= $this->endSection(); ?>