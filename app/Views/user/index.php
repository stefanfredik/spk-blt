<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <button data-url="<?= '/' . $url . '/tambah'; ?>" class="m-2 btn btn-primary" onclick="add(this)"><i class="m-2 bi bi-plus-square"></i>Tambah Data</button>

        <div class="card">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body">
                <?= $this->include('/user/table'); ?>
            </div>
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

    async function add(target) {
        let url = target.getAttribute('data-url');

        $.get(url, function(data, status) {
            if (status === 'success') {
                // console.log(data);
                $("#modalArea").html(data);
                $("#modal").modal("show");
            }
        }).catch((err) => {
            console.log(err);
        });
    }




    async function save(event) {
        event.preventDefault();
        let form = document.querySelector("form");
        let url = form.getAttribute('action');
        const data = new FormData(form);

        axios.post(`/${url}/`, data)
            .then((res) => {
                if (res.data.status == 'success') {
                    Toast.fire({
                        icon: res.data.status,
                        title: res.data.msg
                    })

                    modal.modal('hide');
                    getTable(baseUrl);
                }

                if (res.data.status == 'error') {
                    validation(e.response.data.error);
                    return;
                }
            })
            .catch((e) => {
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal menambah data!'
                })
            });
    }


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

    async function getTable(url) {
        await $.get(`/${url}/table`, (data, status) => {
            $('#data').html(data);
            $(`#${url}`).DataTable({
                columnDefs: [{
                    width: 20,
                    targets: 0
                }],
                "language": {
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": '<i class="bi bi-arrow-right-circle"></i>',
                        "previous": '<i class="bi bi-arrow-left-circle"></i>'
                    },
                    "zeroRecords": "Belum ada data.",
                    "search": "Cari:",
                    "lengthMenu": "Tampil _MENU_ kolom",
                    "info": "Kolom _START_ sampai _END_ dari _TOTAL_ kolom",
                }
                // fixedColumns: false
            });
        }).fail((e) => {
            Toast.fire({
                icon: 'error',
                title: 'Gagal mendapatkan data.'
            });
            console.log(e);
        });
    }


    async function remove(url, target) {
        let id = target.getAttribute('data-id');

        Swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin untuk menghapus?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then(async (result) => {
            if (result.isConfirmed) {
                axios.delete(`/${url}/delete/${id}`)
                    .then((res) => {
                        console.log(res);
                        if (res.data.status == 'success') {
                            Toast.fire({
                                icon: res.data.status,
                                title: res.data.msg
                            })
                            getTable(url);
                        }
                    })
                    .catch((e) => {
                        console.log(e);
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal menghapus data!'
                        })
                    });
            }
        })
    }

    // async function edit(url, target) {
    //     let id = target.getAttribute('data-id');

    //     await axios.get(`/${url}/edit/${id}`)
    //         .then((res) => {
    //             if (res.status === 200) {
    //                 let data = res.data;

    //                 $("#modalArea").html(data);
    //                 $("#modal").modal("show");
    //                 // return true;
    //             }


    //         })
    //         .catch((e) => {
    //             console.log(e);
    //             return Toast.fire({
    //                 icon: 'error',
    //                 title: 'Gagal mengedit data!'
    //             })
    //         });
    // }


    async function edit(url, target) {
        const id = target.getAttribute('data-id');

        $.get(`/${url}/edit/${id}`, (data, status) => {
            if (status === 'success') {
                $("#modalArea").html(data);
                $("#modal").modal("show");
            }
        }).catch((err) => {
            Toast.fire({
                icon: 'error',
                title: 'Gagal mengedit data!'
            })
        });
    }
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>