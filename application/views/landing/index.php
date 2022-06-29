<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Penilaian Kinerja Guru</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 1 - THE NAVBAR SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////-->
    <nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('') ?>">
                <span>SD Muhammadiyah Suryowijayan</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= site_url('') ?>">Home</a></li>

                </ul>
                <form action="<?= site_url('auth') ?>" method="post">
                    <button type="submit" class="rounded-pill btn-rounded">
                        Login
                        <span>
                            <i class="fas fa-user-lock"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                            START SECTION 2 - THE INTRO SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <section id="home" class="intro-section">
        <div class="container">
            <div class="row align-items-center text-white">
                <!-- START THE CONTENT FOR THE INTRO  -->
                <div class="col-md-7 intros text-start">
                    <h1 class="display-2">
                        <span class="display-2--intro">Selamat Datang!</span>
                        <span class="display-2--description lh-base">
                            Sistem Informasi Penilaian Kinerja Guru dengan Metode Kecerdasan Buatan (SAW).
                        </span>
                    </h1>
                    <?php if ($this->session->flashdata('unknow')) { ?>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <div>
                                <?= $this->session->flashdata('unknow') ?>
                            </div>
                        </div>
                    <?php } ?>
                    <form action="" method="post">
                        <label> Cari Data Penilaianmu dengan mengisi NBM mu dibawah ini * </label>
                        <div class="input-group mb-3 mt-2">
                            <input type="number" name="nbm" class="form-control" placeholder="Nomor Baku Muhammadiyah (NBM) Guru" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <button type="submit" name="cek" class="btn btn-success" type="button" id="button-addon2">Cek Penilaian</button>
                        </div>
                    </form>
                </div>
                <!-- START THE CONTENT FOR THE VIDEO -->
                <div class="col-md-5 intros text-end">
                    <div class="video-box">
                        <img src="<?= base_url() ?>assets/images/logo.png" alt="video illutration" class="img-fluid" style="width: 80%;">
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <?php if (@$row) { ?>

        <section id="hasil" class="services">
            <div class="container">
                <div class="row text-center">
                    <h1 class="display-3 fw-bold">Hasil Penilaian Kinerja Guru</h1>
                    <div class="heading-line mb-1"></div>
                </div>
                <!-- START THE DESCRIPTION CONTENT  -->
                <div class="row pt-2 pb-2 mt-0 mb-3">
                    <div class="col-md-4 border-right">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <div class="row" style="color:white">
                                    <div class="col-sm-12 text-center">
                                        <img src="<?= base_url() . 'assets/images/logo.png' ?>" style="width:30%">
                                    </div>
                                    <div class="col-sm-12 mt-3 text-center">
                                        <h4><?= $guru->nama_guru ?></h4>
                                        <p>NBM. <?= $guru->nbm_guru ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="5"><strong>Laporan Penilaian Kinerja Guru</strong></td>
                                </tr>
                                <?php if ($row->num_rows() > 0) {
                                    $tem = $row->row();
                                    $n_grade = grade_nilai($tem->hasil_penilaian); ?>
                                    <tr>
                                        <td>Hasil Penilaian</td>
                                        <td><?= $tem->hasil_penilaian . ' (' . ($tem->hasil_penilaian * 100) . ')' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Grade Penilaian</td>
                                        <td><?= $n_grade['grade'] . ' | ' . $n_grade['keterangan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Peringkat Penilaian</td>
                                        <td><?= get_rangking_byid($tem->id_guru) . ' dari ' . get_guru_all()->num_rows() . ' Guru' ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Aksi</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">Cetak Laporan</a>
                                        </td>
                                    </tr> -->

                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5"><i>Laporan Belum tersedia, penilaian belum dilakukan...</i></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <a href="<?= site_url() ?>" class="btn btn-dark btn-sn">Reset Pencarian</a>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    <?php } ?>

    <!-- BACK TO TOP BUTTON
    <a href="#" class="shadow btn-primary rounded-circle back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a> -->

    <script src="<?= base_url() ?>assets/landing/assets/vendors/js/glightbox.min.js"></script>

    <script type="text/javascript">
        const lightbox = GLightbox({
            'touchNavigation': true,
            'href': 'https://www.youtube.com/watch?v=J9lS14nM1xg',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoPlayVideos': 'true',
        });
    </script>
    <script src="<?= base_url() ?>assets/landing/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>