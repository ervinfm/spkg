<?php
$temp = $row->row();
$idd = get_guru_byid($temp->id_guru);
?>

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
        <table width="100%" border="0" style="border-collapse: collapse;margin-bottom:10px">
            <tr>
                <td align="center">
                    <span style="font-family: sans-serif; font-size:14px; margin-top:20px"> <b> <?= strtoupper('Hasil Penilaian Kinerja Guru') ?></b> </span>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" style="font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse;">
            <tr>
                <td style="padding:5px" width="20%"><b>Tanggal Cetak</b></td>
                <td style="padding:5px" width="2%"><b>:</b></td>
                <td style="padding:5px"><b><?= date('d') . '/' . date('m') . '/' . date('Y')  . ' | ' . date('H:i')  ?> WIB</b> </b> </td>
            </tr>

            <tr>
                <td style="padding:5px"><b>NBM Guru</b></td>
                <td style="padding:5px"><b>:</b></td>
                <td style="padding:5px"><b><?= $idd->nbm_guru ?></b></td>
            </tr>
            <tr>
                <td style="padding:5px"><b>Nama Guru</b></td>
                <td style="padding:5px"><b>:</b></td>
                <td style="padding:5px"><b><?= $idd->nama_guru ?></b></td>
            </tr>
            <tr>
                <td style="padding:5px"><b>TTL Guru</b></td>
                <td style="padding:5px"><b>:</b></td>
                <td style="padding:5px"><b><?= $idd->ttl_guru ?></b></td>
            </tr>
            <tr>
                <td style="padding:5px"><b>Telepon Guru</b></td>
                <td style="padding:5px"><b>:</b></td>
                <td style="padding:5px"><b><?= $idd->telp_guru ?></b></td>
            </tr>

        </table>

        <table width="100%" border="1" style="margin-top:20px;font-family: 'Orbitron', sans-serif; font-size:12px; border-collapse: collapse; ">
            <thead>
                <tr>
                    <th style="padding:5px" width="5%">No</th>
                    <th style="padding:5px">Kriteria</th>
                    <th style="padding:5px" width="15%">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n_k = explode(',', $temp->nilai_penilaian);
                $n_grade = grade_nilai($temp->hasil_penilaian);
                foreach (get_kriteria_atribut()->result() as $key => $kri) { ?>
                    <tr>
                        <td style="padding:5px"><?= $key + 1 ?></td>
                        <td style="padding:5px"><?= $kri->data_kriteria ?></td>
                        <td style="padding:5px"><?= $n_k[$key] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="padding:5px" colspan="2" align="right"><b>Total Penilaian</b></td>
                    <td style="padding:5px"><?= $temp->hasil_penilaian . ' (' . ($temp->hasil_penilaian * 100) . ')' ?></td>
                </tr>
                <tr>
                    <td style="padding:5px" colspan="2" align="right"><b>Grade Penilaian</b></td>
                    <td style="padding:5px"><?= $n_grade['grade'] . ' | ' . $n_grade['keterangan'] ?></td>
                </tr>
                <tr>
                    <td style="padding:5px" colspan="2" align="right"><b>Urutan Peringkat</b></td>
                    <td style="padding:5px"><?= get_rangking_byid($temp->id_guru) ?></td>
                </tr>
            </tbody>
        </table>


    </section>
    <section style="margin-top:100px;text-align: justify;">
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