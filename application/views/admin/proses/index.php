<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Rekapitulasi Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <!-- <a href="<?= site_url('leader/penilaian') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Formulir Penilaian </a> -->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  <?= @$_GET['cat'] == '' ? 'active' : '' ?>" href="?cat=" role="tab" aria-controls="home" aria-selected="true">Hasil Penilaian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= @$_GET['cat'] == 'proses' ? 'active' : '' ?>" href="?cat=proses" role="tab" aria-controls="profile" aria-selected="false">Proses Penilaian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= @$_GET['cat'] == 'rangking' ? 'active' : '' ?>" href="?cat=rangking" role="tab" aria-controls="contact" aria-selected="false">Rangking</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade <?= @$_GET['cat'] == '' ? 'show active' : '' ?>" aria-labelledby="home-tab">
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="datas">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>NBM</th>
                                                <th>Nama</th>
                                                <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                    <th><?= $kri->atribut_kriteria ?></th>
                                                <?php } ?>
                                                <th>Total</th>
                                                <th>Grade</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($row->result() as $key => $data) {
                                                $val = explode(',', $data->nilai_penilaian);
                                                $all_grade = grade_nilai($data->hasil_penilaian); ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                                                    <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                        <td><?= $val[$key] ?></td>
                                                    <?php } ?>
                                                    <td><?= $data->hasil_penilaian ?></td>
                                                    <td><?= $all_grade['grade'] ?></td>
                                                    <td><?= $all_grade['keterangan'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= @$_GET['cat'] == 'proses' ? 'show active' : '' ?>" aria-labelledby="profile-tab">
                                <div class="mt-3 mb-1">
                                    <a class="btn btn-dark btn-sm">A. Penilaian Murni (Belum Diolah dengan Metode SAW)</a>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="datas2">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>NBM</th>
                                                <th>Nama</th>
                                                <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                    <th><?= $kri->atribut_kriteria ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($row->result() as $key => $data) {
                                                $val = explode(',', get_nilai_normal_byid($data->id_penilaian)->nilai_unnormal); ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                                                    <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                        <td><?= $val[$key] ?></td>
                                                    <?php } ?>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 mb-1">
                                    <a class="btn btn-dark btn-sm">B. Penilaian Normal Setelah diolah (Nilai Awal / Total Kriteria)</a>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="datas3">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>NBM</th>
                                                <th>Nama</th>
                                                <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                    <th><?= $kri->atribut_kriteria ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($row->result() as $key => $data) {
                                                $val = explode(',', get_nilai_normal_byid($data->id_penilaian)->nilai_normal); ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                                                    <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                        <td><?= $val[$key] ?></td>
                                                    <?php } ?>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 mb-1">
                                    <a class="btn btn-dark btn-sm">C. Penilaian Akhir Setelah diolah (Nilai Normal x Bobot Kepentingan)</a>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="datas4">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>NBM</th>
                                                <th>Nama</th>
                                                <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                    <th><?= $kri->atribut_kriteria ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($row->result() as $key => $data) {
                                                $val = explode(',', $data->nilai_penilaian); ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                                                    <?php foreach ($kriteria->result() as $key => $kri) { ?>
                                                        <td><?= $val[$key] ?></td>
                                                    <?php } ?>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= @$_GET['cat'] == 'rangking' ? 'show active' : '' ?>" aria-labelledby="contact-tab">
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="datas5">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>NBM</th>
                                                <th>Nama</th>
                                                <th>Nilai</th>
                                                <th>Grade</th>
                                                <th>Rangking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($row->result() as $key => $data) {
                                                $val = explode(',', $data->nilai_penilaian);
                                                $all_grade = grade_nilai($data->hasil_penilaian);
                                            ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nbm_guru ?></td>
                                                    <td><?= get_guru_byid($data->id_guru)->nama_guru ?></td>
                                                    <td><?= $data->hasil_penilaian ?></td>
                                                    <td><?= $all_grade['grade'] ?></td>
                                                    <td><?= get_rangking_byid($data->id_guru) ?> </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>