<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Rekapitulasi Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('leader/penilaian') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Formulir Penilaian </a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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

                </div>
            </div>
        </div>
    </div>
</div>