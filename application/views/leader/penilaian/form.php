<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('leader/penilaian') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Data Guru </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table class="table">
                            <tr>
                                <td colspan="3"><strong>Identitas Guru</strong></td>
                            </tr>
                            <tr>
                                <td width="20%">NBM Guru</td>
                                <td width="5%">:</td>
                                <td>NBM. <?= $guru->nbm_guru ?></td>
                            </tr>
                            <tr>
                                <td>Nama Guru</td>
                                <td>:</td>
                                <td><?= $guru->nama_guru ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= get_penilaian_byguru($guru->id_guru)->num_rows() == 0 ? '<span class="badge bg-danger" style="color:white">Belum Dinilai</span>' : '<span class="badge bg-success" style="color:white">Sudah Dinilai</span>' ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="card card-body">
                            <form action="<?= site_url('leader/penilaian/proses') ?>" method="post">
                                <input type="hidden" name="id_guru" value="<?= $guru->id_guru ?>">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h6>Formulir Penilaian Kinerja Guru</h6>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td align="center">Kriteria</td>
                                                <td align="center">Penilaian</td>
                                            </tr>
                                            <?php foreach (get_kriteria_atribut()->result() as $keys => $kri) { ?>
                                                <tr>
                                                    <td width="25%">
                                                        <p><?= '(' . $kri->atribut_kriteria . ') ' . $kri->data_kriteria ?></p>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <?php foreach (get_subkriteria_bykriteria($kri->id_kriteria)->result() as $key => $sub) { ?>
                                                                <li style="list-style:none;">
                                                                    <input type="radio" name="n_sub<?= $keys ?>" class="form-check-input" value="<?= $sub->level_sub_kriteria ?>"> <?= $sub->data_sub_kriteria ?>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <button type="submit" name="nilai" class="btn btn-success btn-block"><i class="icon-command"></i> Simpan Penilaian</button>
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