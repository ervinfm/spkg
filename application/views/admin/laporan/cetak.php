<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penilaian Kinerja Guru</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo.png" />

</head>

<body>
    <section style="margin-bottom: 20px;">
        <center>
            <img src="<?= base_url() . 'assets/images/surat/kop.JPG' ?>" alt="" style="width:100%;height:140px">
        </center>
    </section>
    <section>
        <table width="100%" border="0" style="border-collapse: collapse;">
            <tr>
                <td align="center">
                    <span style="font-family: sans-serif; font-size:14px; margin-top:20px"> <b> <?= strtoupper('Laporan Penilaian Kinerja Guru') ?></b> </span>
                </td>
            </tr>
        </table>

        <table width="90%" border="1" style="margin-top:20px;font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse; margin-left:5%">
            <thead>
                <tr>
                    <th style="padding:5px" width="5%">No</th>
                    <th style="padding:5px">NBM</th>
                    <th style="padding:5px">Nama</th>
                    <th style="padding:5px">Nilai</th>
                    <th style="padding:5px">Grade</th>
                    <th style="padding:5px">Rangking</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($row->result() as $key => $data) {
                    $val = explode(',', $data->nilai_penilaian);
                    $all_grade = grade_nilai($data->hasil_penilaian);
                ?>
                    <tr>
                        <td style="padding:5px"><?= $key + 1 ?></td>
                        <td style="padding:5px"><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                        <td style="padding:5px"><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                        <td style="padding:5px"><?= ($data->hasil_penilaian * 100) ?></td>
                        <td style="padding:5px"><?= $all_grade['grade'] ?></td>
                        <td style="padding:5px"><?= get_rangking_byid($data->id_guru) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
    <section style="margin-top:100px">
        <small>
            <i>Cetak Laporan Sistem Penilaian Kinerja Guru SD Muhammadiyah Suryowijayan</i>
        </small>
        <small>
            <br>
            <i>Yogyakarta, <?= date('d M Y H:i') ?> WIB</i>
        </small>
    </section>
</body>

</html>