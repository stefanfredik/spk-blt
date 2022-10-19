<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

<script src="/core/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="/core/vendors/simplebar/js/simplebar.min.js"></script>

<!-- <script src="/core/vendors/chart.js/js/chart.min.js"></script>
<script src="/core/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script> -->
<!-- <script src="/core/vendors/@coreui/utils/js/coreui-utils.js"></script> -->
<!-- <script src="/core/js/main.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?= $this->include('/temp/layout/customjs') ?>

<script>
    const Toast = Swal.mixin({
        position: 'center',
        timer: 1000,
        showConfirmButton: false,
    })

    const Confirm = Swal.mixin({
        title: 'Hapus Data',
        text: "Apakah anda yakin untuk menghapus?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    });
</script>