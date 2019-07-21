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
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newDebtModal" id="tambahPiutang">Tambah
                Piutang</a>
        </div>
    </div>

    <table class="table table-hover col-lg-12 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width:5%">#</th>
                <th scope="col" class="text-center" style="width:5%">ID</th>
                <th scope="col" class="text-center" style="width:10%">Tanggal</th>
                <th scope="col" class="text-center" style="width:10%">Akun</th>
                <th scope="col" class="text-center" style="width:10%">Jumlah</th>
                <th scope="col" class="text-center" style="width:10%">Keterangan</th>
                <th scope="col" class="text-center" style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $transaksi = $this->model('M_transaksi')->getPiutang($_SESSION['user']['id']);
            // var_dump($transaksi);
            // die;
            ?>
            <?php $counter = 1; ?>
            <?php foreach ($transaksi as $tr) : ?>
            <?php
                // var_dump($tr);
                // die; 
                ?>
            <tr>
                <th scope="row" class="text-center"><?= $counter; ?></th>
                <td class="text-center"><?= $tr['id']; ?></td>
                <td><?= date('d F Y', $tr['tanggal_piutang']); ?></td>
                <td><?= $tr['kode_debitur'] . " - " . $tr['nama_debitur']; ?></td>
                <td class="text-right">
                    <?= number_format($this->model('M_transaksi')->m_getPiutangById($tr['id'])['jumlah_piutang'], 0, ',', '.'); ?>
                </td>
                <td><?= $tr['keterangan']; ?></td>
                <td>
                    <div class="text-center">
                        <a href="#" class="btn btn-success my-1 tampilBayarPiutangModal" data-toggle="modal"
                            data-target="#debtPayModal" data-id="<?= $tr['id']; ?>"><i
                                class="fas fa-money-bill-wave"></i></a>
                        <a href="#" class="btn btn-info my-1 tampilEditPiutangModal" data-toggle="modal"
                            data-target="#newDebtModal" data-id="<?= $tr['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger my-1 tampilDeletePiutangModal" data-toggle="modal"
                            data-target="#deleteModal" data-id="<?= $tr['id']; ?>"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal fade" id="newDebtModal" tabindex="-1" role="dialog" aria-labelledby="newDebtModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDebtModalLabel">Tambah Piutang Baru</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/transaksi/c_tambahPiutang" method="post" id="formPiutang">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <!-- tanggal hutang -->
                    <div class="form-group row">
                        <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                        <div class="row col-9">
                            <input type="number" class="form-control col-3 ml-3" id="tanggal" name="tanggal"
                                value="<?= date('d'); ?>" placeholder="Tanggal">
                            <select class="form-control col-4 ml-2" name="bulan">
                                <option value="<?= date('m'); ?>" class="text-primary font-weight-bold" id="bulan">
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
                            <input type="number" class="form-control col-3 ml-2" id="tahun" name="tahun"
                                value="<?= date('Y'); ?>">
                        </div>
                    </div>
                    <!-- tanggal jatuh tempo -->
                    <div class="form-group row">
                        <label for="tanggal_jt" class="col-3 col-form-label">Jatuh Tempo</label>
                        <div class="row col-9">
                            <input type="number" class="form-control col-3 ml-3" id="tanggal_jt" name="tanggal_jt"
                                value="<?= date('d'); ?>" placeholder="Tanggal">
                            <select class="form-control col-4 ml-2" name="bulan_jt">
                                <option value="<?= date('m'); ?>" class="text-primary font-weight-bold" id="bulan_jt">
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
                            <input type="number" class="form-control col-3 ml-2" id="tahun_jt" name="tahun_jt"
                                value="<?= date('Y'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="debitur" class="col-3 col-form-label">Piutang</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getDebiturAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="debitur" name="debitur">
                                <?php foreach ($akun as $a) : ?>

                                <option value="<?= $a['id']; ?>">
                                    <?= $a['kode_debitur'] . " - " . $a['nama_debitur']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aset" class="col-3 col-form-label">Ambil dari</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="aset" name="aset">
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
                            <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
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

<!-- modal bayar Piutang -->
<div class="modal fade" id="debtPayModal" tabindex="-1" role="dialog" aria-labelledby="debtPayModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="debtPayModalLabel">Bayar Piutang</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>transaksi/c_bayarPiutang" method="post" id="form_bayar">
                <input type="hidden" name="id_piutang" id="id_piutang">
                <div class="modal-body">
                    <!-- tanggal Piutang -->
                    <div class="form-group row">
                        <label for="tanggal_byr" class="col-3 col-form-label">Tanggal</label>
                        <div class="row col-9">
                            <input type="number" class="form-control col-3 ml-3" id="tanggal_byr" name="tanggal_byr"
                                value="<?= date('d'); ?>" placeholder="Tanggal">
                            <select class="form-control col-4 ml-2" name="bulan">
                                <option value="<?= date('m'); ?>" class="text-primary font-weight-bold" id="bulan">
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
                            <input type="number" class="form-control col-3 ml-2" id="tahun_byr" name="tahun_byr"
                                value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="debitur_byr" class="col-3 col-form-label">Piutang</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getDebiturAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="debitur_byr" name="debitur_byr">
                                <?php foreach ($akun as $a) : ?>
                                <option value="<?= $a['id']; ?>">
                                    <?= $a['kode_debitur'] . " - " . $a['nama_debitur']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aset" class="col-3 col-form-label">Ambil dari</label>
                        <div class="col-9">
                            <?php
                            $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);

                            ?>
                            <select type="text" class="form-control" id="aset" name="aset">
                                <?php foreach ($akun as $a) : ?>
                                <option value="<?= $a['id']; ?>"><?= $a['kode_asset'] . " - " . $a['nama_aset']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_byr" class="col-3 col-form-label">Jumlah</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="jumlah_byr" name="jumlah_byr"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan_byr" class="col-3 col-form-label">Keterangan</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="keterangan_byr" name="keterangan_byr"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
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