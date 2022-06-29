<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Formulir Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('leader/penilaian/rekapitulasi') ?>" class="btn btn-primary btn-sm float-right"><i class="icon-paper"></i> Rekapitulasi </a>
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
                                        <th width="10%">Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($guru->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $data->nbm_guru ?></td>
                                            <td><?= $data->nama_guru ?></td>
                                            <td><?= get_penilaian_byguru($data->id_guru)->num_rows() == 0 ? '<span class="badge bg-danger text-white">Belum Dinilai</span>' : '<span class="badge bg-success text-white">Sudah Dinilai</span>' ?></td>
                                            <td>
                                                <?php if (get_penilaian_byguru($data->id_guru)->num_rows() == 0) { ?>
                                                    <a href="<?= site_url('leader/penilaian/assesment/' . $data->id_guru) ?>" class="btn btn-success btn-sm"><i class="icon-command"></i> Penilaian </a>
                                                <?php } else { ?>
                                                    <a href="<?= site_url('leader/laporan/cetak/' . $data->id_guru) ?>" class="btn btn-dark btn-sm" target="_blank"><i class="icon-eye"></i> Lihat Nilai </a>
                                                <?php } ?>
                                            </td>
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