<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Sub-Kriteria Penilaian Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/kriteria') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Kriteria </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="20%">Atribut Kriteria</td>
                                    <td width="5%">:</td>
                                    <td><?= $row->atribut_kriteria ?></td>
                                </tr>
                                <tr>
                                    <td>Data Kriteria</td>
                                    <td>:</td>
                                    <td><?= $row->data_kriteria ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target=".bd-example"><i class="icon-circle-plus"></i> Tambah </button>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="5%">No</td>
                                    <td>Sub-Kriteria</td>
                                    <td width="10%">Bobot Sub</td>
                                    <td width="15%">Aksi</td>
                                </tr>
                                <?php foreach (get_subkriteria_bykriteria($row->id_kriteria)->result() as $key => $sub) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $sub->data_sub_kriteria ?></td>
                                        <td><?= $sub->level_sub_kriteria ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-edit<?= $key ?>"><i class="icon-paper"></i></button>
                                            <div class="modal fade bd-edit<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form action="<?= site_url('admin/kriteria/proses_sub') ?>" method="post">
                                                            <input type="hidden" name="id_kriteria" value="<?= $row->id_kriteria ?>">
                                                            <input type="hidden" name="id" value="<?= $sub->id_sub_kriteria ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update Sub-Kriteria</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Bobot Sub Kriteria *</label>
                                                                            <input type="number" name="sub_level" value="<?= $sub->level_sub_kriteria ?>" class="form-control" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Data Sub Kriteria *</label>
                                                                            <textarea name="sub_data" class="form-control" rows="5" required><?= $sub->data_sub_kriteria ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="update_sub" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/kriteria/delete_sub/' . $sub->id_sub_kriteria . '/' . $row->id_kriteria) ?>" onclick="return confirm('Yakin Menghapus data Kriteria Penilaian ?')" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('admin/kriteria/proses_sub') ?>" method="post">
                <input type="hidden" name="id_kriteria" value="<?= $row->id_kriteria ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sub-Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Level Sub Kriteria *</label>
                                <input type="number" name="sub_level" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Data Sub Kriteria *</label>
                                <textarea name="sub_data" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_sub" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>