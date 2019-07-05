<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>

    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-6 text-center">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalPengeluaran"
                id="tambahPengeluaran">Tambah Pengeluaran</a>
        </div>
    </div>

    <table class="table table-hover col-lg-12 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width:5%">#</th>
                <th scope="col" class="text-center" style="width:10%">Tanggal</th>
                <th scope="col" class="text-center" style="width:10%">Akun</th>
                <th scope="col" class="text-center" style="width:10%">Jumlah</th>
                <th scope="col" class="text-center" style="width:10%">Keterangan</th>
                <th scope="col" class="text-center" style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $transaksi = $this->model('M_transaksi')->getTransaksiPengeluaran($_SESSION['user']['id']); ?>
            <?php $counter = 1; ?>
            <?php foreach ($transaksi as $tr) : ?>
            <tr>
                <th scope="row" class="text-center"><?= $counter; ?></th>
                <td><?= date('d F Y', $tr['tanggal']); ?></td>
                <td><?= $tr['kode_pengeluaran'] . " - " . $tr['nama_pengeluaran']; ?></td>
                <td class="text-right"><?= number_format($tr['jumlah'], 0, ',', '.'); ?></td>
                <td><?= $tr['keterangan']; ?></td>
                <td>
                    <div class="text-center">
                        <a href="#" class="btn btn-info tampilEditPengeluaran" data-toggle="modal"
                            data-target="#modalPengeluaran" data-id="<?= $tr['id']; ?>">edit</a>
                        <a href="#" class="btn btn-danger tampilDeletePengeluaran" data-toggle="modal"
                            data-target="#deleteModal" data-id="<?= $tr['id']; ?>">delete</a>
                    </div>
                </td>
            </tr>
            <?php $counter++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal tambah -->
<div class="modal fade" id="modalPengeluaran" tabindex="-1" role="dialog" aria-labelledby="modalPengeluaranLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengeluaranLabel">Tambah Pengeluaran Baru</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/transaksi/c_tambahPengeluaran" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                        <div class="row col-9">
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control col-3 ml-3" id="tanggal" name="tanggal"
                                value="<?= date('d'); ?>" placeholder="Tanggal">
                            <select type="text" class="form-control col-4 ml-2" id="bulan" name="bulan">
                                <option value="<?= date('m'); ?>" class="text-primary font-weight-bold">
                                    <?= date('F'); ?>
                                </option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <input type="text" class="form-control col-3 ml-2" id="tahun" name="tahun"
                                value="<?= date('Y'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengeluaran" class="col-3 col-form-label">Pengeluaran</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getOutcomeAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="pengeluaran" name="pengeluaran">
                                <?php foreach ($akun as $a) : ?>
                                <option value="<?= $a['id']; ?>">
                                    <?= $a['kode_pengeluaran'] . " - " . $a['nama_pengeluaran']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ambilDari" class="col-3 col-form-label">Ambil dari</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="ambilDari" name="ambilDari">
                                <?php foreach ($akun as $a) : ?>
                                <option value="<?= $a['id']; ?>"><?= $a['kode_asset'] . " - " . $a['nama_aset']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-3 col-form-label">Jumlah</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-3 col-form-label">Keterangan</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus data ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih hapus jika anda yakin untuk menghapus data ini. Setiap perubahan tidak bisa
                dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="hapusData" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>