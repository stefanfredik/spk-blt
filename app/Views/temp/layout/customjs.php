<script>
    const isDebug = true;

    function debug(a) {
        if (isDebug) {
            console.log(a)
        }
    }
    async function add(target) {
        let url = target.getAttribute("data-url");
        $.get(url, function(data, status) {
            if (status === "success") {
                $("#modalArea").html(data);
                $("#modal").modal("show")
            }
        }).catch(err => {
            debug(err);
            return Toast.fire({
                icon: "error",
                title: "Tidak dapat menambah data!"
            })
        })
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
                getTable(url)
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
    async function saveEdit(event) {
        event.preventDefault();
        let form = document.querySelector("form");
        const id = form.getAttribute("data-id");
        let url = form.getAttribute("action");
        const data = new FormData(form);
        const modal = $("#modal");

        axios.post(`/${url}/saveedit/${id}`, data).then(res => {
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
                title: "Gagal mengedit data!"
            })
        })
    }
    async function getTable(url) {
        await $.get(`/${url}/table`, (data, status) => {
            $("#data").html(data);
            $('#table').DataTable({
                columnDefs: [{
                    width: 20,
                    targets: 0
                }],
                language: {
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: '<i class="bi bi-arrow-right-circle"></i>',
                        previous: '<i class="bi bi-arrow-left-circle"></i>'
                    },
                    zeroRecords: "Belum ada data.",
                    search: "Cari:",
                    lengthMenu: "Tampil _MENU_ kolom",
                    info: "Kolom _START_ sampai _END_ dari _TOTAL_ kolom"
                }
            })
        }).fail(e => {
            Toast.fire({
                icon: "error",
                title: "Gagal mendapatkan data."
            });
            console.log(e)
        })
    }
    async function remove(url, target) {
        // target.event();

        let id = target.getAttribute("data-id");
        Swal.fire({
            title: "Hapus Data",
            text: "Apakah anda yakin untuk menghapus?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then(async result => {
            if (result.isConfirmed) {
                axios.delete(`/${url}/delete/${id}`).then(res => {
                    console.log(res);
                    if (res.data.status == "success") {
                        Toast.fire({
                            icon: res.data.status,
                            title: res.data.msg
                        });
                        getTable(url)
                    }
                }).catch(e => {
                    console.log(e);
                    Toast.fire({
                        icon: "error",
                        title: "Gagal menghapus data!"
                    })
                })
            }
        })
    }
    async function edit(url, target) {
        // target.preventDefault();
        const id = target.getAttribute("data-id");
        $("#modal").modal("hide");
        $.get(`/${url}/edit/${id}`, (data, status) => {
            if (status === "success") {
                $("#modalArea").html(data);
                $("#modal").modal("show")
            }
        }).catch(err => {
            Toast.fire({
                icon: "error",
                title: "Gagal mengedit data!"
            })
        })
    }
</script>