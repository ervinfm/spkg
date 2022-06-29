<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Manajemen Akun Guru</h5>
                    </div>
                    <div class="col-sm-6">
                        <span class="float-right"><i><strong> Akun Guru dibuat secara otomatis ketika menambahkan guru</strong></i></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datas">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Username</th>
                                        <th>Level Pengguna</th>
                                        <th>Status Pengguna</th>
                                        <th>Tanggal Terdaftar</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row->result() as $key => $user) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $user->username_user ?></td>
                                            <td><?= $user->level_user == 1 ? '<span class="btn btn-xs btn-danger">Administrator</span>' : ($user->level_user == 2 ? '<span class="btn btn-xs btn-success">Kepala Sekolah</span>' : '<span class="btn btn-xs btn-info">Guru</span>') ?></td>
                                            <td><?= $user->status_user == 1 ? 'Aktif' : 'Non-Aktif' ?></td>
                                            <td><?= $user->created_user ?></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning"><i class="icon-paper"></i></a>
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