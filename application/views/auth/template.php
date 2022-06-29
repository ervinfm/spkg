<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= ucfirst('login') ?> | Sistem Penilaian Kinerja Guru</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/templates/img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/templates/css/style.min.css">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>

</head>

<body>
  <?php $this->view('messages') ?>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Selamat Datang!</h1>
      <p class="sign-up__subtitle">Login untuk mengakses Aplikasi Penilaian</p>
      <form class="sign-up-form form" action="<?= site_url('auth/proses') ?>" method="POST">
        <label class="form-label-wrapper">
          <p class="form-label">Username *</p>
          <input class="form-input" type="text" name="username" value="<?= @$this->session->flashdata('Username') ?>" placeholder="Enter your username" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password *</p>
          <input class="form-input" type="password" name="password" value="<?= @$this->session->flashdata('Password') ?>" placeholder="Enter your password" required>
        </label>

        <button type="submit" name="login" class="form-btn primary-default-btn transparent-btn">Login</button>
      </form>
      <a href="<?= site_url() ?>" style="margin-left:2%; margin-top:10px"><small>Halaman Landing ?</small></a>
    </article>
  </main>
  <!-- Chart library -->
  <script src="<?= base_url() ?>assets/templates/plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="<?= base_url() ?>assets/templates/plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="<?= base_url() ?>assets/templates/js/script.js"></script>
</body>

</html>