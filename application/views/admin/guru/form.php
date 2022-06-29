<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5><?= ucfirst($this->uri->segment(3) == 'insert' ? 'Tambah' : 'Perbaharui') ?> Data Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/guru') ?>" class="btn btn-info btn-sm float-right"><i class="icon-grid"></i> Data Guru </a>
                    </div>
                </div>
                <form action="<?= site_url('admin/guru/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="id" value="<?= @$row->id_user ?>">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NBM Guru *</label>
                                <input type="number" name="g_nbm" value="<?= @$row->nbm_guru ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. 7311732" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Guru *</label>
                                <input type="text" name="g_nama" value="<?= @$row->nama_guru ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. Muhammad Ismail" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tempat, Tanggal Lahir Guru *</label>
                                <input type="text" name="g_ttl" value="<?= @$row->ttl_guru ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. Bantul" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>No. Telepon Guru *</label>
                                <input type="number" name="g_telp" value="<?= @$row->telp_guru ?>" class="form-control" id="exampleInputUsername2" placeholder="ex. 081726161616" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Jenis Kelamin Guru *</label>
                                <select name="g_gender" class="form-control" id="exampleInputUsername2" required>
                                    <option value="">- pilih jenis kelamin -</option>
                                    <option value="L" <?= @$row->gender_guru == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= @$row->gender_guru == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Alamat Guru *</label>
                                <textarea name="g_alamat" class="form-control" rows="2" required><?= @$row->alamat_guru ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Foto Guru <small><i> (Kosongkan jika tak diubah) </i></small></label>
                                <input type="file" name="image" class="form-control" id="exampleInputUsername2" placeholder="ex. 081726161616">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-success btn-block"><i class="icon-loader"></i> <?= ucfirst($this->uri->segment(3)) ?> Data Guru</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>