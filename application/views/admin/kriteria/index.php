<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Kriteria Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/kriteria/insert') ?>" class="btn btn-success btn-sm float-right"><i class="icon-circle-plus"></i> Tambah </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datas">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Atribut</th>
                                        <th>Kriteria</th>
                                        <th>Sub-Kriteria</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $data->atribut_kriteria ?></td>
                                            <td><?= $data->data_kriteria ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/kriteria/sub/' . $data->id_kriteria) ?>" class="btn btn-info btn-sm"><i class="icon-grid"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('admin/kriteria/update/' . $data->id_kriteria) ?>" class="btn btn-sm btn-warning"><i class="icon-paper"></i></a>
                                                <a href="<?= site_url('admin/kriteria/delete/' . $data->id_kriteria) ?>" onclick="return confirm('Yakin Menghapus data Kriteria Penilaian ?')" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
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