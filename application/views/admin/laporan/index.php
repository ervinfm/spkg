<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Laporan Penilaian Kinerja Guru</h5>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><strong>Cetak Laporan Penilaian Kinerja Guru</strong></td>
                                </tr>
                                <tr>
                                    <td width="20%"> Laporan Keseluruhan</td>
                                    <td width="5%">:</td>
                                    <td>
                                        <a href="<?= site_url('admin/laporan/cetak') ?>" target="_blank" class="btn btn-primary btn-sm"><i class="icon-printer"></i> Cetak</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laporan Tiap Guru</td>
                                    <td>:</td>
                                    <td>
                                        <form action="<?= site_url('admin/laporan/cetak') ?>" method="post" target="_blank">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <select name="id" class="form-control mb-2" data-live-search="true" required>
                                                        <option value="">- pilih guru -</option>
                                                        <?php foreach (get_guru_all()->result() as $key => $teac) { ?>
                                                            <option value="<?= $teac->id_guru ?>"><?= $teac->nbm_guru . ' - ' . $teac->nama_guru ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="submit" name="cetak" class="btn btn-info btn-sm btn-block"><i class="icon-printer"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>