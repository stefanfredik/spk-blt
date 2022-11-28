<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title><?= "Halaman Login - " .  WEBTITLE; ?></title>
  <link rel="manifest" href="/core/assets/favicon/manifest.json">
  <link rel="stylesheet" href="/core/vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="/core/css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="/core/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="bg-white min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 shadow border border-primary rounded">
          <div class="card-group d-block d-md-flex row ">
            <div class="card col-md-5 text-white bg-primary py-5">
              <div class="card-body text-center">
                <div>
                  <img class=" login-logo img-fluid" src="/assets/img/bg.png" alt="">
                </div>
              </div>
            </div>

            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body text-center">
                <form role="form" action="<?= url_to('login') ?>" method="POST">
                  <?= csrf_field() ?>
                  <h1>Halaman Login</h1>
                  <p class="text-medium-emphasis">Silahkan Login menggunakan username dan password anda.</p>
                  <div class="text-start">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                  </div>
                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                      </svg></span>
                    <input value="<?= old('login'); ?>" required id="username" name="login" class="form-control p-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="text" placeholder="Masukan Username">
                    <div class="invalid-feedback">
                      <?= session('errors.login') ?>
                    </div>
                  </div>
                  <div class="input-group mb-4"><span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                        <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                      </svg></span>
                    <input required id="password" name="password" class="form-control p-2 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" placeholder="Masukan Password">
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button class="btn btn-primary px-4" type="submit"><?= lang('Auth.loginAction') ?></button>
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
</body>

</html>