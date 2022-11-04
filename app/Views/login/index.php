<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= WEBTITLE; ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/core/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="/core/css/vendors/simplebar.css">
    <link href="/core/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="/core/css/examples.css" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-4 p-4 mb-0">
                            <div class="card-body text-center">
                                <form action="" onsubmit="login(event)">
                                    <h1>Halaman Login</h1>
                                    <p class="text-medium-emphasis my-3">Silahkan Login</p>
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="/core/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span>
                                        <input class="form-control" id="username" type="text" placeholder="Masukan Username" required>
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="/core/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span>
                                        <input class="form-control" id="password" type="password" placeholder="Masukan Password" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="col-12 btn btn-primary px-4">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/core/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/core/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function login(target) {
            target.preventDefault();

            const username = $("#username").val();
            const pass = $("#password").val();

            $.ajax({
                url: '/login',
                method: 'POST',
                data: {
                    username,
                    pass
                },

                success: (res) => {
                    // console.log(res);
                    if (res.status == 'error') {
                        return Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: res.msg,
                            showConfirmButton: false,
                            timer: 1000,
                        });
                    }

                    return window.location.href = '/dashboard';
                }
            });
        }
    </script>
</body>

</html>