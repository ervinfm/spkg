<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Manajemen Data Guru</h5>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= site_url('admin/guru/insert') ?>" class="btn btn-success btn-sm float-right"><i class="icon-circle-plus"></i> Tambah </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table" id="datas">
                                <thead>
                                    <tr>
                                        <th width="10%">Guru</th>
                                        <th>NBM</th>
                                        <th>Nama</th>
                                        <th>TTL</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row->result() as $key => $guru) { ?>
                                        <tr>
                                            <td class="py-1">
                                                <a href="" data-toggle="modal" data-target="#modal-<?= $guru->id_guru ?>">
                                                    <img src="<?= base_url() . 'assets/images/guru/' . ($guru->img_guru == null ? 'default.png' : $guru->img_guru) ?>" alt="image" style="max-width: 40px;margin-left:30%">
                                                </a>
                                                <div class="modal fade" id="modal-<?= $guru->id_guru ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Informasi Detail Guru</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td>NBM Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->nbm_guru ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Nama Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->nama_guru ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>TTL Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->ttl_guru ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Jenis Kelamin Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->gender_guru == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>No Telp Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->telp_guru ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Alamat Guru</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $guru->alamat_guru ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $guru->nbm_guru ?></td>
                                            <td><?= $guru->nama_guru ?></td>
                                            <td><?= $guru->ttl_guru ?></td>
                                            <td><?= $guru->gender_guru == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                            <td><?= $guru->telp_guru ?></td>
                                            <td><?= substr($guru->alamat_guru, 0, 50) ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/guru/update/' . $guru->id_guru) ?>" class="btn btn-sm btn-warning"><i class="icon-paper"></i></a>
                                                <a href="<?= site_url('admin/guru/delete/' . $guru->id_guru) ?>" onclick="return confirm('Yakin Menghapus data Guru ?')" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
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