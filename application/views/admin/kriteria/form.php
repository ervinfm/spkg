<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5><?= ucfirst($this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui') ?> Data Kriteria Penilaian</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/kriteria') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Data Kriteria </a>
                    </div>
                </div>
                <form action="<?= site_url('admin/kriteria/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="id" value="<?= @$row->id_kriteria ?>">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Atribut Kriteria *</label>
                                <input type="text" name="k_atibut" value="<?= $this->uri->segment(3) == 'insert' ? ('K' . (get_kriteria_atribut()->num_rows() + 1)) : @$row->atribut_kriteria ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. K14" required>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Data Kriteria *</label>
                                <input type="text" name="k_data" value="<?= @$row->data_kriteria ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. Muhammad Ismail" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-success btn-block"><i class="icon-loader"></i> <?= ucfirst($this->uri->segment(3)) ?> Data Kriteria</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>